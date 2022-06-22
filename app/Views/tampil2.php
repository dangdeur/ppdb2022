<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Administrator</title>

    <!-- Bootstrap core CSS -->

<link href="<?php echo base_url('assets/bootstrap-5.1.3/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/dashboard/dashboard.css'); ?>" rel="stylesheet">

<script src="<?php echo base_url('assets/jquery/jquery-3.6.0.min.js'); ?>"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .pagination li.active{
        background: deepskyblue;
        color: white;
      }
      .pagination li.active a{
        color: white;
        text-decoration: none;
      }
    </style>


    <!-- Custom styles for this template -->

  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?= SEKOLAH ?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="<?php echo site_url('verifikasi/logout') ?>">Keluar</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>

            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('verifikasi/cari') ?>">
              <span data-feather="file"></span>
              Verifikasi Berkas
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('paginasi/tampilsemua') ?>">
              <span data-feather="file"></span>
              Tampilkan Pendaftar
            </a>
          </li>


      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $firstname." ".$lastname ?></h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0"> -->
          <!-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        <!-- </div> -->
      </div>

      <form method='get' action="<?php echo site_url('paginasi/tampilSemua') ?>" id="searchForm">
        <input type='text' name='search' value='<?= $search ?>'><input type='button' id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'>
      </form>
      <br/>

      <table class="table table-hover" border='1'>
        <thead>
          <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama Pendaftar</th>
            <th>Alamat</th>

          </tr>
        </thead>
        <tbody>
          <?php
          foreach($pendaftar as $user){
            echo "<tr>";
            echo "<td>".$user['no_pendaftaran']."</td>";
            echo "<td>".$user['nisn']."</td>";
            echo "<td>".$user['nama_pendaftar']."</td>";
            echo "<td>".$user['sekolah_asal']."</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>

      <!-- Paginate -->
      <div style='margin-top: 10px;'>
        <?= $pager->links() ?>
      </div>
