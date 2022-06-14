<?php
namespace App\Models;

use CodeIgniter\Model;

class PaginasiModel extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';

    protected $returnType = 'array';

    protected $allowedFields = ['nisn', 'nama','alamat'];
    protected $useTimestamps = false;

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function semuaPendaftar()
    {
        return $this
                    ->table('pendaftar')
                    ->select()
                    ->join('nilai','nilai.no_pendaftaran=pendaftar.no_pendaftaran')
                    ->join('pendaftaran','nilai.no_pendaftaran=pendaftaran.no_pendaftaran')
                    ->orderBy('nama_pendaftar')
                    ->paginate(10);
    }

}
