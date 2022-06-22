<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">

        <h3>Pengajuan Bantuan Layanan</h3>
        <hr>
        <?php if (isset($validation)): ?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors() ?>
            </div>
          </div>
        <?php endif; ?>
        <form class="" action="<?php echo site_url('info/bantuan') ?>" method="post">
            <div class="row">
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email saat daftar akun">
              </div>
            </div>

            <?php
            $tgl['']="Tanggal";
            for ($a=1;$a<=31;$a++) {
              $tgl[$a]=$a;
            }

            $bln=['0'=>'Bulan','01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni',
                  '07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
            $thn['']="Tahun";
            for ($b=2004;$b<=2009;$b++) {
            $thn[$b]=$b;
            }
            $attr=['class'=>'form-select'];
            ?>
            <div class="col-12 col-sm-4">
              <div class="form-group">
               <label for="tgl">Tanggal Lahir</label>
                 <?php   echo form_dropdown('tgl', $tgl,set_value('tgl'),$attr); ?>
               </div>
             </div>

             <div class="col-12 col-sm-4">
               <div class="form-group">
                <label for="bln">Bulan Lahir</label>
                  <?php   echo form_dropdown('bln', $bln,set_value('bln'),$attr); ?>
                </div>
              </div>

              <div class="col-12 col-sm-4">
                <div class="form-group">
                 <label for="thn">Tahun Lahir</label>
                   <?php echo form_dropdown('thn', $thn,set_value('thn'),$attr); ?>
                 </div>
               </div>
<?php
foreach (BANTUAN as $x) {
  $bantuan[$x]=$x;
}
 ?>
               <div class="col-12">
                 <div class="form-group">
                  <label for="layanan">Layanan Bantuan</label>
                    <?php   echo form_dropdown('layanan', $bantuan ,set_value('layanan'),$attr); ?>
                  </div>
                </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary form-control">Simpan Ajuan</button>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
