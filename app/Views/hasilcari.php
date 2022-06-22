<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Administrator</title>

    <!-- Bootstrap core CSS -->

<link href="<?php echo base_url('assets/bootstrap-5.1.3/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/dashboard/dashboard.css'); ?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.min.js'); ?>"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .pagination li.active{
        background: deepskyblue;
        color: white;
      }
      .pagination li.active a{
        color: white;
        text-decoration: none;
      }
    </style>


    <!-- Custom styles for this template -->

  </head>
  <body>
<?php
if(!empty($pendaftar ))
  {
  $output = '';
  $outputdata = '';
  $outputtail ='';

  $output .= '<h5 class="bg-danger text-white">Cari no pendaftaran,email, nisn, nama</h5>
              <div class="table-responsive">
              <table class="table table-bordered">
	             <thead>
                <tr>
			             <th>No Pendaftaran</th>
                   <th>NISN</th>
                   <th>Nama Pendaftar</th>
                   <th>Email</th>
                   <th>Sekolah</th>
                   <th></th>
                </tr>
				       </thead>
               <tbody>
               ';

      foreach ($pendaftar as $data)
	   {
       if(isset($data->verifikasi) &&  $data->verifikasi !='')
       {
         $class=' class="table-success"';
       }
           $outputdata .= '
                          <tr'.$class.'>
                          <td>'.$data->no_pendaftaran.'</td>
                          <td>'.$data->nisn.'</td>
		                      <td>'.$data->nama_pendaftar.'</td>
                            <td>'.$data->email.'</td>
                           <td>'.$data->sekolah_asal.'</td>
                           <td>
                            <a href="'.site_url('verifikasi/verifikasiberkas/'.$data->no_pendaftaran).'" class="btn btn-success">Verifikasi Berkas</a>
                            <a href="'.site_url('verifikasi/cabutberkas/'.$data->no_pendaftaran).'" class="btn btn-danger">Cabut Berkas</a>
                           </td>
		                     </tr>
                         ';
      }

         $outputtail .= '</tbody>
                         </table>
                         </div>
                         ';

         echo $output;
         echo $outputdata;
         echo $outputtail;
 }
 else
 {
      echo 'Data Tidak Ditemukan';
 }
 ?>
</body>
</html>
