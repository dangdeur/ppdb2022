<table class="table">
    <thead>
      <tr>
        <th>No Pendaftaran</th>
        <th>Nama</th>
        <th>Sekolah Asal</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach($users as $data) {  ?>
      <tr>
        <td><?php echo $data['no_pendaftaran']; ?></td>
        <td><?php echo $data['nama_pendaftar']; ?></td>
            </tr>
      <?php } ?>
    </tbody>
  </table>
