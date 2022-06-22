<p>Hanya menampilkan pendaftar yang mengajukan reset akun</p>
<table class="table">
  <thead>
    <tr>
    <th>Email</th>
    <th>TTL Ajuan</th>
    <th>TTL Data</th>
    <th>Layanan</th>
      <th>Aksi</th>
  </tr>
  </thead>
<?php
foreach ($ajuan as $data)
{
  echo "<tr>
           <td>".$data->email."</td>
           <td>".$data->ttl."</td>
           <td>".$data->ttl."</td>
           <td>".$data->layanan."</td>
           <td>
              <a href=".site_url('admin/reset/'.$data->email)." class='btn btn-danger'>Reset</a>
           </td>
           </tr>";
}
?>
</table>
