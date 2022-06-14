<div class="col-sm-10 table-responsive">
     <!-- Search form -->
     <form method='get' action="<?php echo site_url('paginasi/tampilSemua') ?>" id="searchForm">
       <input type='text' name='search' value='<?= $search ?>'><input type='button' id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'>
     </form>
     <br/>

     <table class="table table-hover" border='1'>
       <thead>
         <tr>
           <th>NISN</th>
           <th>Nama Pendaftar</th>
           <th>Alamat</th>

         </tr>
       </thead>
       <tbody>
         <?php
         foreach($pendaftar as $user){
           echo "<tr>";
           echo "<td>".$user['nisn']."</td>";
           echo "<td>".$user['nama_pendaftar']."</td>";
           echo "<td>".$user['alamat']."</td>";
           echo "</tr>";
         }
         ?>
       </tbody>
     </table>

     <!-- Paginate -->
     <div style='margin-top: 10px;'>
       <?= $pager->links() ?>
     </div>
