# Aplikasi PPDB 2022

## Credit
Code Igniter 4.1.9 https://github.com/codeigniter4/CodeIgniter4
Bootstrap 5.1 https://getbootstrap.com/docs/5.1/getting-started/introduction/
JQuery 3.6 https://jquery.com/
Login https://github.com/alexlancer/codeigniter4login

## Installasi
git clone https://github.com/dangdeur/ppdb2022

## Pengaturan
cp env .env

Sesuaikan .env
=> database.default.hostname = localhost
=> database.default.database = ppdb2022
=> database.default.username = root
=> database.default.password =
=> database.default.DBDriver = MySQLi

CI_ENVIRONMENT = development
=> CI_ENVIRONMENT = production

\app\Config\App.php
=> public $baseURL = 'http://localhost/ppdb2022/public/';

\app\Config\Constants.php

\public\assets\gambar
=> logo.jpg

\vendor\tecnickcom\tcpdf\config\tcpdf_config.php
=> define ('PDF_HEADER_LOGO', 'logo.jpg');
=> define ('PDF_HEADER_LOGO_WIDTH', 15);
=> define ('PDF_HEADER_TITLE', 'SMKN 2 Pandeglang');
