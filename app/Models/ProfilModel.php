<?php namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model{
  protected $table = 'pendaftar';
  protected $primaryKey = 'id_pendaftar';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_pendaftar','id_users', 'no_pendaftaran', 'nisn', 'nama_pendaftar',
                            'jk','tempat_lahir','tanggal_lahir','alamat','nama_bapak','nama_ibu','nama_wali',
                            'pekerjaan_bapak','pekerjaan_ibu','pekerjaan_wali','no_telepon','no_wa',
                            'verifikasi','status_pendaftaran','updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];


  // 'nama_pendaftar' => $this->request->getVar('nama_pendaftar'),
  // 'nisn' => $this->request->getVar('nisn'),
  // 'jk' => $this->request->getVar('jk'),
  // 'tempat_lahir' => $this->request->getVar('tempat_lahir'),
  // 'tanggal_lahir' => $tanggal_lahir,
  // 'alamat'=>$alamat,
  // 'nama_bapak'=>$this->request->getVar('nama_bapak'),
  // 'nama_ibu'=>$this->request->getVar('nama_ibu'),
  // 'nama_wali'=>$this->request->getVar('nama_wali'),
  // 'pekerjaan_bapak'=>$this->request->getVar('pekerjaan_bapak'),
  // 'pekerjaan_ibu'=>$this->request->getVar('pekerjaan_ibu'),
  // 'pekerjaan_wali'=>$this->request->getVar('pekerjaan_wali'),
  // 'no_telepon'=>$this->request->getVar('no_telepon'),
  // 'no_wa'=>$this->request->getVar('no_wa'),

  protected function beforeInsert(array $data){
    //$data = $this->passwordHash($data);
    //$builder->from('pendaftar');
    //$data['data']['no_pendaftaran']=$builder->countAllResults(false)+1;
    $data['data']['tanggal_daftar'] = date('Y-m-d H:i:s');
    $data['data']['updated_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){
    //$data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }



}
