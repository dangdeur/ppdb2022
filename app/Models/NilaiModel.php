<?php namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model{
  protected $table = 'nilai';
  protected $primaryKey = 'id_nilai';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_nilai','id_pendaftar','id_users',
                            'no_pendaftaran',
                            'sekolah_asal', 'tahun_lulus',
                            'prestasi1','prestasi2','prestasi3','hafalan',
                            'nilai_ipa1','nilai_ipa2','nilai_ipa3','nilai_ipa4','nilai_ipa5',
                            'nilai_bind1','nilai_bind2','nilai_bind3','nilai_bind4','nilai_bind5',
                            'nilai_bing1','nilai_bing2','nilai_bing3','nilai_bing4','nilai_bing5',
                            'nilai_mat1','nilai_mat2','nilai_mat3','nilai_mat4','nilai_mat5',
                            'status_pendaftaran','updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  protected function beforeInsert(array $data){
  //  $data['data']['tanggal_daftar'] = date('Y-m-d H:i:s');
    $data['data']['updated_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){
    //$data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }


}
