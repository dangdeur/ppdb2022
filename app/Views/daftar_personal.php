<div class="container-fluid">
<?php
if (isset($validation)):
echo '<div class="col-12">
    <div class="alert alert-danger" role="alert">';
echo $validation->listErrors();
echo '</div>
  </div>';
endif;

echo form_open('daftar/personal');
echo '<br /><h3>Form Isian Data Personal</h3>';
echo '<div class="mb-3 row">';
echo form_label('Nama Pendaftar', 'nama_pendaftar',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'nama_pendaftar','id'=>'nama_pendaftar','class'=>'form-control-plaintext','value'=>$firstname." ".$lastname,]);
echo '</div>';
echo '</div>';

form_hidden('nama_pendaftar', $firstname." ".$lastname);

//JK
echo '<div class="row mb-3">';
echo form_label('Jenis Kelamin', 'jk',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_radio(['name'=>'jk','id'=>'jk','class'=>'form-check-input'],'L',set_value('jk') == 'L' ? TRUE : FALSE);
echo form_label('Laki-laki', 'jk',['class'=>'form-check-label']);
echo '</div>';
echo '<div class="col">';
echo form_radio(['name'=>'jk','id'=>'jk','class'=>'form-check-input'],'P',set_value('jk') == 'P' ? TRUE : FALSE);
echo form_label('Perempuan', 'jk',['class'=>'form-check-label']);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


echo '<div class="row mb-3">';
echo form_label('NISN', 'nisn',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'nisn','value'=>set_value('nisn'),'id'=>'nisn','class'=>'form-control col-sm-10','maxlength' => '10','size'=>'10','placeholder'=>'format 10 digit']);
echo '<div id="passwordHelpBlock" class="form-text">NISN harus sesuai dengan yang terdaftar di DAPODIK. NISN <strong>BUKAN</strong> Nomor Induk Sekolah</div>';
echo '</div>';
echo '</div>';

