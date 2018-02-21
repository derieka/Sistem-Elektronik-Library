<?php
	include ("cek.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="jquery/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>

	<style type="text/css">

		/*to make the background image responsive and cover the page*/
		body{
			background-size: cover;
		}
	</style>

	<title>About Page</title>

</head>
<body background="img/bg_lib.jpg">
	<!-- navigation bar -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">SeL</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li><a href="search.php">Daftar Buku</a></li>
	        <li class="active"><a href="">About</a></li>

	      </ul>
		  <ul class="nav navbar-nav navbar-right">

			<a href="login-page.php">
				<button type="button" class="btn btn-primary btn-md">
				<span class="glyphicon glyphicon-log-in"></span> Login Admin
				</button>
			</a>
		  
	     </ul>
	    </div>
	  </div>
	</nav>


	<div class="container">
		<!-- body text -->
		<div class="jumbotron" style="background: white">
	
			<h1 class="page-header">About Us</h1>
			<p>SeL atau <strong>Stembase e-Library</strong> adalah sistem informasi perpustakaan yang terintegrasi, meliputi katalog buku secara online dan inventori perpustakaan 
			milik SMK Negeri 7 Semarang. Salah satu tujuan didirikannya SeL adalah untuk memenuhi kebutuhan akademis guru dan murid
			berupa buku-buku referensi ilmiah yang diperlukan guna menunjang studi mereka dalam pembelajaran.</p>
			<p><b>Alamat kami:</b>
			<br>SMK Negeri 7 Semarang
			<br>Jalan Simpang Lima, Kel. Mugas Sari, Kec. Semarang Selatan, Semarang, Jawa Tengah, Indonesia
			<br>Telp / Faks : (024) 8311532
			<br>e-mail : sel@smkn7.sch.id></p>
			<br>
			<div class="alert alert-warning">
			<p><strong>DISCLAIMER : </strong></p>
			<p>Aplikasi web ini <strong>bukan situs sebenarnya</strong>. Aplikasi ini dibuat oleh siswa Kompetensi Keahlian Teknik Komputer dan Jaringan untuk memenuhi 
			nilai Tugas Akhir Sekolah tahun 2017.</p>
			</div>
	
		</div>
	</div>
</body>
</html>