<?php namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model{
  protected $table = 'tiket';
  protected $primaryKey = 'id_tiket';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['email', 'ttl','layanan', 'petugas'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){
    // $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');

    return $data;
  }
  //
  protected function beforeUpdate(array $data){
    // $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }
  //
  // protected function passwordHash(array $data){
  //   if(isset($data['data']['password']))
  //     $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
  //
  //   return $data;
  // }


}