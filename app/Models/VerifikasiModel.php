<?php
namespace App\Models;
use CodeIgniter\Model;

class VerifikasiModel extends Model
{
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
}
?>
