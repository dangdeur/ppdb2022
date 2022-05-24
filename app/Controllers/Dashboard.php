<?php namespace App\Controllers;
use App\Models\PendaftarModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{

	public function index()
	{

		$data = [];
		helper(['form']);
		$model = new UserModel();
		if ($this->session->has('firstname')) {
		echo view('header_l', $data);
		}
		$data['user'] = $model->where('id_users', session()->get('id_users'))->first();
		echo view('dashboard',$data);
		//echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
