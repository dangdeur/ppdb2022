<?php
echo "<h1>Reset password akun PPDB saat ini hanya tersedia melalui Telegram Bot</h1>";
header( "refresh:5;url=http://ppdb.smkn2pandeglang.sch.id");
exit();
?>



//$conn = new mysqli('localhost', 'root', 'H@rares3', 'ppdb2022');

function ubah($email) {
//$conn = new mysqli('localhost', 'root', '', 'ppdb2022');
$conn = new mysqli('localhost', 'root', 'H@rares3', 'ppdb2022');
  if ($conn->connect_error) {
    die("Tidak terkoneksi : " . $conn->connect_error);
  }

  $pass_1234 = '$2y$10$Qk317sTvbZoGKQ32yVHfJudVxFhMmlNdNey3RPo1CI4qnm72Qckfe';
//$pass_baru = mysqli_real_escape_string($pass_1234);
  $email_="'".$email."'";
  $sql = "UPDATE `users` SET `password`='\$2y\$10\$Qk317sTvbZoGKQ32yVHfJudVxFhMmlNdNey3RPo1CI4qnm72Qckfe' WHERE `email`='".$email."'";
  //echo $sql;
    $update=$conn->query($sql);

    // $sql_u= sprintf("UPDATE users SET password='%s' WHERE email='$email_'",
    //     mysqli_real_escape_string($conn, $pass_1234));
    // $update = mysqli_query($conn, $sql_u);

    if ($update) {
      $a=TRUE;
    }
    else {
      $a=FALSE;
    }
  return $a;

  }

  function sanitasi($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //$conn = new mysqli('localhost', 'root', '', 'ppdb2022');
  $conn = new mysqli('localhost', 'root', 'H@rares3', 'ppdb2022');
  $email_p = sanitasi($_POST["email"]);

  $email="'".$email_p."'";
  $q = "SELECT * from users WHERE email=".$email;
  $hasil=$conn->query($q);
  $row = $hasil->fetch_assoc();

  // echo "<pre>";
  // print_r($hasil);

  if (isset($row) && count($row) > 0) {

      if ($email_p == $row["email"])
      {
        $x=ubah($row['email']);
        if (isset($x)) {
        $e="<h3>Password berhasil direset,</h3>
                <p>password baru anda adalah : 1234 . Setelah berhasil login, harap diganti
                sesuai keinginan di menu Ubah Akun</p>";
        } else {
          $e="<h4>Error reset, mohon diingat kembali email yang digunakan saat pendaftaran akun.</h4>";
        }
      }
    }
    else {
      $e = "<h4>data email yang anda masukan tidak terdapat didalam database</h4>";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PPDB SMKN 2 Pandeglang</title>
	<!-- CSS only -->
	<link href="assets/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="favicon.ico"/>

	<!-- STYLES -->

	<style {csp-style-nonce}>
		* {
			transition: background-color 300ms ease, color 300ms ease;
		}
		*:focus {
			background-color: rgba(221, 72, 20, .2);
			outline: none;
		}
		html, body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}
		header {
			background-color: rgba(247, 248, 249, 1);
			padding: .4rem 0 0;
		}
		.menu {
			padding: .4rem 2rem;
		}
		header ul {
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			list-style-type: none;
			margin: 0;
			overflow: hidden;
			padding: 0;
			text-align: right;
		}
		header li {
			display: inline-block;
		}
		header li a {
			border-radius: 5px;
			color: rgba(0, 0, 0, .5);
			display: block;
			height: 44px;
			text-decoration: none;
		}
		header li.menu-item a {
			border-radius: 5px;
			margin: 5px 0;
			height: 38px;
			line-height: 36px;
			padding: .4rem .65rem;
			text-align: center;
		}
		header li.menu-item a:hover,
		header li.menu-item a:focus {
			background-color: rgba(221, 72, 20, .2);
			color: rgba(221, 72, 20, 1);
		}
		header .logo {
			float: left;
			height: 44px;
			padding: .4rem .5rem;
		}
		header .menu-toggle {
			display: none;
			float: right;
			font-size: 2rem;
			font-weight: bold;
		}
		header .menu-toggle button {
			background-color: rgba(221, 72, 20, .6);
			border: none;
			border-radius: 3px;
			color: rgba(255, 255, 255, 1);
			cursor: pointer;
			font: inherit;
			font-size: 1.3rem;
			height: 36px;
			padding: 0;
			margin: 11px 0;
			overflow: visible;
			width: 40px;
		}
		header .menu-toggle button:hover,
		header .menu-toggle button:focus {
			background-color: rgba(221, 72, 20, .8);
			color: rgba(255, 255, 255, .8);
		}
		header .heroe {
			margin: 0 auto;
			max-width: 1100px;
			padding: 1rem 1.75rem 1.75rem 1.75rem;
		}
		header .heroe h1 {
			font-size: 2.5rem;
			font-weight: 500;
		}
		header .heroe h2 {
			font-size: 1.5rem;
			font-weight: 300;
		}
		section {
			margin: 0 auto;
			max-width: 1100px;
			padding: 2.5rem 1.75rem 3.5rem 1.75rem;
		}
		section h1 {
			margin-bottom: 2.5rem;
		}
		section h2 {
			font-size: 120%;
			line-height: 2.5rem;
			padding-top: 1.5rem;
		}
		section pre {
			background-color: rgba(247, 248, 249, 1);
			border: 1px solid rgba(242, 242, 242, 1);
			display: block;
			font-size: .9rem;
			margin: 2rem 0;
			padding: 1rem 1.5rem;
			white-space: pre-wrap;
			word-break: break-all;
		}
		section code {
			display: block;
		}
		section a {
			color: rgba(221, 72, 20, 1);
		}
		section svg {
			margin-bottom: -5px;
			margin-right: 5px;
			width: 25px;
		}
		.further {
			background-color: rgba(247, 248, 249, 1);
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			border-top: 1px solid rgba(242, 242, 242, 1);
		}
		.further h2:first-of-type {
			padding-top: 0;
		}
		footer {
			background-color: rgba(221, 72, 20, .8);
			text-align: center;
		}
		footer .environment {
			color: rgba(255, 255, 255, 1);
			padding: 2rem 1.75rem;
		}
		footer .copyrights {
			background-color: rgba(62, 62, 62, 1);
			color: rgba(200, 200, 200, 1);
			padding: .25rem 1.75rem;
		}
		@media (max-width: 629px) {
			header ul {
				padding: 0;
			}
			header .menu-toggle {
				padding: 0 1rem;
			}
			header .menu-item {
				background-color: rgba(244, 245, 246, 1);
				border-top: 1px solid rgba(242, 242, 242, 1);
				margin: 0 15px;
				width: calc(100% - 30px);
			}
			header .menu-toggle {
				display: block;
			}
			header .hidden {
				display: none;
			}
			header li.menu-item a {
				background-color: rgba(221, 72, 20, .1);
			}
			header li.menu-item a:hover,
			header li.menu-item a:focus {
				background-color: rgba(221, 72, 20, .7);
				color: rgba(255, 255, 255, .8);
			}
		}
	</style>


</head>
<body>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h1>Menu reset password</h1>
  Email : <input type="text" name="email" class="form-control" placeholder="Masukan email yang sudah terdaftar"><br>
<br />
  <input type="submit" class="btn btn-danger" value="RESET">
<a href="http://ppdb.smkn2pandeglang.sch.id/" class="btn btn-warning">Kembali ke Situs PPDB</a>
  </form>

<?php
if (isset($e))
{
  echo $e;
}






//$conn->close();
?>
</body>
</html>
