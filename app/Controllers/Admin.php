<?php namespace App\Controllers;

// use App\Models\UserModel;
use App\Models\PaginasiModel;
// use App\Models\PendaftaranModel;
use App\Models\TiketModel;


class Admin extends BaseController
{
	public function __construct()
	{
		$this->db = db_connect();
		//$this->builder = $this->db->table("pendaftar");
		//return $this->db;
	}

	public function index()
	{
		$data = $this->session->get();
		//helper(['form']);
		// $db = new PaginasiModel;
		// $query = $db->query('SELECT * FROM pendaftar
		// 									JOIN nilai ON pendaftar.no_pendaftaran = nilai.no_pendaftaran
		// 									JOIN pendaftaran ON nilai.no_pendaftaran = pendaftaran.no_pendaftaran
		// 									WHERE pendaftar.status_pendaftaran=3');
		//
		// foreach ($query->getRow() as $key => $value) {
		// 		$data[$key]=$value;
		// 	}
		echo view('header_a',$data);
		// echo view('pendaftar',$data);
		echo view('footer_v',$data);
		//echo view('footer');
	}

	public function tampilPaginasi()
    {

	        $model = new PaginasiModel();
					$d=$model->semuaPendaftar();

	        $data['pendaftar'] = [
	            'nisn' => $d->nisn(),
	            'nama_pendaftar' => $d->nama_pendaftar(),
	            'alamat' => $d->alamat(),
	            'pager' => $d->pager
	        ];

	        if (empty($data))
	        {
	            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
	        }


	        echo view('tampil', $data);


    }


	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

	public function cekPendaftaran($email=FALSE)
	{
		$data = $this->session->get();
		//$db = db_connect();
		if (!$email) {

		}

		else {

		}
		$builder=$this->db->table('users')
								->getWhere(['email' => $email]);
		$data=$builder->getRowArray();

		$data['isian']=$this->cekIsian($data['id_users']);

echo "<pre>";
print_r($data);
		echo view('header_a',$data);
		echo view('cekpendaftaran',$data);


	}

	public function cekIsian($id)
	{
		$db = db_connect();
		$tabel=['pendaftar','nilai','pendaftaran'];

		foreach ($tabel as $x)
		{
			//$data['tabel']=$x;
			$builder=$db->table($x)
								->getWhere(['id_users' => $id]);
			$data[$x]=$builder->getRowArray(true);

		}
		return $data;
	}

	public function hapus($tabel,$no)
	{
		$db = db_connect();
		//$this->delete('pendaftar','no_pendaftaran',$no);
		//$this->delete('nilai','no_pendaftaran',$no);
		$this->delete($tabel,'no_pendaftaran',$no);
		// $session = session();
		// $session->setFlashdata('success', 'Perubahan data pendaftaran PPDB 2022 di SMKN 2 Pandeglang telah berhasil diperbaharui');
		return redirect()->to('users/profil');
	}

	// public function reset()
	// {
	// 	$db = db_connect();
	// 	$this->delete($tabel,'no_pendaftaran',$no);
	// //	return redirect()->to('users/profil');
	// }

	public function reset($email=FALSE)
	{
		helper(['form']);

	$data=$this->session->get();

		if (!$email) {
		$builder=$this->db->table('tiket')
							->getWhere(['petugas' => NULL]);
							$data=$this->session->get();
		$data['ajuan']=$builder->getResult();
		}
		else {
			// $email="'".$email."'";
			$data_u['password']='$2y$10$Qk317sTvbZoGKQ32yVHfJudVxFhMmlNdNey3RPo1CI4qnm72Qckfe';
			$u=$this->update('users','email',$email,$data_u);
			if ($u) {
								$waktu=date("l jS \of F Y h:i:s A");
				$data_p['petugas']=json_encode(['nama'=>$data['firstname']." ".$data['lastname'],'waktu'=>$waktu]);
				$u=$this->update('tiket','email',$email,$data_p);
				$session = session();

				$session->setFlashdata('success', 'Reset berhasil');
				return redirect()->to('admin/reset');
				}

		}

		echo view('header_a',$data);
		echo view('reset');
	}

	public function update($tabel,$kolom,$nilai_kolom,$data)
	{
		//$db = db_connect();
		$builder=$this->db->table($tabel);
		$builder->set($data);
		$builder->where($kolom, $nilai_kolom);
		$builder->update($data);
		return TRUE;
	}



	//--------------------------------------------------------------------

}
