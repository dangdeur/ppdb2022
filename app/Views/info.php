<h1 class="bg-warning text-white text-center">Pendaftaran ditutup tanggal 20 Juni 2022 pukul 23.59</h1>

<?php
// echo "<pre>";
// print_r($PK1);
 ?>

<!-- CONTENT -->
<div class="hero">
        <section>
                <h1>PENGUMUMAN</h1>
		<p>
		<ul>
      <li>Untuk reset password akun PPDB, saat ini hanya kami fasilitasi melalui Telegram Bot</li>
      <li>Bagi peserta PPDB yang akan verifikasi dan ujian, dimohon untuk menerapkan protokol kesehatan pencegahan Covid-19 (Menggunakan Masker)</li>
      <li><div class="fw-bolder bg-success text-white">Bagi yang bermasalah dengan pendaftaran, bisa datang ke Kampus SMKN 2 Pandeglang Senin 20 Juni 2022</div></li>
      <li><div class="fw-bolder">UNTUK YANG UJIAN DAN VERIFIKASI TANGGAL 24 JUNI 2022 SESI 2 10.30, WAKTU PELAKSANAANYA DIUNDUR KE JAM 13.00</div></li>
      <li>NISN bisa diubah dari menu "ubah Data" dibawah nama peserta</li>
      <li>Menu reset secara mandiri telah dihilangkan, apabila butuh reset, silahkan buat list di grup</li>
      <li><div class="text-decoration-line-through">Bagi peserta yang muncul error "Whoops...",
        mohon menunggu. Setelah ada solusi, akan kami infokan kembali disini</div>
        <div class="fw-bolder bg-primary text-white">Perbaikan error "whoops" telah dilakukan sejak jumat 17-06-2022 sore, lakukan ubah data
        apabila diperlukan</div><br />
      </li>
    <li>Saat ini sudah tersedia media komunikasi melalui  <a href="https://t.me/+N5QyoJLThzVlNTg1" class="btn btn-primary">Grup telegram PPDB</a> Silahkan bergabung
      </li>
		<li>Bagi yang sudah mempunyai akun di PPDB SMKN 2 Pandeglang, tidak perlu membuat akun lagi</li>
    <!-- <li>Bagi yang mengalami tampilan error "Whoops!", </li> -->
    <!-- <li>Menu perubahan data saat ini masih belum tersedia,
      perubahan data dapat dilakukan secara mandiri apabila sudah tersedia,
      atau ketika Ujian/Verifikasi di SMKN 2 Pandeglang.</li> -->
		<li><div class="text-decoration-line-through">Menu perubahan data saat ini masih belum tersedia,
			perubahan data dapat dilakukan secara mandiri apabila sudah tersedia,
      atau ketika Ujian/Verifikasi di SMKN 2 Pandeglang.</div>
    <div class="fw-bolder bg-primary text-white">Menu perbaikan data sudah tersedia setelah login.
      Data personal, nilai, dan pilihan jurusan dapat diubah selama belum dilakukan verifikasi
      berkas oleh panitia</div></li><br />
    <li>Bagi yang lupa password, klik tombol berikut
      <a href="<?php echo base_url('reset.php') ?>" class="btn btn-warning">RESET PASSWORD</a>
     </li>
    </ul>
		</p>
      </section>
</div>

<div class="further">
  <section>
    <h1>Jumlah Pendaftar</h1>
  	<p>
		<ul>
      <div class="fw-bolder">
		 <li>Akun Pengguna terdaftar : <?= $pengguna ?></li>
     <li>Jumlah Pendaftar  : <?= $pendaftar ?></li>


    </div>
    <li>
      Peminat Jurusan (Pilihan 1):
      <ul>
        <?php
        for ($a=0;$a<count($PK1);$a++)
        {
          if($PK1[$a]['program_keahlian_1'] !='---')
          {
          echo "<li>".$PK1[$a]['program_keahlian_1']." : ".$PK1[$a]['jumlah']." pendaftar</li>";
          }
        }
        ?>

      </ul>
    </li>

    <li>
      Peminat Jurusan (Pilihan 2):
      <ul>
        <?php
        for ($b=0;$b<count($PK2);$b++)
        {
          if($PK2[$b]['program_keahlian_2'] !='---')
          {
          echo "<li>".$PK2[$b]['program_keahlian_2']." : ".$PK2[$b]['jumlah']." pendaftar</li>";
          }
        }
        ?>

      </ul>
    </li>

    </ul>
		</p>
      </section>
</div>




