<div class="container-fluid">
<?php
if (isset($validation)):
echo '<div class="col-12">
    <div class="alert alert-danger" role="alert">';
echo $validation->listErrors();
echo '</div>
  </div>';
endif;

echo form_open('daftar');

echo '<div class="mb-3 row">';
echo form_label('Nama Pendaftar', 'nama_pendaftar',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'nama_pendaftar','id'=>'nama_pendaftar','class'=>'form-control-plaintext','maxlength' => '10','size'=>'10','value'=>$firstname." ".$lastname,]);
echo '</div>';
echo '</div>';

form_hidden('nama_pendaftar', $firstname." ".$lastname);

//JK
echo '<div class="row mb-3">';
echo form_label('Jenis Kelamin', 'jk',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col-2">';
echo form_radio(['name'=>'jk','id'=>'jk','class'=>'form-check-input'],'L',set_value('jk') == 'L' ? "TRUE" : "FALSE");
echo form_label('Laki-laki', 'jk',['class'=>'form-check-label']);
echo '</div>';
echo '<div class="col-2">';
echo form_radio(['name'=>'jk','id'=>'jk','class'=>'form-check-input'],'P',set_value('jk') == 'P' ? "TRUE" : "FALSE");
echo form_label('Perempuan', 'jk',['class'=>'form-check-label']);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


echo '<div class="row mb-3">';
echo form_label('NISN', 'nisn',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'nisn','value'=>set_value('nisn'),'id'=>'nisn','class'=>'form-control col-sm-10','maxlength' => '10','size'=>'10','placeholder'=>'format 10 digit']);
echo '</div>';
echo '</div>';

echo '<div class="row mb-3">';
echo form_label('Tempat Tanggal Lahir', 'tgl_lahir',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
$tgl['']="---";
for ($a=1;$a<=31;$a++) {
  $tgl[$a]=$a;
}
$bln=['0'=>'---','01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni',
      '07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
$thn['']="---";
for ($b=2005;$b<=2010;$b++) {
$thn[$b]=$b;
}
$attr=['class'=>'form-select'];

echo '<div class="row">';
echo '<div class="col-3">';
echo form_input(['name'=>'tempat_lahir','id'=>'tempat_lahir','class'=>'form-control','placeholder'=>'Kabupaten/Kota']);
echo '</div>';
echo '<div class="col-1">';
echo form_dropdown('tgl', $tgl,'',$attr);
echo '</div>';
echo '<div class="col-3">';
echo form_dropdown('bln', $bln,'',$attr);
echo '</div>';
echo '<div class="col-2">';
echo form_dropdown('thn', $thn,'',$attr);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="mb-3 row">';
  echo form_label('Alamat', 'alamat',['class'=>'col-sm-2 col-form-label']);

  echo '<div class="col-sm-10">';
//echo '<div class="row">';
    echo '<div class="col">';
      echo form_input(['name'=>'jalan','value'=>set_value('jalan'),'id'=>'jalan','class'=>'form-control','placeholder'=>'Jalan...']);
//echo '</div>';
    echo '</div>';//row

echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'kampung','value'=>set_value('kampung'),'id'=>'kampung','class'=>'form-control','placeholder'=>'Kampung']);
echo '</div>';

echo '<div class="col">';
echo form_input(['name'=>'kelurahan','value'=>set_value('kelurahan'),'id'=>'kelurahan','class'=>'form-control','placeholder'=>'Kelurahan']);
echo '</div>';

echo '<div class="col">';
echo form_input(['name'=>'rt','value'=>set_value('rt'),'id'=>'rt','class'=>'form-control','placeholder'=>'RT']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'rw','value'=>set_value('rw'),'id'=>'rw','class'=>'form-control','placeholder'=>'RW']);
echo '</div>';
echo '</div>';//row

echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'kecamatan','value'=>set_value('kecamatan'),'id'=>'kecamatan','class'=>'form-control','placeholder'=>'Kecamatan']);
echo '</div>';

echo '<div class="col">';
echo form_input(['name'=>'kabupaten','value'=>set_value('kabupaten'),'id'=>'kabupaten','class'=>'form-control','placeholder'=>'Kabupaten/Kota']);
echo '</div>';