echo '<div class="row mb-3">';
echo form_label('Tempat Tanggal Lahir', 'tgl_lahir',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
$tgl['']="Tanggal";
for ($a=1;$a<=31;$a++) {
  $tgl[$a]=$a;
}
$bln=['0'=>'Bulan','01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni',
      '07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
$thn['']="Tahun";
for ($b=2004;$b<=2009;$b++) {
$thn[$b]=$b;
}
$attr=['class'=>'form-select'];

echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'tempat_lahir','value'=>set_value('tempat_lahir'),'id'=>'tempat_lahir','class'=>'form-control','placeholder'=>'Kabupaten/Kota']);
echo '</div>';
echo '<div class="col">';
echo form_dropdown('tgl', $tgl,set_value('tgl'),$attr);
echo '</div>';
echo '<div class="col">';
echo form_dropdown('bln', $bln,set_value('bln'),$attr);
echo '</div>';
echo '<div class="col">';
echo form_dropdown('thn', $thn,set_value('thn'),$attr);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="mb-3 row">';
echo form_label('Alamat', 'alamat',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
//echo '<div class="row">';
//echo '<div class="col">';
echo form_input(['name'=>'alamat','value'=>set_value('alamat'),'id'=>'alamat','class'=>'form-control','placeholder'=>'Alamat jelas']);
echo '</div>';
echo '</div>';//row

// echo '<div class="row">';
// echo '<div class="col">';
// echo form_input(['name'=>'kampung','value'=>set_value('kampung'),'id'=>'kampung','class'=>'form-control','placeholder'=>'Kampung']);
// echo '</div>';
//
// echo '<div class="col">';
// echo form_input(['name'=>'kelurahan','value'=>set_value('kelurahan'),'id'=>'kelurahan','class'=>'form-control','placeholder'=>'Kelurahan']);
// echo '</div>';
//
// echo '<div class="col">';
// echo form_input(['name'=>'rt','value'=>set_value('rt'),'id'=>'rt','class'=>'form-control','placeholder'=>'RT']);
// echo '</div>';
// echo '<div class="col">';
// echo form_input(['name'=>'rw','value'=>set_value('rw'),'id'=>'rw','class'=>'form-control','placeholder'=>'RW']);
// echo '</div>';
// echo '</div>';//row
//
// echo '<div class="row">';
// echo '<div class="col">';
// echo form_input(['name'=>'kecamatan','value'=>set_value('kecamatan'),'id'=>'kecamatan','class'=>'form-control','placeholder'=>'Kecamatan']);
// echo '</div>';
//
// echo '<div class="col">';
// echo form_input(['name'=>'kabupaten','value'=>set_value('kabupaten'),'id'=>'kabupaten','class'=>'form-control','placeholder'=>'Kabupaten/Kota']);
// echo '</div>';
//
// echo '</div>';//row
//
// echo '</div>'; //col-sm-10
// echo '</div>'; //mb-3

//ortu wali
echo '<div class="mb-3 row">';
echo form_label('Orangtua', 'orangtua',['class'=>'col-sm-2 col-form-label']);

echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nama_bapak','value'=>set_value('nama_bapak'),'id'=>'bapak','class'=>'form-control','placeholder'=>'Nama Bapak']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nama_ibu','value'=>set_value('nama_ibu'),'id'=>'ibu','class'=>'form-control','placeholder'=>'Nama Ibu']);
echo '</div>';
// echo '<div class="col">';
// echo form_input(['name'=>'nama_wali','value'=>set_value('nama_wali'),'id'=>'wali','class'=>'form-control','placeholder'=>'Jika Bapak Dan Ibu ']);
// echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//pekerjaan
// foreach (PEKERJAAN as $x) {
//   $pekerjaan[$x]=$x;
// }
// echo '<div class="mb-3 row">';
// echo form_label('Pekerjaan Orangtua', 'pekerjaan',['class'=>'col-sm-2 col-form-label']);
//
// echo '<div class="col-sm-10">';
// echo '<div class="row">';
// echo '<div class="col">';
// echo form_dropdown('pekerjaan_bapak',$pekerjaan,set_value('pekerjaan_bapak'),$attr);
// echo '</div>';
// echo '<div class="col">';
// echo form_dropdown('pekerjaan_ibu',$pekerjaan,set_value('pekerjaan_ibu'),$attr);
// echo '</div>';
// echo '<div class="col">';
// echo form_dropdown('pekerjaan_wali',$pekerjaan,set_value('pekerjaan_wali'),$attr);
// echo '</div>';
// echo '</div>';//row
// echo '</div>';
// echo '</div>';

//telep
echo '<div class="mb-3 row">';
echo form_label('No HP', 'hp',['class'=>'col-sm-2 col-form-label']);

echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'no_telepon','value'=>set_value('no_telepon'),'id'=>'hp','class'=>'form-control','placeholder'=>'No Telepon/SMS']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'no_wa','value'=>set_value('no_wa'),'id'=>'hp','class'=>'form-control','placeholder'=>'No Whatsapp/Telegram']);
echo '</div>';

echo '</div>';//row
echo '</div>';
echo '</div>';

//KIP
echo '<div class="mb-3 row">';
echo form_label(' No Kartu Indonesia Pintar', 'kip',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'no_kip','value'=>set_value('no_kip'),'id'=>'kip','class'=>'form-control','placeholder'=>'Nomor KIP apabila ada']);
echo '</div>';
echo '</div>';//row

//KKS
echo '<div class="mb-3 row">';
echo form_label('No Kartu Keluarga Sejahtera (KKS/PKH)', 'kks',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'no_kks','value'=>set_value('no_kks'),'id'=>'kks','class'=>'form-control','placeholder'=>'Nomor KKS apabila ada']);
echo '</div>';
echo '</div>';//row

echo '<div class="row mb-3">';
echo '<button type="submit" class="btn btn-primary">Simpan Data Personal</button>';
echo '</div>';

echo form_close();




?>
</div>