<div class="heroe">
	<section>
		<h1>Jadwal Pelaksanaan</h1>
		<p>
			<ul>
				<li>Sosialisasi : 20 mei s.d 14 Juni 2022</li>
				<li>Pendaftaran : 15 s.d 20 Juni 2022</li>
				<li>Uji Kompetensi/test Khusus : 21 s.d 29 Juni 2022</li>
				<li>Verifikasi dan Rekonsiliasi data : 21 Juni s.d 1 Juli 2022</li>
				<li>Pengumuman Hasil : 4 Juli 2022</li>
				<li>Daftar Ulang : 05 s.d 07 Juli 2022</li>
				<li>Awal Tahun Pelajaran 2022/2023 : 11 Juli 2022</li>
			</ul>
		</p>
	</section>
</div>

<div class="further">
	<section>
		<h1>Konsentrasi Keahlian Dan Kuota</h1>
		<p>
			<ul>
				<li><?= PK1 ?></li>
				<li><?= PK2 ?></li>
				<li><?= PK3 ?></li>
				<li><?= PK4 ?></li>
				<li><?= PK5 ?></li>
				<li><?= PK6 ?></li>
				<li><?= PK7 ?></li>
				<li><?= PK8 ?></li>
			</ul>
		</p>
	</section>
</div>

<!-- <div class="further">
	<section>
		<h1>Go further</h1>
		<h2>
			<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><rect x='32' y='96' width='64' height='368' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><line x1='112' y1='224' x2='240' y2='224' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='112' y1='400' x2='240' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><rect x='112' y='160' width='128' height='304' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><rect x='256' y='48' width='96' height='416' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><path d='M422.46,96.11l-40.4,4.25c-11.12,1.17-19.18,11.57-17.93,23.1l34.92,321.59c1.26,11.53,11.37,20,22.49,18.84l40.4-4.25c11.12-1.17,19.18-11.57,17.93-23.1L445,115C443.69,103.42,433.58,94.94,422.46,96.11Z' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/></svg>
			Learn
		</h2>
		<p>The User Guide contains an introduction, tutorial, a number of "how to"
			guides, and then reference documentation for the components that make up
			the framework. Check the <a href="https://codeigniter4.github.io/userguide"
			target="_blank">User Guide</a> !</p>

		<h2>
			<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M431,320.6c-1-3.6,1.2-8.6,3.3-12.2a33.68,33.68,0,0,1,2.1-3.1A162,162,0,0,0,464,215c.3-92.2-77.5-167-173.7-167C206.4,48,136.4,105.1,120,180.9a160.7,160.7,0,0,0-3.7,34.2c0,92.3,74.8,169.1,171,169.1,15.3,0,35.9-4.6,47.2-7.7s22.5-7.2,25.4-8.3a26.44,26.44,0,0,1,9.3-1.7,26,26,0,0,1,10.1,2L436,388.6a13.52,13.52,0,0,0,3.9,1,8,8,0,0,0,8-8,12.85,12.85,0,0,0-.5-2.7Z' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M66.46,232a146.23,146.23,0,0,0,6.39,152.67c2.31,3.49,3.61,6.19,3.21,8s-11.93,61.87-11.93,61.87a8,8,0,0,0,2.71,7.68A8.17,8.17,0,0,0,72,464a7.26,7.26,0,0,0,2.91-.6l56.21-22a15.7,15.7,0,0,1,12,.2c18.94,7.38,39.88,12,60.83,12A159.21,159.21,0,0,0,284,432.11' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
			Discuss
		</h2>

		<p>CodeIgniter is a community-developed open source project, with several
			 venues for the community members to gather and exchange ideas. View all
			 the threads on <a href="https://forum.codeigniter.com/"
			 target="_blank">CodeIgniter's forum</a>, or <a href="https://codeigniterchat.slack.com/"
			 target="_blank">chat on Slack</a> !</p>

		<h2>
			 <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><line x1='176' y1='48' x2='336' y2='48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><line x1='118' y1='304' x2='394' y2='304' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/><path d='M208,48v93.48a64.09,64.09,0,0,1-9.88,34.18L73.21,373.49C48.4,412.78,76.63,464,123.08,464H388.92c46.45,0,74.68-51.22,49.87-90.51L313.87,175.66A64.09,64.09,0,0,1,304,141.48V48' style='fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/></svg>
			 Contribute
		</h2>

		<p>CodeIgniter is a community driven project and accepts contributions
			 of code and documentation from the community. Why not
			 <a href="https://codeigniter.com/en/contribute" target="_blank">
			 join us</a> ?</p>

	</section>

</div> -->

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
