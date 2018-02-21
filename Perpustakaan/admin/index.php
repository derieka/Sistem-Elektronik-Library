<?php
	require ("cekAdmin.php");
?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin Homepage</title>

</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">SeL Admin</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home</a></li>
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-peminjaman.php">Pinjam - Kembali</a></li>
	            <li><a href="daftar-peminjaman.php">Daftar Peminjaman</a></li>  
	          </ul>
	        </li>
	        <li class="dropdown">
	       		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Anggota<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-anggota.php">Tambah Anggota</a></li>
	            <li><a href="daftar-anggota.php">Daftar Anggota</a></li>  
	          </ul>
	        </li> 
	        <li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Buku<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-buku.php">Tambah Buku</a></li>
	            <li><a href="daftar-buku.php">Daftar Buku</a></li> 
	          </ul>
	        </li> 
	      </ul>
	    	<ul class="nav navbar-nav navbar-right">
        		<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown">
        				<span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["username"]; ?> <span class="caret"></span>
        			</a> 
        			<ul class="dropdown-menu">
        				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>

        			</ul>
        		</li>
        	</ul>
	    	
	    </div>
	  </div>
	</nav>


	<div class="container">
		<div class="well well-lg">
		<div class="jumbotron">
			<?php
				echo "<h2>Hai, ".$_SESSION["nama"]." !</h2>";
				echo "<p>Anda memiliki hak akses ke database perpustakaan ini.</p>";
			?>
			
			
		</div>
		<div class="well well-md">
			<h4>Petunjuk :</h4>
			<p>1. Pilih "Peminjaman" -> "Pinjam - Kembali" untuk melakukan input peminjaman dan pengembalian buku.</p>
			<p>2. Pilih "Peminjaman" -> "Daftar Peminjaman" untuk melihat daftar peminjaman dan pengembalian buku.</p>
			<p>3. Pilih "Anggota" -> "Tambah Anggota" untuk menambahkan anggota baru.</p>
			<p>4. Pilih "Anggota" -> "Daftar Anggota" untuk melihat daftar anggota.</p>
			<p>5. Pilih "Buku" -> "Tambah Buku" untuk menambahkan data buku baru.</p>
			<p>6. Pilih "Buku" -> "Daftar Buku" untuk melihat daftar buku.</p>
			<p>7. Pilih "Log out" untuk keluar dari sesi admin.</p>
			
		</div>
		<a href="logout.php"><button class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-log-out"></span> Log out</button></a>
		</div>
	</div>

</body>
</html>