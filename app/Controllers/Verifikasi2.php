<?php namespace App\Controllers;

// use App\Models\UserModel;
use App\Models\VerifikasiModel2;
// use App\Models\PendaftaranModel;
// use App\Models\NilaiModel;


class Verifikasi2 extends BaseController
{

	public function index()
	{
		$data = $this->session->get();
		//helper(['form']);
		echo view('header_a',$data);
		echo view('footer_v',$data);
		//echo view('footer');
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
	  	$db= new VerifikasiModel2;
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

		echo view('header_a', $data);
		echo view('editberkas',$data);
		echo view('footer');

		}




	//--------------------------------------------------------------------

}
