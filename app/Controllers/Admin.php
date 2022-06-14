<?php namespace App\Controllers;

// use App\Models\UserModel;
use App\Models\PaginasiModel;
// use App\Models\PendaftaranModel;
// use App\Models\NilaiModel;


class Admin extends BaseController
{

	public function index()
	{
		$data = $this->session->get();
		//helper(['form']);
		$db = new PersonalModel;
		$query = $db->query('SELECT * FROM pendaftar
											JOIN nilai ON pendaftar.no_pendaftaran = nilai.no_pendaftaran
											JOIN pendaftaran ON nilai.no_pendaftaran = pendaftaran.no_pendaftaran
											WHERE pendaftar.status_pendaftaran=3');

		foreach ($query->getRow() as $key => $value) {
				$data[$key]=$value;
			}
		echo view('header_v',$data);
		echo view('pendaftar',$data);
		echo view('footer_v',$data);
		//echo view('footer');
	}

	public function tampilPaginasi()
    {

	        $model = new PaginasiModel();

	        $data['pendaftar'] = [
	            'nisn' => $model->nisn(),
	            'nama_pendaftar' => $model->nama_pendaftar(),
	            'alamat' => $model->alamat(),
	            'pager' => $model->pager
	        ];

	        if (empty($data))
	        {
	            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ');
	        }


	        echo view('tampil', $data);


    }


	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}


	//--------------------------------------------------------------------

}
