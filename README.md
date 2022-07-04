# Aplikasi PPDB 2022

## Credit
Code Igniter 4.1.9 https://github.com/codeigniter4/CodeIgniter4  
Bootstrap 5.1 https://getbootstrap.com/docs/5.1/getting-started/introduction/  
JQuery 3.6 https://jquery.com/  
Login https://github.com/alexlancer/codeigniter4login  

## Installasi  
```bash
apt -y install php-intl php-curl php-mbstring php-xml php-mysql zip unzip php-zip
git clone https://github.com/dangdeur/ppdb2022  
```
## Pengaturan
```bash
cp env .env  
```
Sesuaikan .env  
```
database.default.hostname = localhost  
database.default.database = ppdb2022  
database.default.username = root  
database.default.password =  
database.default.DBDriver = MySQLi  

#CI_ENVIRONMENT = development  
CI_ENVIRONMENT = production  
```

\app\Config\App.php  
```bash
public $baseURL = 'http://localhost/ppdb2022/public/';  
```
Sesuaikan
```bash
\app\Config\Constants.php  
```
Upload logo
\public\assets\gambar  
=> logo.jpg  

Pengaturan PDF
\vendor\tecnickcom\tcpdf\config\tcpdf_config.php  
```bash
define ('PDF_HEADER_LOGO', 'logo.jpg');  
define ('PDF_HEADER_LOGO_WIDTH', 15);  
define ('PDF_HEADER_TITLE', 'SMKN 2 Pandeglang');
```

##Perintah KiBenen_bot  
Mengecek status pendaftaran  
=> status <no_pendaftaran>  
Mengecek HP pendaftar
=> cekhp <no HP> <no_pendaftaran>  
Mereset password akun  
=> reset <no HP> <no_pendaftaran>  
