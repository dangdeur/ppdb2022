<?php namespace App\Controllers;

use App\Models\PersonalModel;
use App\Models\VerifikasiModel;
use App\Models\PendaftaranModel;
use App\Models\NilaiModel;


class Verifikasi extends BaseController
{

	public function index()
	{
		$data = $this->session->get();
		//helper(['form']);
		echo view('header_a',$data);
		echo view('footer_v',$data);
		//echo view('footer');
	}



	public function cari()
 {
	helper(['form']);
	$data = $this->session->get();
	if(is_null($this->request->getGet('cari')))
		{
			echo view('header_a',$data);
			echo view('verifikasiberkas',$data);
		}
	  else
	  {
	  	$db= new VerifikasiModel;
	  	$data['pendaftar']=$db->pendaftar($this->request->getGet('cari'));

	  	echo view('hasilcari',$data);
			echo view('footer_v');
	  }
	}

	public function cari2() {
	helper(['form']);
	$data = $this->session->get();
	if(is_null($this->request->getGet('cari')))
		{
			echo view('header_a',$data);
			echo view('verifikasiberkas2',$data);
		}
	  else
	  {
	  	$db= new VerifikasiModel;
	  	$data['pendaftar']=$db->pendaftar($this->request->getGet('cari'));
	  	echo view('hasilcari2',$data);
	  }
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

	function verifikasiberkas($no_pendaftaran)
	{
		helper(['form']);
		$data=$this->session->get();


		$db = \Config\Database::connect();
		$builder = $db->table('pendaftar');
    $builder->where('pendaftar.no_pendaftaran',$no_pendaftaran);
  	$builder->join('nilai','nilai.no_pendaftaran=pendaftar.no_pendaftaran');
    $builder->join('pendaftaran','nilai.no_pendaftaran=pendaftaran.no_pendaftaran');

		$query=$builder->get();
		foreach ($query->getRow() as $key => $value) {
				$data[$key]=$value;
		}

		//////////// post
		if ($this->request->getMethod() == 'post') {
			//$no_pendaftaran=$no_pendaftaran;
			//$id_pendaftar=$this->request->getVar('id_pendaftar');
			$ketentuan = [
				'nama_pendaftar'=>'required',
				'nisn' => 'required|numeric|min_length[10]',
				'jk' => 'required|max_length[1]',
				'tempat_lahir' => 'required',
				'tanggal_lahir' => 'required',
				'alamat' => 'required',
				'nama_bapak'=>'required',
				'nama_ibu'=>'required',
				'no_telepon'=>'required|numeric',
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
				'nilai_mat5'=>'required|numeric|less_than[100]',
				'program_keahlian_1'=>'required',
				'program_keahlian_2'=>'required'
			];

			$errors = [
				'nisn'=> ['required'=>'NISN belum diisi',
									'min_length'=>'Isian NISN kurang dari 10 digit',
									'numeric'=>'NISN hanya boleh berisi angka'
									// 'is_unique' => 'NISN tidak valid atau sudah digunakan'
								],
				'nama_pendaftar'=>['required'=> 'Nama pendaftar belum diisi'],
				'jk'=>['required'=> 'Jenis kelamin belum dipilih',
								'max_length' => 'JK tidak boleh lebih dari 1 huruf'],
				'tempat_lahir'=> ['required'=>'Tempat kelahiran belum diisi'],
				'tanggal_lahir'=> ['required'=>'Tanggal lahir belum diisi'],
				'alamat'=>['required'=>'Alamat belum diisi'],
				'nama_bapak'=>['required'=>'Nama Bapak belum diisi'],
				'nama_ibu'=>['required'=>'Nama Ibu belum diisi'],
				'no_telepon'=>['required'=>'No telepon belum diisi','numeric'=>'No telepon hanya bisa diisi angka'],
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
				'program_keahlian_1'=>['required'=>'Program Keahlian I belum dipilih'],
				'program_keahlian_2'=>['required'=>'Program Keahlian II belum dipilih']

			];

			if (! $this->validate($ketentuan,$errors)) {
				$data['validation'] = $this->validator;
				echo view('header_a',$data);
				echo view('editberkas',$data);
				return;

			}else{
				//$no_pendaftaran = $this->request->getVar('no_pendaftaran');
				$verifikator_=['petugas'=>$data['firstname']." ".$data['lastname'],'waktu'=>date('Y-m-d H:i:s')];
				$verifikator=json_encode($verifikator_);
				$data_personal_baru = [
					'nama_pendaftar' => $this->request->getVar('nama_pendaftar'),
					// 'no_pendaftaran' => $this->request->getVar('no_pendaftaran'),
					'nisn' => $this->request->getVar('nisn'),
					'jk' => $this->request->getVar('jk'),
					'tempat_lahir' => $this->request->getVar('tempat_lahir'),
					'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
					'alamat'=>$this->request->getVar('alamat'),
					'nama_bapak'=>$this->request->getVar('nama_bapak'),
					'nama_ibu'=>$this->request->getVar('nama_ibu'),
					'no_telepon'=>$this->request->getVar('no_telepon'),
					'no_wa'=>$this->request->getVar('no_wa'),
					'no_kip'=>$this->request->getVar('no_kip'),
					'no_kks'=>$this->request->getVar('no_kks'),
					'verifikasi'=>$verifikator
				];
////////////////////////////////

				$this->update('pendaftar','no_pendaftaran',$no_pendaftaran,$data_personal_baru);

				////////////////////////nilai
				$data_nilai_baru = [
					'sekolah_asal'=>$this->request->getVar('sekolah_asal'),
					'tahun_lulus'=>$this->request->getVar('tahun_lulus'),
					'prestasi1'=>$this->request->getVar('prestasi1'),
					'prestasi2'=>$this->request->getVar('prestasi2'),
					'prestasi3'=>$this->request->getVar('prestasi3'),
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
					'nilai_ipa5'=>$this->request->getVar('nilai_ipa5')
				];
					$this->update('nilai','no_pendaftaran',$no_pendaftaran,$data_nilai_baru);
				////////////////////


				///////////// PK

				$data_pendaftaran_baru = [
					'program_keahlian_1'=>$this->request->getVar('program_keahlian_1'),
					'program_keahlian_2'=>$this->request->getVar('program_keahlian_2')
				];
				$this->update('pendaftaran','no_pendaftaran',$no_pendaftaran,$data_pendaftaran_baru);
				/////////////////
				//echo $pn;
				$session = session();
				$session->setFlashdata('success', 'Perubahan data '.$data_personal_baru['nama_pendaftar'].' telah berhasil diperbaharui');
				return redirect()->to('verifikasi/cari');
				//echo view('tes',$data);

			}
		}


		/////////////////

		echo view('header_a', $data);
		echo view('editberkas',$data);
		echo view('footer');

		}


		public function update($tabel,$kolom,$nilai_kolom,$data)
		{
			$db = db_connect();
			$builder=$db->table($tabel);
			$builder->set($data);
			$builder->where($kolom, $nilai_kolom);
			$builder->update($data);
			//$u=$builder->getCompiledUpdate();
			//return $u;
		}

	//--------------------------------------------------------------------

}
