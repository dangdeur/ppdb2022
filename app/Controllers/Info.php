<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PersonalModel;
use App\Models\PendaftaranModel;
use App\Models\NilaiModel;
use App\Models\TiketModel;



class Info extends BaseController
{
    public function index()
    {
        if ($this->session->has('firstname')) {
          echo view('header_l');
        }else {
          echo view('header');
        }

        $data['pengguna']=$this->hitung('users');
        $data['pendaftar']=$this->hitung('pendaftar');
        $data['nilai']=$this->hitung('nilai');
        $data['selesai']=$this->hitung('pendaftaran');
        $data['PK1']=$this->hitungPK('1');
          $data['PK2']=$this->hitungPK('2');

        echo view('info',$data);
        echo view('footer');

    }

    public function hitung($tabel)
    {
    $db      = \Config\Database::connect();
    $query = $db->query('SELECT * FROM '.$tabel);
    $pengguna=$query->getNumRows();
    return $pengguna;
    }

    public function hitungPK($pilihan)
    //$pilihan string
    {
    $db      = \Config\Database::connect();
    $pk='program_keahlian_'.$pilihan;
    $query = $db->query('SELECT '.$pk.',COUNT('.$pk.') as jumlah
                        FROM pendaftaran GROUP BY '.$pk.'
                        HAVING COUNT('.$pk.') > 1');

    $pk=$query->getResultArray();
        return $pk;
    }

    public function bantuan(){
      $data = [];
      helper(['form']);

      if ($this->request->getMethod() == 'post') {
      $ketentuan = [
          'email' => 'required',
          'tgl' => 'required',
            'bln' => 'required',
              'thn' => 'required',
          'layanan' => 'required'
        ];

        if (! $this->validate($ketentuan)) {
          $data['validation'] = $this->validator;

        }else{

          $tgl = $this->request->getVar('tgl');
          $bln = $this->request->getVar('bln');
          $thn = $this->request->getVar('thn');
          $ttl=$tgl."-".$bln."-".$thn;
          $newData = [
            'ttl' => $ttl,
            'email' => $this->request->getVar('email'),
            'layanan' => $this->request->getVar('layanan'),
          ];

          $model = new TiketModel();
          $model->save($newData);
          $session = session();
          $session->setFlashdata('success', 'Pengajuan '.$newData['layanan'].' telah disimpan.');
          return redirect()->to('info');

        }
      }

      echo view('header', $data);
      echo view('bantuan');
      //echo view('templates/footer');
    }
}
