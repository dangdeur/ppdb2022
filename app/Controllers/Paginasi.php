<?php namespace App\Controllers;

use App\Models\PaginasiModel;

class Paginasi extends BaseController{

  public function index(){
    return redirect()->route('tampilSemua');
  }

  public function tampilSemua(){
    $request = service('request');
    $searchData = $request->getGet();

    $search = "";
    if(isset($searchData) && isset($searchData['search'])){
       $search = $searchData['search'];
    }

    // Get data
    $users = new PaginasiModel();

    if($search == ''){
      $paginateData = $users->paginate(5);
    }else{
      $paginateData = $users->select('*')
          ->orLike('nisn', $search)
          ->orLike('nama_pendaftar', $search)
          ->orLike('alamat', $search)
          ->paginate(5);
    }
$data = $this->session->get();
    $data['pendaftar'] = $paginateData;
    $data['pager'] = $users->pager;
    $data['search'] = $search;

//echo "<pre>";
//print_r($data);
    return view('header_a',$data);
    return view('tampil',$data);
    return view('footer');
  }

}
