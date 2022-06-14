<div class="container-fluid">
<?php
if (isset($validation)):
echo '<div class="col-12">
    <div class="alert alert-danger" role="alert">';
echo $validation->listErrors();
echo '</div>
  </div>';
endif;

$attr=['class'=>'form-select'];

echo form_open('daftar/ppdb/'.$no_pendaftaran);
echo '<h3>Form Isian Pendaftaran PPDB</h3>';
echo '<div class="mb-3 row">';
echo form_label('Nama Pendaftar', 'nama_pendaftar',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'nama_pendaftar','id'=>'nama_pendaftar','class'=>'form-control-plaintext','maxlength' => '10','size'=>'10','value'=>$firstname." ".$lastname,]);
echo '</div>';
echo '</div>';

//form_hidden('nama_pendaftar', $firstname." ".$lastname);
//waktu ujian
// echo '<div class="mb-3 row">';
// echo form_label('Waktu Ujian', 'waktu_ujian',['class'=>'col-sm-2 col-form-label']);
// echo '<div class="col-sm-10">';
// echo form_input(['name'=>'waktu_ujian','id'=>'waktu_ujian','class'=>'form-control-plaintext','maxlength' => '10','size'=>'10','value'=>set_value('waktu_ujian',$waktu_ujian)]);
// echo '</div>';
// echo '</div>';

foreach (PROGRAM_KEAHLIAN as $x) {
  $program_keahlian[$x]=$x;
}
//Jurusan
echo '<div class="mb-3 row">';
echo form_label('Program Keahlian Pilihan', 'program_keahlian',['class'=>'col-sm-2 col-form-label']);

echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_dropdown('program_keahlian_1', $program_keahlian,'',$attr);
echo '</div>';
echo '<div class="col">';
echo form_dropdown('program_keahlian_2', $program_keahlian ,'',$attr);
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
