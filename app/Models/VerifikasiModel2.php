<?php
namespace App\Models;
use CodeIgniter\Model;

class VerifikasiModel2 extends Model
{
  function pendaftar($cari){
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->like('users.email',$cari);
    $builder->orLike('users.id_users',$cari);
    $builder->orLike('pendaftar.nama',$cari);
    $builder->orLike('nilai.sekolah_asal',$cari);
      $builder->join('pendaftar','pendaftar.id_users=users.id_users');
    $builder->join('nilai','nilai.id_users=pendaftar.id_users');
    $builder->join('pendaftaran','nilai.id_users=pendaftaran.id_users');
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
}
?>
