<?php namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{

	public function index()
	{
		$data = [];
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[4]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email atau Password tidak sama'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
											->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('users/profil');

			}
		}

		if ($this->session->has('firstname')) {
		echo view('header_l', $data);
	}else {
		echo view('header', $data);
	}

		echo view('login');
		//echo view('footer');
	}

	private function setUserSession($user){
		$data = [
			'id_users' => $user['id_users'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[30]',
				'lastname' => 'required|min_length[3]|max_length[50]',
				'email' => 'required|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[4]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Pendaftaran akun berhasil');
				return redirect()->to('users');

			}
		}


		echo view('header', $data);
		echo view('register');
		//echo view('templates/footer');
	}

	public function profile(){

		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[30]',
				'lastname' => 'required|min_length[3]|max_length[50]',
				];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[4]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{

				$newData = [
					'id_users' => session()->get('id_users'),
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					];
					if($this->request->getPost('password') != ''){
						$newData['password'] = $this->request->getPost('password');
					}
				$model->save($newData);

				session()->setFlashdata('success', 'Berhasil diperbaharui');
				return redirect()->to('users/profile');

			}
		}

		$data['user'] = $model->where('id_users', session()->get('id_users'))->first();

		if ($this->session->has('firstname')) {
		echo view('header_l', $data);
		}else {
			echo view('header', $data);
		}

		echo view('profile');
		//echo view('templates/footer');
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

	public function profil()
	{
		$data=$this->session->get();
		if ($this->session->has('firstname')) {
		echo view('header_l', $data);
		}
		echo view('profil',$data);
		
	}

	//--------------------------------------------------------------------

}
