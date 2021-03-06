<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Pendaftaran Akun</h3>
        <hr>
        <?php if (isset($validation)): ?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors() ?>
            </div>
          </div>
        <?php endif; ?>
        <form class="" action="<?php echo site_url('users/register') ?>" method="post">

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="firstname">Nama Depan</label>
               <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="lastname">Nama Akhir</label>
               <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" id="password" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="password_confirm">Ulangi Password</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
            </div>
          </div>

          <!-- <div class="row"> -->
            <div class="col">
              <button type="submit" class="btn btn-primary">Daftar Akun</button>
            </div>
            <div class="col text-right">
              <a href="<?php echo site_url('users') ?>">Sudah mempunyai akun</a>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
