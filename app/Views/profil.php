<div class="container-fluid">

<!--  -->
    <div class="mb-3">
      <h2>Halo <?= $firstname ." ". $lastname ?>,</h2>
    </div>

  <div class="mb-3">
    <label class="col-sm-4 form-label">Status pendaftaran PPDB 2022</label>
  </div>

  <?php
  if ($status==0)
  {
   ?>
  <div class="d-grid gap-2">
   <a href="<?php echo site_url('daftar') ?>" class="btn btn-primary">Belum Terdaftar/Klik Untuk mendaftar</a>
  </div>
  <?php
  }
  else
  {
  ?>
  <div class="d-grid gap-2">
   <a href="<?php echo site_url('detail') ?>" class="btn btn-primary">Sudah Terdaftar/Klik untuk detail</a>
  </div>
  <?php } ?>


</div>
