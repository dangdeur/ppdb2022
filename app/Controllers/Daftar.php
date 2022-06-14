<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PersonalModel;
use App\Models\PendaftaranModel;
use App\Models\NilaiModel;


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

	public function personal(){
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
				'alamat' => 'required',
				// 'kelurahan'=>'required',
				// 'rt'=>'required|numeric',
				// 'rw'=>'required|numeric',
				// 'kecamatan'=>'required',
				// 'kabupaten'=>'required',
				'nama_bapak'=>'required',
				'nama_ibu'=>'required',
				// 'pekerjaan_bapak'=>'required',
				// 'pekerjaan_ibu'=>'required',
				'no_telepon'=>'required|numeric',
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
				'alamat'=>['required'=>'Alamat belum diisi'],
				// 'kelurahan'=>['required'=>'Kelurahan belum diisi'],
				// 'rt'=>['required'=>'RT belum diisi','numeric'=>'Kolom RT hanya bisa diisi angka'],
				// 'rw'=>['required'=>'Rw belum diisi','numeric'=>'Kolom RW hanya bisa diisi angka'],
				// 'kecamatan'=>['required'=>'Kecamatan belum diisi'],
				// 'kabupaten'=>['required'=>'Kabupaten belum diisi'],
				'nama_bapak'=>['required'=>'Nama Bapak belum diisi'],
				'nama_ibu'=>['required'=>'Nama Ibu belum diisi'],
				// 'pekerjaan_bapak'=>['required'=>'Pekerjaan Bapak belum diisi'],
				// 'pekerjaan_ibu'=>['required'=>'Pekerjaan Ibu belum diisi'],
				'no_telepon'=>['required'=>'No telepon belum diisi','numeric'=>'No telepon hanya bisa diisi angka'],

			];

			if (! $this->validate($ketentuan,$errors)) {
				$data['validation'] = $this->validator;
				echo view('header_l',$data);
				echo view('daftar_personal',$data);
        return;

			}else{
				$model = new PersonalModel();
				if ($this->hitungPendaftar()<10)
				{
					$no_pendaftaran=KODESEKOLAH."-"."00".$this->hitungPendaftar();
				}
				elseif ($this->hitungPendaftar()<100)
				{
					$no_pendaftaran=KODESEKOLAH."-"."0".$this->hitungPendaftar();
				}
				else
				{
					$no_pendaftaran=KODESEKOLAH."-".$this->hitungPendaftar();
				}


				$tanggal_lahir=$this->request->getVar('thn').'-'.$this->request->getVar('bln').'-'.$this->request->getVar('tgl');
				//$alamat = $this->request->getVar('jalan')." ".$this->request->getVar('kampung')." ".$this->request->getVar('kelurahan')." ".$this->request->getVar('rt')." ".$this->request->getVar('rw')." ".$this->request->getVar('kecamatan')." ".$this->request->getVar('kabupaten');
				$DataBaru = [
					'no_pendaftaran'=>$no_pendaftaran,
					'nama_pendaftar' => $this->request->getVar('nama_pendaftar'),
					'nisn' => $this->request->getVar('nisn'),
					'jk' => $this->request->getVar('jk'),
					'tempat_lahir' => $this->request->getVar('tempat_lahir'),
					'tanggal_lahir' => $tanggal_lahir,
					'alamat'=>$this->request->getVar('alamat'),
					'nama_bapak'=>$this->request->getVar('nama_bapak'),
					'nama_ibu'=>$this->request->getVar('nama_ibu'),
					'nama_wali'=>$this->request->getVar('nama_wali'),
					// 'pekerjaan_bapak'=>$this->request->getVar('pekerjaan_bapak'),
					// 'pekerjaan_ibu'=>$this->request->getVar('pekerjaan_ibu'),
					// 'pekerjaan_wali'=>$this->request->getVar('pekerjaan_wali'),
					'no_telepon'=>$this->request->getVar('no_telepon'),
					'no_wa'=>$this->request->getVar('no_wa'),
					'no_kip'=>$this->request->getVar('no_kip'),
					'no_kks'=>$this->request->getVar('no_kks'),
					'status_pendaftaran'=>1,
					// 'sekolah_asal'=>$this->request->getVar('sekolah_asal'),
					// 'tahun_lulus'=>$this->request->getVar('tahun_lulus'),
					// 'jalur_pendaftaran'=>$this->request->getVar('jalur_pendaftaran'),
					// 'program_keahlian_1'=>$this->request->getVar('program_keahlian_1'),
					// 'program_keahlian_2'=>$this->request->getVar('program_keahlian_2'),
					'id_users'=>$data['id_users']
				];

				$model->save($DataBaru);
				$session = session();
				$session->setFlashdata('success', 'Data personal untuk pendaftaran PPDB 2022 di SMKN 2 Pandeglang telah berhasil disimpan');
				return redirect()->to('users/profil');

			}
		}


		echo view('header_l',$data);
		echo view('daftar_personal',$data);
		echo view('footer');
	}

	public function nilai($no){
		$data = [];
		helper(['form']);
		$data=$this->session->get();
		//$no_pendaftaran=$no;
		$data['no_pendaftaran']=$no;


		if ($this->request->getMethod() == 'post') {

			$ketentuan = [
				'sekolah_asal'=>'required',
				'tahun_lulus'=>'required|numeric',
				'nilai_bind1'=>'required|numeric|less_than[100]',
				'nilai_bind2'=>'required|numeric|less_than[100]',
				'nilai_bind3'=>'required|numeric|less_than[100]',
				'nilai_bind4'=>'required|numeric|less_than[100]',
				'nilai_bind5'=>'required|numeric|less_than[100]',
				'nilai_bing1'=>'required|numeric|less_than[100]',
				'nilai_bing2'=>'required|numeric|less_than[100]',
				'nilai_bing3'=>'required|numeric|less_than[100]',
				'nilai_bing4'=>'required|numeric|less_than[100]',
				'nilai_bing5'=>'required|numeric|less_than[100]',
				'nilai_ipa1'=>'required|numeric|less_than[100]',
				'nilai_ipa2'=>'required|numeric|less_than[100]',
				'nilai_ipa3'=>'required|numeric|less_than[100]',
				'nilai_ipa4'=>'required|numeric|less_than[100]',
				'nilai_ipa5'=>'required|numeric|less_than[100]',
				'nilai_mat1'=>'required|numeric|less_than[100]',
				'nilai_mat2'=>'required|numeric|less_than[100]',
				'nilai_mat3'=>'required|numeric|less_than[100]',
				'nilai_mat4'=>'required|numeric|less_than[100]',
				'nilai_mat5'=>'required|numeric|less_than[100]'
			];

			$errors = [
				'sekolah_asal'=>['required'=>'Sekolah asal belum diisi'],
				'tahun_lulus'=>['required'=>'Tahun lulus belum diisi', 'numeric'=>'Tahun lulus hanya bisa diisi angka'],
				'nilai_bind1'=>['required'=>'Nilai Bahasa Indonesia Semester 1 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bind2'=>['required'=>'Nilai Bahasa Indonesia Semester 2 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bind3'=>['required'=>'Nilai Bahasa Indonesia Semester 3 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bind4'=>['required'=>'Nilai Bahasa Indonesia Semester 4 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bind5'=>['required'=>'Nilai Bahasa Indonesia Semester 5 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bing1'=>['required'=>'Nilai Bahasa Inggris Semester 1 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bing2'=>['required'=>'Nilai Bahasa Inggris Semester 2 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bing3'=>['required'=>'Nilai Bahasa Inggris Semester 3 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
			 'nilai_bing4'=>['required'=>'Nilai Bahasa Inggris Semester 4 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_bing5'=>['required'=>'Nilai Bahasa Inggris Semester 5 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_mat1'=>['required'=>'Nilai Matematika Semester 1 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_mat2'=>['required'=>'Nilai Matematika Semester 2 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_mat3'=>['required'=>'Nilai Matematika Semester 3 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_mat4'=>['required'=>'Nilai Matematika Semester 4 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_mat5'=>['required'=>'Nilai Matematika Semester 5 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_ipa1'=>['required'=>'Nilai IPA Semester 1 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_ipa2'=>['required'=>'Nilai IPA Semester 2 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_ipa3'=>['required'=>'Nilai IPA Semester 3 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_ipa4'=>['required'=>'Nilai IPA Semester 4 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],
				'nilai_ipa5'=>['required'=>'Nilai IPA Semester 5 belum diisi',
												'numeric' => 'Nilai hanya bisa diisi angka',
												'less_than' => ['100','100']],


			];
			if (!empty($this->request->getVar('prestasi1')) &&
					!empty($this->request->getVar('tingkat1')) &&
					!empty($this->request->getVar('lomba1'))
					)
					{
						$prestasi1=$this->request->getVar('prestasi1')." Tingkat ".$this->request->getVar('tingkat1')." ".$this->request->getVar('lomba1');
					}
					else {
						$prestasi1='';
					}

					if (!empty($this->request->getVar('prestasi2')) &&
							!empty($this->request->getVar('tingkat2')) &&
							!empty($this->request->getVar('lomba2'))
							)
							{
								$prestasi2=$this->request->getVar('prestasi2')." Tingkat ".$this->request->getVar('tingkat2')." ".$this->request->getVar('lomba2');
							}
							else {
								$prestasi2='';
							}

							if (!empty($this->request->getVar('prestasi3')) &&
									!empty($this->request->getVar('tingkat3')) &&
									!empty($this->request->getVar('lomba3'))
									)
									{
										$prestasi3=$this->request->getVar('prestasi3')." Tingkat".$this->request->getVar('tingkat3')." ".$this->request->getVar('lomba3');
									}
									else {
										$prestasi3='';
									}

			if (! $this->validate($ketentuan,$errors)) {
				$data['validation'] = $this->validator;
				echo view('header_l',$data);
				echo view('daftar_nilai',$data);
				return;

			}else{
				$model = new NilaiModel();

				$DataBaru = [
					'sekolah_asal'=>$this->request->getVar('sekolah_asal'),
					'tahun_lulus'=>$this->request->getVar('tahun_lulus'),
					'prestasi1'=>$prestasi1,
					'prestasi2'=>$prestasi2,
					'prestasi3'=>$prestasi3,
					'hafalan'=>$this->request->getVar('hafalan'),
					'nilai_bing1'=>$this->request->getVar('nilai_bing1'),
					'nilai_bing2'=>$this->request->getVar('nilai_bing2'),
					'nilai_bing3'=>$this->request->getVar('nilai_bing3'),
					'nilai_bing4'=>$this->request->getVar('nilai_bing4'),
					'nilai_bing5'=>$this->request->getVar('nilai_bing5'),
					'nilai_bind1'=>$this->request->getVar('nilai_bind1'),
					'nilai_bind2'=>$this->request->getVar('nilai_bind2'),
					'nilai_bind3'=>$this->request->getVar('nilai_bind3'),
					'nilai_bind4'=>$this->request->getVar('nilai_bind4'),
					'nilai_bind5'=>$this->request->getVar('nilai_bind5'),
					'nilai_mat1'=>$this->request->getVar('nilai_mat1'),
					'nilai_mat2'=>$this->request->getVar('nilai_mat2'),
					'nilai_mat3'=>$this->request->getVar('nilai_mat3'),
					'nilai_mat4'=>$this->request->getVar('nilai_mat4'),
					'nilai_mat5'=>$this->request->getVar('nilai_mat5'),
					'nilai_ipa1'=>$this->request->getVar('nilai_ipa1'),
					'nilai_ipa2'=>$this->request->getVar('nilai_ipa2'),
					'nilai_ipa3'=>$this->request->getVar('nilai_ipa3'),
					'nilai_ipa4'=>$this->request->getVar('nilai_ipa4'),
					'nilai_ipa5'=>$this->request->getVar('nilai_ipa5'),
					'id_users'=>$data['id_users'],
					'no_pendaftaran'=>$no,

				];

				$model->save($DataBaru);
				$this->setStatus($data['id_users'],2);
				$session = session();
				$session->setFlashdata('success', 'Data Nilai/Sekolah telah disimpan');
				return redirect()->to('users/profil');

			}
		}


		echo view('header_l',$data);
		echo view('daftar_nilai',$data);
		echo view('footer');
	}


	public function ppdb($no_pendaftaran){
		$data = [];
		helper(['form']);
		$data=$this->session->get();
		$data['waktu_ujian']=$this->dataTes($no_pendaftaran);
		$data['no_pendaftaran']=$no_pendaftaran;

		if ($this->request->getMethod() == 'post') {

			$ketentuan = [
				'program_keahlian_1'=>'required',
				'program_keahlian_2'=>'required'
			];

			$errors = [
				'program_keahlian_1'=>['required'=>'Program Keahlian I belum dipilih'],
				'program_keahlian_2'=>['required'=>'Program Keahlian II belum dipilih']

			];

			if (! $this->validate($ketentuan,$errors)) {
				$data['validation'] = $this->validator;
				echo view('header_l',$data);
				echo view('daftar_ppdb',$data);
				return;

			}else{
				$model = new PendaftaranModel();
				$data['password']=random_string('alnum', 4);
				$DataBaru = [
					'no_pendaftaran'=>$no_pendaftaran,
					'program_keahlian_1'=>$this->request->getVar('program_keahlian_1'),
					'program_keahlian_2'=>$this->request->getVar('program_keahlian_2'),
					'waktu_ujian'=>$data['waktu_ujian'],
					'password_ujian'=>$data['password'],
					'id_users'=>$data['id_users']
				];

				$model->save($DataBaru);
				$this->setStatus($data['id_users'],3);
				$session = session();
				$session->setFlashdata('success', 'Data pendaftaran PPDB telah disimpan');
				return redirect()->to('users/profil');

			}
		}


		echo view('header_l',$data);
		echo view('daftar_ppdb',$data);
		echo view('footer');
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

	public function hitungPendaftar()
	{
		$db = db_connect();
		$builder = $db->table('pendaftar');
		return $builder->countAll()+1;
	}

	public function setStatus($id_users,$status)
	{
		//	$db      = \Config\Database::connect();
		$data = ['status_pendaftaran' => $status];
		$db = db_connect();
		$builder = $db->table('pendaftar');
		$builder->where('id_users', $id_users);
		$builder->update($data);

	}

	public function dataTes($no)
	{
		helper(['text']);
		$no_=explode("-",$no);
		$no_urut=intval($no_[1]);
		//echo $no_urut;


		//$tes=[];
		switch ($no_urut) {
			case $no_urut<=140:
				$tes='21 Juni 2022 Sesi 1 (08.00)';
			break;

			case $no_urut<=280:
					$tes='21 Juni 2022 Sesi 2 (10.30)';
			break;

			case $no_urut<=420:
					$tes='22 Juni 2022 Sesi 1 (08.00)';
			break;

			case $no_urut<=560:
					$tes='22 Juni 2022 Sesi 2 (10.30)';
			break;

			case $no_urut<=700:
					$tes='23 Juni 2022 Sesi 1 (08.00)';
			break;

			case $no_urut<=840:
					$tes='23 Juni 2022 Sesi 2 (10.30)';
			break;

			case $no_urut<=980:
					$tes='24 Juni 2022 Sesi 1 (08.00)';
			break;

			case $no_urut<=1120:
					$tes='24 Juni 2022 Sesi 2 (10.30)';
			break;

			case $no_urut<=1260:
					$tes='25 Juni 2022 Sesi 1 (08.00)';
			break;

			case $no_urut<=1400:
					$tes='25 Juni 2022 Sesi 2 (10.30)';
			break;


		}
return $tes;
	}


	public function namaSekolah()
	{
		helper(['form']);
    $data = [];
 		$db      = \Config\Database::connect();
    $builder = $db->table('sekolah');
 		$query = $builder->like('nama_sekolah', $this->request->getVar('nama_sekolah'))
    								 ->limit(10)->get();
    $data = $query->getResult();
    echo json_encode($data);

	}

	public function edit($no)
	{
		
	}


	//--------------------------------------------------------------------

}
