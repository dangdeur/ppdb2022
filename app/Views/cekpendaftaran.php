
<h2>Data User</h2>
<table class="table table-bordered">
  <tr>
    <td class="col-sm-2">ID User</td>
    <td>Firstname</td>
    <td>Lastname</td>
    <td>email</td>
  </tr>
  <tr>
    <td class="col-sm-2"><?= $id_users ?></td>
    <td><?= $firstname ?></td>
    <td><?= $lastname ?></td>
    <td><?= $email ?></td>
  </tr>
</table>

<h2>Data Pendaftar</h2>
<table class="table table-bordered">
  <tr>
    <td class="col-sm-2">ID User</td>
    <td class="col-sm-2">No pendaftaran</td>
    <td>Nama</td>
    <td>verifikasi</td>
  </tr>
  <tr>
    <td><?= $isian['pendaftar']['id_users'] ?></td>
    <td><?= $isian['pendaftar']['no_pendaftaran'] ?></td>
    <td><?= $isian['pendaftar']['nama_pendaftar'] ?></td>
    <td>
      <?php
      if (isset($isian['pendaftar']['verifikasi'])) {
      $verifikasi=json_decode($isian['pendaftar']['verifikasi']);
      echo  $verifikasi->petugas ."|". $verifikasi->waktu;
      }
      ?>
    </td>
  </tr>
</table>

<h2>Data Nilai</h2>
<table class="table table-bordered">
  <tr>
    <td class="col-sm-2">ID User</td>
    <td class="col-sm-2">No pendaftaran</td>
    <td>Sekolah</td>
    </tr>
  <tr>
    <td><?= $isian['nilai']['id_users'] ?></td>
    <td><?= $isian['nilai']['no_pendaftaran'] ?></td>
    <td><?= $isian['nilai']['sekolah_asal'] ?></td>
    </tr>
</table>

<h2>Data Pendaftaran</h2>
<table class="table table-bordered">
  <tr>
    <td class="col-sm-2">ID User</td>
    <td class="col-sm-2">No pendaftaran</td>
    <td>Pilihan 1</td>
    <td>Pilihan 2</td>
    </tr>
  <tr>
    <td><?= $isian['pendaftaran']['id_users'] ?></td>
    <td><?= $isian['pendaftaran']['no_pendaftaran'] ?></td>
    <td><?= $isian['pendaftaran']['program_keahlian_1'] ?></td>
    <td><?= $isian['pendaftaran']['program_keahlian_2'] ?></td>
    </tr>
</table>
