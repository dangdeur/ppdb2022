<?php
if(!empty($pendaftar ))
  {
  $output = '';
  $outputdata = '';
  $outputtail ='';

  $output .= '<h5 class="bg-danger text-white">Hanya menampilkan pendaftar yang sudah mengisi semua form dengan lengkap</h5>
              <div class="table-responsive">
              <table class="table table-bordered">
	             <thead>
                <tr>
			             <th>No Pendaftaran</th>
                   <th>NISN</th>
                   <th>Nama Pendaftar</th>
                   <th>Sekolah</th>
                   <th></th>
                </tr>
				       </thead>
               <tbody>
               ';

      foreach ($pendaftar as $data)
	   {
           $outputdata .= '
                          <tr>
                          <td>'.$data->no_pendaftaran.'</td>
                          <td>'.$data->nisn.'</td>
		                      <td>'.$data->nama_pendaftar.'</td>
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
