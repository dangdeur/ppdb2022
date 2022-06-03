<?php namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model{
  protected $table = 'pendaftar';
  protected $primaryKey = 'id_pendaftar';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_pendaftar','id_users', 'no_pendaftaran', 'nisn', 'nama_pendaftar', 'updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];




  protected function beforeInsert(array $data){
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }


}
