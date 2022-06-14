<div class="container-fluid">
<?php
if (isset($validation)):
echo '<div class="col-12">
    <div class="alert alert-danger" role="alert">';
echo $validation->listErrors();
echo '</div>
  </div>';
endif;

echo form_open(site_url('verifikasi/verifikasiberkas'.$no_pendaftaran));
echo '<h3>Verifikasi Isian Pendaftar</h3>';
echo '<div id="passwordHelpBlock" class="form-text">
  Pastikan nilai dalam skala 0-100
</div>';
echo '<div class="mb-3 row">';
echo form_label('Nama Pendaftar', 'nama_pendaftar',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'nama_pendaftar','id'=>'nama_pendaftar','class'=>'form-control','value'=>set_value('nama_pendaftar',$nama_pendaftar)]);
echo '</div>';
echo '</div>';

//form_hidden('no_pendaftaran', $no_pendaftaran);

//SEKOLAH
echo '<div class="row mb-3">';
echo form_label('Sekolah Asal', 'sekolah_asal',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'sekolah_asal','value'=>set_value('sekolah_asal',$sekolah_asal),'id'=>'sekolah_asal','class'=>'form-control col-sm-10','placeholder'=>'Contoh : SMPN X Pandeglang ---- MTsN X Pandeglang']);
echo '</div>';
echo '</div>';

//tahun lulus
echo '<div class="row mb-3">';
echo form_label('Tahun Lulus SMT/MTs', 'tahun_lulus',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'tahun_lulus','value'=>set_value('tahun_lulus',$tahun_lulus),'id'=>'tahun_lulus','class'=>'form-control col-sm-10','placeholder'=>'Tahun lulus SMP/MTs','size'=>'4','maxlength'=>'4']);
echo '</div>';
echo '</div>';

//ortu wali
echo '<div class="mb-3 row">';
echo form_label('Orangtua', 'orangtua',['class'=>'col-sm-2 col-form-label']);

echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nama_bapak','value'=>set_value('nama_bapak',$nama_bapak),'id'=>'bapak','class'=>'form-control','placeholder'=>'Nama Bapak']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nama_ibu','value'=>set_value('nama_ibu',$nama_ibu),'id'=>'ibu','class'=>'form-control','placeholder'=>'Nama Ibu']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nama_wali','value'=>set_value('nama_wali',$nama_wali),'id'=>'wali','class'=>'form-control','placeholder'=>'Nama Wali']);
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
echo form_input(['name'=>'no_telepon','value'=>set_value('no_telepon',$no_telepon),'id'=>'hp','class'=>'form-control','placeholder'=>'No Telepon/SMS']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'no_wa','value'=>set_value('no_wa',$no_wa),'id'=>'hp','class'=>'form-control','placeholder'=>'No Whatsapp/Telegram']);
echo '</div>';

echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Mat
echo '<div class="mb-3 row">';
echo form_label('Nilai/Semester', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col text-center">';
echo form_label('I', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '</div>';
echo '<div class="col text-center">';
echo form_label('II', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '</div>';
echo '<div class="col text-center">';
echo form_label('III', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '</div>';
echo '<div class="col text-center">';
echo form_label('IV', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '</div>';
echo '<div class="col text-center">';
echo form_label('V', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Bind
echo '<div class="mb-3 row">';
echo form_label('Bahasa Indonesia', 'nilai_bind',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind1','maxlength'=>'2','value'=>set_value('nilai_bind1',$nilai_bind1),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind2','maxlength'=>'2','value'=>set_value('nilai_bind2',$nilai_bind2),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind3','maxlength'=>'2','value'=>set_value('nilai_bind3',$nilai_bind3),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind4','maxlength'=>'2','value'=>set_value('nilai_bind4',$nilai_bind4),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind5','maxlength'=>'2','value'=>set_value('nilai_bind5',$nilai_bind5),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Mat
echo '<div class="mb-3 row">';
echo form_label('Matematika', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat1','maxlength'=>'2','value'=>set_value('nilai_mat1',$nilai_mat1),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat2','maxlength'=>'2','value'=>set_value('nilai_mat2',$nilai_mat2),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat3','maxlength'=>'2','value'=>set_value('nilai_mat3',$nilai_mat3),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat4','maxlength'=>'2','value'=>set_value('nilai_mat4',$nilai_mat4),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat5','maxlength'=>'2','value'=>set_value('nilai_mat5',$nilai_mat5),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Ipa
echo '<div class="mb-3 row">';
echo form_label('IPA', 'nilai_ipa',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa1','maxlength'=>'2','value'=>set_value('nilai_ipa1',$nilai_ipa1),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa2','maxlength'=>'2','value'=>set_value('nilai_ipa2',$nilai_ipa2),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa3','maxlength'=>'2','value'=>set_value('nilai_ipa3',$nilai_ipa3),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa4','maxlength'=>'2','value'=>set_value('nilai_ipa4',$nilai_ipa4),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa5','maxlength'=>'2','value'=>set_value('nilai_ipa5',$nilai_ipa5),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Bing
echo '<div class="mb-3 row">';
echo form_label('Bahasa Inggris', 'nilai_bing',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing1','maxlength'=>'2','value'=>set_value('nilai_bing1',$nilai_bing1),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing2','maxlength'=>'2','value'=>set_value('nilai_bing2',$nilai_bing2),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing3','maxlength'=>'2','value'=>set_value('nilai_bing3',$nilai_bing3),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing4','maxlength'=>'2','value'=>set_value('nilai_bing4',$nilai_bing4),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing5','maxlength'=>'2','value'=>set_value('nilai_bing5',$nilai_bing5),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';




/////
echo '<div class="row mb-3">';
echo '<button type="submit" class="btn btn-primary">Simpan Data Nilai</button>';
echo '</div>';

echo form_close();




?>
</div>
