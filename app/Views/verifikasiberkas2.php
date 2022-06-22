<div class="form-group">
  <div class="input-group mb-3">
    <span class="input-group-text">Cari</span>
    <input type="text" name="cari" id="cari" placeholder="Ketik no pendaftaran, nama, sekolah" class="form-control" />
  </div>
</div>

<br />

    <div id="pendaftar"> </div>

  <div style="clear:both"></div>

<script>
  $(document).ready(function(){
    $("#cari").keyup(function(){
      // event.preventDefault();
      var str=  $("#cari").val();
      if(str == "") {
        $( "#pendaftar" ).html("<b>Data pendaftar ...</b>");
      }
      else {
        $.get("<?php echo site_url();?>/verifikasi2/cari2?cari="+str, function( data ){
        $( "#pendaftar" ).html( data );
        });
        }
     });
  });
  </script>
