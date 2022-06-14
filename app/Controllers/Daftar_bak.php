<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PendaftarModel;


class Daftar extends BaseController
{

	// public function index()
	// {
	// 	helper(['form']);
	// 	$data=$this->session->get();
	//
	// 	if ($this->session->has('firstname')) {
	// 		echo view('header_l', $data);
	// 	}else {
	// 		echo view('header', $data);
	// 	}
	//
	// 	echo view('daftar');
	// 	echo view('footer');
	//
	// }

	public function index(){
		$data = [];
		helper(['form']);
		$data=$this->session->get();

		if ($this->request->getMethod() == 'post') {

			$ketentuan = [
				'nisn' => 'required|numeric|min_length[10]',
				'jk' => 'required',
				'tempat_lahir' => 'required',
				'tgl' => 'required',
				'bln' => 'required',
				'thn' => 'required',
				'kelurahan'=>'required',
				'rt'=>'required|numeric',
				'rw'=>'required|numeric',
				'kecamatan'=>'required',
				'kabupaten'=>'required',
				'nama_bapak'=>'required',
				'nama_ibu'=>'required',
				'pekerjaan_bapak'=>'required',
				'pekerjaan_ibu'=>'required',
				'no_telepon'=>'required|numeric',
				'sekolah_asal'=>'required',
				'tahun_lulus'=>'required|numeric',
				'jalur_pendaftaran'=>'required',
				'program_keahlian_1'=>'required',
				'program_keahlian_2'=>'required',
			];

			$errors = [
				'nisn'=> ['required'=>'NISN belum diisi',
									'min_length'=>'Isian NISN kurang dari 10 digit',
									'numeric'=>'NISN hanya boleh berisi angka'
								],
				'jk'=>['required'=> 'Jenis kelamin belum dipilih'],
				'tempat_lahir'=> ['required'=>'Tempat kelahiran anda belum diisi'],
				'tgl'=>['required'=>'Tanggal kelahiran belum diisi'],
				'bln'=>['required'=>'Bulan kelahiran belum diisi'],
				'thn'=>['required'=>'Tahun kelahiran belum diisi'],
				'kelurahan'=>['required'=>'Kelurahan belum diisi'],
				'rt'=>['required'=>'RT belum diisi','numeric'=>'Kolom RT hanya bisa diisi angka'],
				'rw'=>['required'=>'Rw belum diisi','numeric'=>'Kolom RW hanya bisa diisi angka'],
				'kecamatan'=>['required'=>'Kecamatan belum diisi'],
				'kabupaten'=>['required'=>'Kabupaten belum diisi'],
				'nama_bapak'=>['required'=>'Nama Bapak belum diisi'],
				'nama_ibu'=>['required'=>'Nama Ibu belum diisi'],
				'pekerjaan_bapak'=>['required'=>'Pekerjaan Bapak belum diisi'],
				'pekerjaan_ibu'=>['required'=>'Pekerjaan Ibu belum diisi'],
				'no_telepon'=>['required'=>'No telepon belum diisi','numeric'=>'No telepon hanya bisa diisi angka'],
				'sekolah_asal'=>['required'=>'Sekolah asal belum diisi'],
				'tahun_lulus'=>['required'=>'Tahun lulus belum diisi', 'numeric'=>'Tahun lulus hanya bisa diisi angka'],
				'jalur_pendaftaran'=>['required'=>'Jalur pendaftaran belum diisi'],
				'program_keahlian_1'=>['required'=>'Program Keahlian pilihan 1 belum diisi'],
				'program_keahlian_2'=>['required'=>'Program Keahlian pilihan 1 belum diisi']
			];

			if (! $this->validate($ketentuan,$errors)) {
				$data['validation'] = $this->validator;
				echo view('header',$data);
				echo view('daftar',$data);
        return;

			}else{
				$model = new PendaftarModel();

				$tanggal_lahir=$this->request->getVar('thn').'-'.$this->request->getVar('bln').'-'.$this->request->getVar('tgl');
				$alamat = $this->request->getVar('jalan').$this->request->getVar('kampung').$this->request->getVar('kelurahan').$this->request->getVar('rt').$this->request->getVar('rw').$this->request->getVar('kecamatan').$this->request->getVar('kabupaten');
				$DataBaru = [
					'nama_pendaftar' => $this->request->getVar('nama_pendaftar'),
					'nisn' => $this->request->getVar('nisn'),
					'jk' => $this->request->getVar('jk'),
					'tempat_lahir' => $this->request->getVar('tempat_lahir'),
					'tanggal_lahir' => $tanggal_lahir,
					'alamat'=>$alamat,
					'nama_bapak'=>$this->request->getVar('nama_bapak'),
					'nama_ibu'=>$this->request->getVar('nama_ibu'),
					'nama_wali'=>$this->request->getVar('nama_wali'),
					'pekerjaan_bapak'=>$this->request->getVar('pekerjaan_bapak'),
					'pekerjaan_ibu'=>$this->request->getVar('pekerjaan_ibu'),
					'pekerjaan_wali'=>$this->request->getVar('pekerjaan_wali'),
					'no_telepon'=>$this->request->getVar('no_telepon'),
					'no_wa'=>$this->request->getVar('no_wa'),
					'sekolah_asal'=>$this->request->getVar('sekolah_asal'),
					'tahun_lulus'=>$this->request->getVar('tahun_lulus'),
					'jalur_pendaftaran'=>$this->request->getVar('jalur_pendaftaran'),
					'program_keahlian_1'=>$this->request->getVar('program_keahlian_1'),
					'program_keahlian_2'=>$this->request->getVar('program_keahlian_2'),
					'id_users'=>$data['id_users'],
				];

				$model->save($DataBaru);
				$session = session();
				$session->setFlashdata('success', 'Data pendaftaran PPDB 20222 di SMKN 2 Pandeglang telah disimpan');
				return redirect()->to('users/profil');

			}
		}


		echo view('header',$data);
		echo view('daftar_personal',$data);
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

		if ($this->cekPendaftaran($data['id_users']))
		{
			$data['status']=1;
		}
		else {
				$data['status']=0;
		}
		echo view('header_l', $data);

		echo view('profil',$data);
	}

	public function cekPendaftaran($id)
	{
		$model = new PendaftarModel();
		$builder = $model->table('pendaftar');

		$query = $builder->where('id_users',$id);

		if ($query->countAllResults() > 0)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}



	}

	public function indexx()
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


	//--------------------------------------------------------------------

}