echo '</div>';//row

echo '</div>'; //col-sm-10
echo '</div>'; //mb-3

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
echo '<div class="col">';
echo form_input(['name'=>'nama_wali','value'=>set_value('nama_wali'),'id'=>'wali','class'=>'form-control','placeholder'=>'Nama Wali']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//pekerjaan
echo '<div class="mb-3 row">';
echo form_label('Pekerjaan Orangtua', 'pekerjaan',['class'=>'col-sm-2 col-form-label']);

echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_dropdown('pekerjaan_bapak', PEKERJAAN,'',$attr);
echo '</div>';
echo '<div class="col">';
echo form_dropdown('pekerjaan_ibu', PEKERJAAN ,'',$attr);
echo '</div>';
echo '<div class="col">';
echo form_dropdown('pekerjaan_wali',PEKERJAAN,'',$attr);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

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

//SEKOLAH
echo '<div class="row mb-3">';
echo form_label('Sekolah Asal', 'sekolah_asal',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'sekolah_asal','value'=>set_value('sekolah_asal'),'id'=>'sekolah_asal','class'=>'form-control col-sm-10','placeholder'=>'Contoh : SMPN X Pandeglang ---- MTsN X Pandeglang ']);
echo '</div>';
echo '</div>';

//tahun lulus
echo '<div class="row mb-3">';
echo form_label('Tahun Lulus SMT/MTs', 'tahun_lulus',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'tahun_lulus','value'=>set_value('tahun_lulus'),'id'=>'tahun_lulus','class'=>'form-control col-sm-10','placeholder'=>'Tahun lulus SMP/MTs','size=4','maxlength=4']);
echo '</div>';
echo '</div>';

//jalur Pendaftaran
echo '<div class="mb-3 row">';
echo form_label('Jalur Pendaftaran', 'jalur_pendaftaran',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col-2">';
echo form_radio(['name'=>'jalur_pendaftaran','id'=>'jalur_pendaftaran','class'=>'form-check-input'],'Reguler',FALSE);
echo form_label('Reguler', 'jalur_pendaftaran',['class'=>'form-check-label']);
echo '</div>';

echo '<div class="col-2">';
echo form_radio(['name'=>'jalur_pendaftaran','id'=>'jalur_pendaftaran','class'=>'form-check-input'],'Prestasi',FALSE);
echo form_label('Prestasi', 'jalur_pendaftaran',['class'=>'form-check-label']);
echo '</div>';

echo '<div class="col-2">';
echo form_radio(['name'=>'jalur_pendaftaran','id'=>'jalur_pendaftaran','class'=>'form-check-input'],'Afirmasi',FALSE);
echo form_label('Afirmasi', 'jalur_pendaftaran',['class'=>'form-check-label']);
echo '</div>';

echo '<div class="col-4">';
echo form_radio(['name'=>'jalur_pendaftaran','id'=>'jalur_pendaftaran','class'=>'form-check-input'],'Perpindahan Orangtua',FALSE);
echo form_label('Perpindahan Orangtua', 'jalur_pendaftaran',['class'=>'form-check-label']);
echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';


//Jurusan
echo '<div class="mb-3 row">';
echo form_label('Program Keahlian Pilihan', 'program_keahlian',['class'=>'col-sm-2 col-form-label']);

echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_dropdown('program_keahlian_1', PROGRAM_KEAHLIAN,'',$attr);
echo '</div>';
echo '<div class="col">';
echo form_dropdown('program_keahlian_2', PROGRAM_KEAHLIAN ,'',$attr);
echo '</div>';

echo '</div>';//row
echo '<div id="program_keahlian" class="form-text">Pilihan kedua diperhitungkan apabila peserta tidak diterima di pilihan pertama, dan Program Keahlian pilihan kedua masih kekurangan peserta didik</div>';
echo '</div>';
echo '</div>';


echo '<div class="row mb-3">';
echo '<button type="submit" class="btn btn-primary">Simpan Data</button>';
echo '</div>';

echo form_close();




?>
</div>
