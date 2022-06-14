
      <div class="form-group">
    <div class="input-group mb-3">
     <span class="input-group-text">Cari</span>
     <input type="text" name="no_cari" id="no_cari" placeholder="Ketik no pendaftaran" class="form-control" />
    </div>
   </div>
   <br />
   <div id="userTable"> </div>
  </div>
  <div style="clear:both"></div>


<script>
    reloadTable()
    function reloadTable() {
      $.ajax({
        url: "<?php echo site_url('verifikasi/user_table'); ?>",
        data:{'no_pendaftaran':$('no_cari').val()},
        beforeSend: function (f) {
          $('#userTable').html('Menampilkan ...');
        },
        success: function (data) {
          $('#userTable').html(data);
        }
      })
    }
</script>
