<table border="0" cellspacing="3" cellpadding="4">
  <tr>
  <td colspan="3" style="width: 100%;text-align: center;"><h3>Kartu Seleksi PPDB</h3></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">No Pendaftaran</td>
  <td style="width: 60%;text-align: left;"><?= $no_pendaftaran ?></td>
  <td rowspan="4" style="width: 15%;text-align: center;">
    <table border="1">
      <tr><td>Foto <br /><br /><br /><br /><br /></td></tr>
    </table>
  </td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Nama</td>
  <td style="width: 60%;text-align: left;"><?= $nama_pendaftar ?></td>
  </tr>

	<tr>
  <td style="width: 25%;text-align: left;">Sekolah Asal</td>
  <td style="width: 60%;text-align: left;"><?= $sekolah_asal ?></td>
  </tr>

  <?php
  if ($jk=='L')
  {
    $jk_='Laki-laki';
  }
  else {
    $jk_='Perempuan';
  }
   ?>

	<tr>
  <td style="width: 25%;text-align: left;">Jenis Kelamin</td>
  <td style="width: 60%;text-align: left;"><?= $jk_ ?></td>
  </tr>

	<tr>
  <td style="width: 25%;text-align: left;">Pilihan I</td>
  <td style="width: 75%;text-align: left;"><?= $program_keahlian_1 ?></td>
  </tr>

	<tr>
  <td style="width: 25%;text-align: left;">Pilihan II</td>
  <td style="width: 75%;text-align: left;"><?= $program_keahlian_2 ?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Waktu Ujian & Verifikasi</td>
  <td style="width: 75%;text-align: left;"><?= $waktu_ujian ?></td>
  </tr>
</table>

<br /><br />
<table border="1" cellspacing="3" cellpadding="4">
  <tr>
  <td style="width: 50%;text-align: center;">Username Ujian</td>
  <td style="width: 50%;text-align: center;">Password Ujian</td>
  </tr>

  <tr>
  <td style="width: 50%;text-align: center;"><h2><?= $no_pendaftaran ?></h2></td>
  <td style="width: 50%;text-align: center;"><h2><?= $password_ujian ?></h2></td>
  </tr>

</table>
<br /><br />
Keterangan :
<ul>
<li>Mohon memastikan kesesuaian data sehari sebelum verifikasi/ujian</li>
<li>Peserta hadir di tempat ujian 30 menit sebelum pelaksanaan ujian</li>
<li>Kartu Seleksi PPDB ini dicetak 1 lembar dan ditempeli pas foto yang jelas. Digunakan untuk syarat mengikuti Seleksi PPDB. Kartu Tes hanya ditunjukan ke pengawas ruang ujian</li>
<li>Ujian Seleksi PPDB dilakukan berbasis komputer di Kampus SMKN 2 Pandeglang</li>
<li>Ujian Seleksi PPDB meliputi,
  <ol>
  <li>Kemampuan literasi</li>
  <li>Kemampuan numerasi</li>
  <li>Tes Potensi Akademik</li>
</ol>
</li>
<li>Setelah melaksanakan ujian seleksi PPDB, peserta mengikuti verifikasi berkas</li>
</ul>
