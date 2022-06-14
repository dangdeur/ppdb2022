<div class="container-fluid">
<?php

if (isset($validation)):
echo '<div class="col-12">
    <div class="alert alert-danger" role="alert">';
echo $validation->listErrors();
echo '</div>
  </div>';
endif;

echo form_open('daftar/nilai/'.$no_pendaftaran);
echo '<h3>Form Isian Data Prestasi & Nilai (0-100)</h3>';
echo '<div class="mb-3 row">';
echo form_label('Nama Pendaftar', 'nama_pendaftar',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'nama_pendaftar','id'=>'nama_pendaftar','class'=>'form-control-plaintext','value'=>$firstname." ".$lastname,]);
echo '</div>';
echo '</div>';

//form_hidden('no_pendaftaran', $no_pendaftaran);

//SEKOLAH
echo '<div class="row mb-3">';
echo form_label('Sekolah Asal', 'sekolah_asal',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'sekolah_asal','value'=>set_value('sekolah_asal'),'id'=>'sekolah_asal','class'=>'form-control col-sm-10','placeholder'=>'Contoh : SMPN X Pandeglang ---- MTsN X Pandeglang']);
echo '</div>';
echo '</div>';

//tahun lulus
echo '<div class="row mb-3">';
echo form_label('Tahun Lulus SMT/MTs', 'tahun_lulus',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo form_input(['name'=>'tahun_lulus','value'=>set_value('tahun_lulus'),'id'=>'tahun_lulus','class'=>'form-control col-sm-10','placeholder'=>'Tahun lulus SMP/MTs','size'=>'4','maxlength'=>'4']);
echo '</div>';
echo '</div>';

//Prestasi 1
$attr=['class'=>'form-select'];
echo '<div class="row mb-3">';
echo form_label('Prestasi I', 'prestasi1',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo form_dropdown('prestasi1', [''=>'Juara Ke-','Juara I'=>'Juara I','Juara II'=>'Juara II','Juara III'=>'Juara III'],'',$attr);
echo '</div>';
echo '<div class="col-sm-2">';
echo form_dropdown('tingkat1', [''=>'Tingkat','Nasional'=>'Nasional','Provinsi'=>'Provinsi','Kabupaten'=>'Kabupaten'],'',$attr);
echo '</div>';
echo '<div class="col-sm-6">';
echo form_input(['name'=>'lomba1','value'=>set_value('lomba1'),'id'=>'lomba1','class'=>'form-control col-sm-10','placeholder'=>'Contoh : Lomba Seni Tradisional']);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

//Prestasi 2

echo '<div class="row mb-3">';
echo form_label('Prestasi II', 'prestasi2',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo form_dropdown('prestasi2', [''=>'Juara Ke-','Juara I'=>'Juara I','Juara II'=>'Juara II','Juara III'=>'Juara III'],'',$attr);
echo '</div>';
echo '<div class="col-sm-2">';
echo form_dropdown('tingkat2', [''=>'Tingkat','Nasional'=>'Nasional','Provinsi'=>'Provinsi','Kabupaten'=>'Kabupaten'],'',$attr);
echo '</div>';
echo '<div class="col-sm-6">';
echo form_input(['name'=>'lomba2','value'=>set_value('lomba2'),'id'=>'lomba2','class'=>'form-control col-sm-10','placeholder'=>'Contoh : Lomba Seni Tradisional']);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

//Prestasi 3
echo '<div class="row mb-3">';
echo form_label('Prestasi II', 'prestasi3',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo form_dropdown('prestasi3', [''=>'Juara Ke-','Juara I'=>'Juara I','Juara II'=>'Juara II','Juara III'=>'Juara III'],'',$attr);
echo '</div>';
echo '<div class="col-sm-2">';
echo form_dropdown('tingkat3', [''=>'Tingkat','Nasional'=>'Nasional','Provinsi'=>'Provinsi','Kabupaten'=>'Kabupaten'],'',$attr);
echo '</div>';
echo '<div class="col-sm-6">';
echo form_input(['name'=>'lomba3','value'=>set_value('lomba3'),'id'=>'lomba3','class'=>'form-control col-sm-10','placeholder'=>'Contoh : Lomba Seni Tradisional']);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

//Hafalan Quran
$attr=['class'=>'form-select'];
echo '<div class="row mb-3">';
echo form_label('Hafalan', 'hafalan',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col-sm-2">';
echo form_dropdown('hafalan', [''=>'Jumlah Juz','1 Juz'=>'1 Juz','2 Juz'=>'2 Juz','3 Juz'=>'3 Juz',
                        '4 Juz'=>'4 Juz','5 Juz'=>'5 Juz','6-10 Juz'=>'6-10 Juz',
                        '11-20 Juz'=>'11-20 Juz','21-30 Juz'=>'21-30 Juz'],'',$attr);
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

//Nilai Mat
echo '<div class="mb-3 row">';
echo form_label('Nilai Matematika', 'nilai_mat',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat1','maxlength'=>'2','value'=>set_value('nilai_mat1'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat2','maxlength'=>'2','value'=>set_value('nilai_mat2'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat3','maxlength'=>'2','value'=>set_value('nilai_mat3'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat4','maxlength'=>'2','value'=>set_value('nilai_mat4'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_mat5','maxlength'=>'2','value'=>set_value('nilai_mat5'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Bing
echo '<div class="mb-3 row">';
echo form_label('Nilai Bahasa Inggris', 'nilai_bing',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing1','maxlength'=>'2','value'=>set_value('nilai_bing1'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing2','maxlength'=>'2','value'=>set_value('nilai_bing2'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing3','maxlength'=>'2','value'=>set_value('nilai_bing3'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing4','maxlength'=>'2','value'=>set_value('nilai_bing4'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bing5','maxlength'=>'2','value'=>set_value('nilai_bing5'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Bind
echo '<div class="mb-3 row">';
echo form_label('Nilai Bahasa Indonesia', 'nilai_bind',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind1','maxlength'=>'2','value'=>set_value('nilai_bind1'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind2','maxlength'=>'2','value'=>set_value('nilai_bind2'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind3','maxlength'=>'2','value'=>set_value('nilai_bind3'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind4','maxlength'=>'2','value'=>set_value('nilai_bind4'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_bind5','maxlength'=>'2','value'=>set_value('nilai_bind5'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
echo '</div>';
echo '</div>';//row
echo '</div>';
echo '</div>';

//Nilai Ipa
echo '<div class="mb-3 row">';
echo form_label('Nilai IPA', 'nilai_ipa',['class'=>'col-sm-2 col-form-label']);
echo '<div class="col-sm-10">';
echo '<div class="row">';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa1','maxlength'=>'2','value'=>set_value('nilai_ipa1'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 1']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa2','maxlength'=>'2','value'=>set_value('nilai_ipa2'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 2']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa3','maxlength'=>'2','value'=>set_value('nilai_ipa3'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 3']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa4','maxlength'=>'2','value'=>set_value('nilai_ipa4'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 4']);
echo '</div>';
echo '<div class="col">';
echo form_input(['name'=>'nilai_ipa5','maxlength'=>'2','value'=>set_value('nilai_ipa5'),'id'=>'nilai','class'=>'form-control','placeholder'=>'Sem 5']);
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
<script>
      $('#sekolah_asal').select2({
        placeholder: '--- Daftar Sekolah ---',
        ajax: {
          url: '<?php echo site_url('daftar/namasekolah');?>',
          dataType: 'json',
          delay: 250,
          processResults: function(data){
            return {
              results: data
            };
          },
          cache: true
        }
      });
</script>

<script>

    $("#cari").select2(function(){
      // event.preventDefault();
      var str=  $("#cari").val();
      if(str == "") {
        $( "#pendaftar" ).html("<b>Data pendaftar ...</b>");
      }
      else {
        $.get("<?php echo site_url();?>/verifikasi/cari?cari="+str, function( data ){
        $( "#pendaftar" ).html( data );
        });
        }
     });

  </script>
