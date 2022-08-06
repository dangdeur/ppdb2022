<?php namespace App\Models;

use CodeIgniter\Model;

class PersonalModel extends Model{
  protected $table = 'pendaftar';
  protected $primaryKey = 'id_pendaftar';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_pendaftar','id_users', 'no_pendaftaran', 'nisn', 'nama_pendaftar',
                            'jk','tempat_lahir','tanggal_lahir','alamat','nama_bapak','nama_ibu',
                            // 'nama_wali','pekerjaan_bapak','pekerjaan_ibu','pekerjaan_wali',
                            'no_telepon','no_wa','no_kip','no_kks',
                            'verifikasi','status_pendaftaran','updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  function pendaftar($cari){
    $db      = \Config\Database::connect();
    $builder = $db->table('pendaftar');
    $builder->like('pendaftar.no_pendaftaran',$cari);
    $builder->orLike('pendaftar.nama_pendaftar',$cari);
    $builder->join('nilai','nilai.no_pendaftaran=pendaftar.no_pendaftaran');
    $builder->join('pendaftaran','nilai.no_pendaftaran=pendaftaran.no_pendaftaran');
    $query=$builder->get();
    $jumlah_pendaftar=$builder->countAllResults();

      if($jumlah_pendaftar > 0)
      {
        return $query->getResult();
      }
      else
      {
          return null;
      }

    }

  protected function beforeInsert(array $data){

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
