<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PersonalModel;
use App\Models\NilaiModel;
use App\Models\PendaftaranModel;


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
					'validateUser' => 'Email atau Password salah'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
											->first();

				$this->setUserSession($user);
				if ($user['jenis_user']==1)
				{
					return redirect()->to('admin');
				}
				elseif ($user['jenis_user']==2) {
					return redirect()->to('verifikasi');
				}
				else {
					return redirect()->to('users/profil');
				}

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
			'jenis_user' => $user['jenis_user'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
		if (PENDAFTARAN == 'TUTUP')
		{
			return redirect()->to(site_url());
		}
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

		helper(['form']);
		$data=$this->session->get();

		 // echo "<pre>";
		 // print_r($data);
		$id=$data['id_users'];

		$db=new PersonalModel;
		if (!$this->cekPersonal($data['id_users']))
		{
			$data['personal']=FALSE;
		}
		else
		{
			$data['personal']=TRUE;
			//$data['status_pendaftaran']=1;
			$query_personal = $db->query('SELECT * FROM pendaftar WHERE id_users='.$id);
			foreach ($query_personal->getRow() as $keyp => $valuep) {
			 		$data[$keyp]=$valuep;
		}
	//$no_pendaftaran=$data['no_pendaftaran'];
		if ($this->cekNilai($data['id_users']))
			{

				// $query_nilai = $db->query('SELECT * FROM pendaftar JOIN nilai ON pendaftar.no_pendaftaran = nilai.no_pendaftaran
		 		// 									WHERE pendaftar.no_pendaftaran='.$no_pendaftaran);

			$query_nilai = $db->query('SELECT * FROM nilai WHERE id_users='.$id);
			//$db->getLastQuery();
				foreach ($query_nilai->getRow() as $keyn => $valuen) {
				 		$data[$keyn]=$valuen;
					}
				$data['nilai']=TRUE;
			}
			else
			{
				$data['nilai']=FALSE;
			}

			if ($this->cekPendaftaran($data['id_users']))
				{
										// $query_pendaftaran = $db->query('SELECT * FROM pendaftar
										// 				JOIN nilai ON pendaftar.no_pendaftaran = nilai.no_pendaftaran
										// 				JOIN pendaftaran ON nilai.no_pendaftaran = pendaftaran.no_pendaftaran
										// 				WHERE pendaftar.no_pendaftaran='.$no_pendaftaran);

										$query_pendaftaran = $db->query('SELECT * FROM pendaftaran WHERE id_users='.$id);
													//	echo $db->getLastQuery();

					foreach ($query_pendaftaran->getRow() as $keypn => $valuepn) {
					 		$data[$keypn]=$valuepn;
						}
					$data['pendaftaran']=TRUE;
				}
				else
				{
					$data['pendaftaran']=FALSE;
				}
// echo "<pre>";
// print_r($data);
				$x=$data['status_pendaftaran'];
				switch ($x) {
					case $x <3:
						$data['status']='Pengisian Form';
						break;
					case $x =3:
						$data['status']='Menunggu Ujian Seleksi & Verifikasi berkas';
						break;
					case $x =4:
						$data['status']='Menunggu Hasil Tes';
						break;
					case $x =5:
						$data['status']='Sudah Ditetapkan';
						break;
				}
		}

		//OK
		// if ($this->cekPersonal($data['id_users'])==1)
		// {
		// 	$db = new PersonalModel();
		// 	$query = $db->query('SELECT * FROM pendaftar WHERE pendaftar.id_users='.$id);
		// 	foreach ($query->getRow() as $key => $value) {
		// 		$data[$key]=$value;
		// 	}
		// 	$data['status_pendaftaran']=1;
		//  }
		//  if ($this->cekNilai($data['id_users'])==2)
		//  {
		// 	 $db = new PersonalModel();
 		// 	 $query = $db->query('SELECT * FROM pendaftar JOIN nilai ON pendaftar.no_pendaftaran = nilai.no_pendaftaran
 		// 				WHERE pendaftar.id_users='.$id);
 		// 	 foreach ($query->getRow() as $key => $value) {
 		// 	 $data[$key]=$value;
		// 	 $data['status_pendaftaran']=2;
		//  	 }
		//  }
		//  if ($this->cekPendaftaran($data['id_users'])==3)
		//  {
		// 	 $db = new PersonalModel();
 		// 	 $query = $db->query('SELECT * FROM pendaftar
		// 		 										JOIN nilai ON pendaftar.no_pendaftaran = nilai.no_pendaftaran
		// 												JOIN pendaftaran ON nilai.no_pendaftaran =
 		// 												WHERE pendaftar.id_users='.$id);
 		// 	 foreach ($query->getRow() as $key => $value) {
 		// 	 $data[$key]=$value;
		// 	 $data['status_pendaftaran']=3;
		//  	 }
		//  }
		$data['attr']=$this->tutup();

		echo view('header_l', $data);
		echo view('profil',$data);
		echo view('footer');
	 }

	public function cekPersonal($id)
	{
		$model = new PersonalModel();
		$query = $model->where('id_users',$id);
		if ($query->countAllResults() > 0)
		{
			return TRUE;
		}
	}

	public function cekNilai($id)
	{
		$model = new NilaiModel();
		$query = $model->where('id_users',$id);
		if ($query->countAllResults() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function cekPendaftaran($id)
	{
		$model = new PendaftaranModel();
		//$model->table('pendaftaran');
		$query = $model->where('id_users',$id);
		if ($query->countAllResults() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function cekDobel($no_pendaftaran)
	{
		$model = new PendaftaranModel();
		$query = $model->where('id_users',$id);
		if ($query->countAllResults() > 0)
		{
			return TRUE;
		}
	}

	public function lupa()
	{

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
		} //end lupa

		public function tutup()
		{
			if (PENDAFTARAN == 'TUTUP')
			{
				$attr='disabled';
				return $attr;
			}
		}
	//--------------------------------------------------------------------

}
