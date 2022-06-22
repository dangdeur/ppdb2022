<?php namespace App\Controllers;

use App\Models\PaginasiModel;

class Paginasi extends BaseController{

  // public function index(){
  //   return redirect()->route('tampilSemua');
  // }

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
      $paginateData = $users->paginate(20);
    }else{
      $paginateData = $users->select('*')
          ->orLike('no_pendaftaran', $search)
          ->orLike('nisn', $search)
          ->orLike('nama_pendaftar', $search)
          ->orLike('sekolah_asal', $search)
          ->paginate(20);
    }
    $data = $this->session->get();
    $data['pendaftar'] = $paginateData;
    $data['pager'] = $users->pager;
    $data['search'] = $search;


    //return view('header_a',$data);
    return view('tampil2',$data);
    //return view('footer');
  }

}
