<div class="container-fluid">

<!--  -->
    <div class="mb-3">
      <h2>Halo <?= $firstname ." ". $lastname ?></h2>
    </div>
<?php

if ($jenis_user==0) {
if (isset($status) && !is_null($status))
{
  ?>
  <div class="mb-3">
    <label class="col-sm-12 form-label"><h3>Status pendaftaran - Nomor Peserta : <?= $no_pendaftaran ?></label></h3>
    <h4 class="bg-warning text-white"><?= $status ?> </h4>
    <?php
    if (isset($petugas))
    {
    ?>

    Verifikator : <?= $petugas==" " ? 'Admin PPDB' : $petugas ?> <br />
    Tanggal verifikasi : <?= $tanggal." ".$waktu ?><br />

  <?php } ?>

    <br /><hr />
    <?php
}
    if (isset($status_pendaftaran) && $status_pendaftaran<=3)
    {

     ?>
    <a href="<?php echo site_url('cetak/pendaftaran/'.$no_pendaftaran) ?>" target="_blank" class="btn btn-success">Cetak Bukti Pendaftaran</a>
    <a href="<?php echo site_url('cetak/kartu/'.$no_pendaftaran) ?>" target="_blank" class="btn btn-primary">Cetak Kartu Tes</a>
      <a href="<?php echo site_url('daftar/edit/'.$no_pendaftaran) ?>" class="btn btn-warning <?= $attr ?>">Ubah Data</a>
        <!-- <a href="<?php //echo site_url('daftar/hapus/'.$no_pendaftaran) ?>" class="btn btn-danger">Hapus Pendaftaran</a> -->
  <?php }

  
  // if (isset($status_pendaftaran) && $status_pendaftaran<3 && $status_pendaftaran>0) {
  //   //else {
  //   // echo '<h4 class="text-warning bg-dark">Isian belum lengkap<h4>';
  //   echo '<a href="'.site_url('cetak/pendaftaran/'.$no_pendaftaran).'" target="_blank" class="btn btn-success disabled">Cetak Bukti Pendaftaran</a>';
  //   echo '<a href="'.site_url('cetak/kartu/'.$no_pendaftaran).'" target="_blank" class="btn btn-warning disabled">Cetak Kartu Tes</a>';
  // }
  ?>
  </div>

<?php

if (!$personal)
  {

   ?>
  <div class="d-grid gap-2">
   <a href="<?php echo site_url('daftar/personal') ?>" class="btn btn-primary">Belum Terdaftar/Klik Untuk mendaftar</a>
  </div>
  <?php
  }
  else
  {

    $bln=['0'=>'---','01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni',
          '07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
    $tgl=explode("-",$tanggal_lahir);
?>

  <div class="table-responsive">
  <table class="table align-middle">
    <tr><td colspan="2"><h3>1. Data Personal </h3></td></tr>
    <tr>
      <td class="col-sm-2">Nama</td>
      <td class="col-sm-10"><?= $nama_pendaftar ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><?= $jk == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
    </tr>
    <tr>
      <td>Tempat, Tanggal Lahir</td>
      <td><?= $tempat_lahir.", ". $tgl['2']." ".$bln[$tgl[1]]." ".$tgl[0] ?></td>
    </tr>
    <tr>
      <td>Orangtua</td>
      <td>Bapak : <?= $nama_bapak ?> | Ibu : <?= $nama_ibu ?> </td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?= $alamat ?></td>
    </tr>
    <tr>
      <td>No HP</td>
      <td>Telepon : <?=$no_telepon ?> | WA/Telegram <?=$no_wa ?></td>
    </tr>
    <tr>
      <td>No Kartu Program</td>
      <td>KIP : <?=$no_kip ?> | KKS/PKH : <?=$no_kks ?></td>
    </tr>
<?php
//echo $nilai;
if (!$nilai)
{
 ?>
    <tr><td colspan="2"><h3>2. Data Sekolah & Nilai </h3>
        <a href="<?php echo site_url('daftar/nilai/'.$no_pendaftaran) ?>" class="btn btn-primary">Isi data nilai & sekolah</a>
        </td>
    </tr>
<?php
}
else
{
  ?>
    <tr><td colspan="2"><h3>2. Data Sekolah & Nilai </h3>
  <tr>
    <td>Sekolah Asal</td>
    <td><?=$sekolah_asal ?></td>
  </tr>
  <tr>
    <td>Tahun Lulus</td>
    <td><?=$tahun_lulus ?></td>
  </tr>
  <?php
  if(!empty($prestasi1))
  {
    echo '<tr>
      <td>Prestasi I</td>
      <td>'.$prestasi1.'</td>
    </tr>';
  }

  if(!empty($prestasi2))
  {
    echo '<tr>
      <td>Prestasi II</td>
      <td>'.$prestasi2.'</td>
    </tr>';
  }

  if(!empty($prestasi3))
  {
    echo '<tr>
      <td>Prestasi III</td>
      <td>'.$prestasi3.'</td>
    </tr>';
  }

  if(!empty($hafalan))
  {
    echo '<tr>
      <td>Hafalan</td>
      <td>'.$hafalan.'</td>
    </tr>';
  }

   ?>

  <tr>
    <td>Nilai Matematika</td>
    <td>
      <?php
        $nilai_mat_rerata=($nilai_mat1+$nilai_mat2+$nilai_mat3+$nilai_mat4+$nilai_mat5)/5;
       ?>
      <div class="row">
        <div class="col">1 : <?=$nilai_mat1 ?></div>
        <div class="col">2 : <?=$nilai_mat2 ?></div>
        <div class="col">3 : <?=$nilai_mat3 ?></div>
        <div class="col">4 : <?=$nilai_mat4 ?></div>
        <div class="col">5 : <?=$nilai_mat5 ?></div>
        <div class="col">Rerata : <?=$nilai_mat_rerata ?></div>
      </div>
        </td>
  </tr>

  <tr>
    <td>Nilai IPA</td>
    <td>
      <?php
        $nilai_ipa_rerata=($nilai_ipa1+$nilai_ipa2+$nilai_ipa3+$nilai_ipa4+$nilai_ipa5)/5;
       ?>
      <div class="row">
        <div class="col">1 : <?=$nilai_ipa1 ?></div>
        <div class="col">2 : <?=$nilai_ipa2 ?></div>
        <div class="col">3 : <?=$nilai_ipa3 ?></div>
        <div class="col">4 : <?=$nilai_ipa4 ?></div>
        <div class="col">5 : <?=$nilai_ipa5 ?></div>
        <div class="col">Rerata : <?=$nilai_ipa_rerata ?></div>
      </div>
        </td>
  </tr>

  <tr>
    <td>Nilai Bahasa Inggris</td>
    <td>
      <?php
        $nilai_bing_rerata=($nilai_bing1+$nilai_bing2+$nilai_bing3+$nilai_bing4+$nilai_bing5)/5;
       ?>
      <div class="row">
        <div class="col">1 : <?=$nilai_bing1 ?></div>
        <div class="col">2 : <?=$nilai_bing2 ?></div>
        <div class="col">3 : <?=$nilai_bing3 ?></div>
        <div class="col">4 : <?=$nilai_bing4 ?></div>
        <div class="col">5 : <?=$nilai_bing5 ?></div>
        <div class="col">Rerata : <?=$nilai_bing_rerata ?></div>
      </div>
        </td>
  </tr>

  <tr>
    <td>Nilai Bahasa Indonesia</td>
    <td>
      <?php
        $nilai_bind_rerata=($nilai_bind1+$nilai_bind2+$nilai_bind3+$nilai_bind4+$nilai_bind5)/5;
       ?>
      <div class="row">
        <div class="col">1 : <?=$nilai_bind1 ?></div>
        <div class="col">2 : <?=$nilai_bind2 ?></div>
        <div class="col">3 : <?=$nilai_bind3 ?></div>
        <div class="col">4 : <?=$nilai_bind4 ?></div>
        <div class="col">5 : <?=$nilai_bind5 ?></div>
        <div class="col">Rerata : <?=$nilai_bind_rerata ?></div>
      </div>
        </td>
  </tr>

  <tr>
    <td>Rerata Raport</td>
    <td>
      <?php
        $nilai_raport_rerata=($nilai_bind_rerata+$nilai_bing_rerata+$nilai_ipa_rerata+$nilai_mat_rerata)/4;
      echo $nilai_raport_rerata;
      ?>
        </td>
  </tr>
<?php
if ($nilai && !$pendaftaran)
{
 ?>
  <tr><td colspan="2"><h3>3. Data Pendaftaran </h3>
        <a href="<?php echo site_url('daftar/ppdb/'.$no_pendaftaran) ?>" class="btn btn-primary">Isi data pendaftaran PPDB</a>
        </td>
    </tr>
  <?php
}
}
//echo $pendaftaran;
if (!$pendaftaran)
{
 ?>

<?php
}
else {
  ?>
  <tr><td colspan="2"><h3>3. Data Pendaftaran PPDB</h3>
<tr>
  <td>Pilihan I</td>
  <td><?=$program_keahlian_1 ?></td>
</tr>
<tr>
  <td>Pilihan II</td>
  <td><?=$program_keahlian_2 ?></td>
</tr>

<tr>
  <td>Waktu Tes & Verifikasi Berkas</td>
  <td><?=$waktu_ujian ?></td>
</tr>

  <?php
}

 ?>

  </table>
</div>
<?php }
}
else {
  echo '<h2>Anda tidak punya akses disini</h2>';
} ?>



</div>
