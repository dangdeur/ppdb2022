<div class="container">
  <div class="row">
    <div class="col-12">
      <h3><?= session()->get('firstname') ?> <?= session()->get('lastname') ?></h3>
      </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="container">

          <form class="" action="<?php echo site_url('users/profile') ?>" method="post">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                 <label for="firstname">Nama Depan</label>
                 <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname', $user['firstname']) ?>">
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                 <label for="lastname">Nama Belakang</label>
                 <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname', $user['lastname']) ?>">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                 <label for="email">Email</label>
                 <input type="text" class="form-control" readonly id="email" value="<?= $user['email'] ?>">
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
                <label for="password_confirm">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
              </div>
            </div>
            <?php if (isset($validation)): ?>
              <div class="col-12">
                <div class="alert alert-danger" role="alert">
                  <?= $validation->listErrors() ?>
                </div>
              </div>
            <?php endif; ?>
            </div>

            <div class="row">
              <div class="col-12 col-sm-4">
                <button type="submit" class="btn btn-primary">Perbaharui</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
