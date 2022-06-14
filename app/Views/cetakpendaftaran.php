<table border="0" cellspacing="3" cellpadding="2">
  <tr>
  <td colspan="2"><h3>Bukti Pendaftaran</h3></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">No Pendaftaran</td>
  <td style="width: 75%;text-align: left;"><?= $no_pendaftaran ?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">NISN</td>
  <td style="width: 75%;text-align: left;"><?= $nisn ?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Nama</td>
  <td style="width: 75%;text-align: left;"><?= $nama_pendaftar ?></td>
  </tr>

	<tr>
  <td style="width: 25%;text-align: left;">Sekolah Asal</td>
  <td style="width: 75%;text-align: left;"><?= $sekolah_asal ?></td>
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
  <td style="width: 75%;text-align: left;"><?= $jk_ ?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Kartu Bantuan</td>
  <td style="width: 75%;text-align: left;">KIP : <?= $no_kip .' | KKS : '. $no_kks ?></td>
  </tr>

	<tr>
  <td style="width: 25%;text-align: left;">Nama Orangtua</td>
  <td style="width: 75%;text-align: left;"><?= $nama_bapak .' | '. $nama_ibu?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Alamat</td>
  <td style="width: 75%;text-align: left;"><?= $alamat ?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">No HP</td>
  <td style="width: 75%;text-align: left;">Telp/SMS : <?= $no_telepon .' | WA/Telegram : '. $no_wa ?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Pilihan Program Keahlian SMK</td>
  <td style="width: 75%;text-align: left;">1.  <?= $program_keahlian_1 .'<br />2. '. $program_keahlian_2 ?></td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Prestasi</td>
  <td style="width: 75%;text-align: left;">
<?php
    if (!empty($prestasi1))
    {
      echo '1. '.$prestasi1.'<br />';
    }
    if (!empty($prestasi2))
    {
      echo '2. '.$prestasi2.'<br />';
    }
    if (!empty($prestasi3))
    {
      echo '3. '.$prestasi3;
    }
    ?>
    </td>
  </tr>

  <?php
      if (!empty($hafalan))
      {
        ?>
  <tr>
  <td style="width: 25%;text-align: left;">Hafalan</td>
  <td style="width: 75%;text-align: left;">
<?php
      echo $hafalan."</td></tr>";
}
?>
  <!-- ///nilai -->
  <tr>
    <td>Nilai Matematika</td>
    <td>
      <?php
        $nilai_mat_rerata=($nilai_mat1+$nilai_mat2+$nilai_mat3+$nilai_mat4+$nilai_mat5)/5;
       ?>
        <?=$nilai_mat1 ?> |
        <?=$nilai_mat2 ?> |
        <?=$nilai_mat3 ?> |
        <?=$nilai_mat4 ?> |
        <?=$nilai_mat5 ?> |
        Rerata : <?=$nilai_mat_rerata ?>
        </td>
  </tr>

  <tr>
    <td>Nilai IPA</td>
    <td>
      <?php
        $nilai_ipa_rerata=($nilai_ipa1+$nilai_ipa2+$nilai_ipa3+$nilai_ipa4+$nilai_ipa5)/5;
       ?>
    <?=$nilai_ipa1 ?> |
        <?=$nilai_ipa2 ?> |
        <?=$nilai_ipa3 ?> |
      <?=$nilai_ipa4 ?> |
        <?=$nilai_ipa5 ?> |
        Rerata : <?=$nilai_ipa_rerata ?>

        </td>
  </tr>

  <tr>
    <td>Nilai Bahasa Inggris</td>
    <td>
      <?php
        $nilai_bing_rerata=($nilai_bing1+$nilai_bing2+$nilai_bing3+$nilai_bing4+$nilai_bing5)/5;
       ?>
    <?=$nilai_bing1 ?> |
        <?=$nilai_bing2 ?> |
      <?=$nilai_bing3 ?> |
      <?=$nilai_bing4 ?> |
      <?=$nilai_bing5 ?> |
      Rerata : <?=$nilai_bing_rerata ?>
        </td>
  </tr>

  <tr>
    <td>Nilai Bahasa Indonesia</td>
    <td>
      <?php
        $nilai_bind_rerata=($nilai_bind1+$nilai_bind2+$nilai_bind3+$nilai_bind4+$nilai_bind5)/5;
       ?>
      <?=$nilai_bind1 ?> |
      <?=$nilai_bind2 ?> |
      <?=$nilai_bind3 ?> |
      <?=$nilai_bind4 ?> |
      <?=$nilai_bind5 ?> |
      Rerata : <?=$nilai_bind_rerata ?>
        </td>
  </tr>

  <tr>
    <td>Rerata Nilai Raport</td>
    <td>
      <?php
        $nilai_raport_rerata=($nilai_bind_rerata+$nilai_bing_rerata+$nilai_ipa_rerata+$nilai_mat_rerata)/4;
      echo $nilai_raport_rerata;
      ?>
        </td>
  </tr>

  <tr>
  <td style="width: 25%;text-align: left;">Verifikasi Berkas/ujian</td>
  <td style="width: 75%;text-align: left;"><strong><?= $waktu_ujian ?></strong></td>
  </tr>
</table>

<br /><br />
<table border="0" cellspacing="2" cellpadding="2">
  <tr>
  <td style="width: 33%;text-align: center;">Orangtua</td>
  <td style="width: 33%;text-align: center;"></td>
  <td style="width: 33%;text-align: center;">Calon Peserta Didik</td>
  </tr>
  <tr>
  <td style="width: 33%;text-align: center;"><br /><br /><br /><br /></td>
  <td style="width: 33%;text-align: center;"><br /><br /><br /><br /></td>
  <td style="width: 33%;text-align: center;"><br /><br /><br /><br /></td>
  </tr>
  <tr>
  <td style="width: 33%;text-align: center;">................</td>
  <td style="width: 33%;text-align: center;"></td>
  <td style="width: 33%;text-align: center;">................</td>
  </tr>
</table>

Keterangan :
<ul>
<li>Cetak bukti pendaftaran ini sebanyak 2 lembar, 1 lembar dipegang pendaftar, 1 lembar lagi diserahkan ke SMKN 2 Pandeglang disertai dengan dokumen berikut :</li>
  <ol>
    <li>Surat Keterangan Lulus <strong>ASLI</strong>. Dokumen ditinggal di SMKN 2 Pandeglang</li>
    <li>Raport <strong>ASLI</strong>. Dokumen dibawa kembali setelah verifikasi.</li>
    <li>Surat Keterangan Bebas Buta Warna <strong>ASLI</strong>. Dokumen dibawa kembali setelah verifikasi.</li>
    <li>Sertifikat Kejuaraan/Lomba <strong>ASLI</strong>. Dokumen dibawa kembali setelah verifikasi.</li>
  </ol>
<li>Peserta PPDB mencetak Kartu Tes PPDB 1 lembar dan ditempeli pas foto yang jelas. Digunakan untuk syarat mengikuti Seleksi PPDB. Kartu Tes hanya ditunjukan ke pengawas ruang ujian</li>
<li>Data pendaftaran, pilihan Program Keahlian dapat diubah apabila belum diverifikasi oleh Panitia PPDB SMKN 2 Pandeglang</li>
<li>Pada waktu verifikasi yang telah ditetapkan di atas, Calon Peserta Didik datang ke Kampus SMKN 2 Pandeglang, untuk melaksanakan Ujian Seleksi PPDB dengan verifikasi kesesuaian berkas dan isian form pendaftaran.</li>
</ul>
