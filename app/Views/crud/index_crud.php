<div id="userTable"> </div>
<script>
    reloadTable()
    function reloadTable() {
      $.ajax({
        url: "<?php echo site_url('verifikasi/user_table'); ?>",
        beforeSend: function (f) {
          $('#userTable').html('Menampilkan ...');
        },
        success: function (data) {
          $('#userTable').html(data);
        }
      })
    }
</script>
