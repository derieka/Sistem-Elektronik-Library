<?php
	require "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin - Tambah Anggota</title>
</head>
<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">SeL Admin</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-peminjaman.php">Pinjam - Kembali</a></li>
	            <li><a href="daftar-peminjaman.php">Daftar Peminjaman</a></li>  
	          </ul>
	        </li>
	        <li class="dropdown active">
	       		<a class="dropdown-toggle" data-toggle="dropdown" href="#">Anggota<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li class="active"><a href="tambah-anggota.php">Tambah Anggota</a></li>
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
		<div class="well well-md" id="notif">
			<!-- Message is show here -->
		</div>
		<div class="well well-lg">
			<h3>Tambah Anggota</h3>
			<h5 class="text-info">Mohon isi data dengan lengkap dan benar.</h5>
			<form role="form" class="form-horizontal" method="POST">

			  	<div class="form-group">
					<label for="nama">Nama lengkap :</label><br>
					<input type="text" maxlength="50" name="nama" placeholder="Nama lengkap" class="form-control" id="nama" required>
				</div>

				<div class="form-group">
					<label for="nis_nip">NIS/NIP :</label><br>
					<input type="text" maxlength="30" name="nis_nip" placeholder="NIS (untuk siswa) / NIP (untuk guru)" class="form-control" id="nis_nip" required>
				</div>

				<div class="form-group">
					<label for="jenis_kelamin">Jenis kelamin :</label><br>
					<select name="jenis_kelamin">
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="status">Status :</label><br>
					<select name="status">
						<option value="Siswa">Siswa</option>
						<option value="Guru">Guru</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
				<div class="form-group">
					<label for="jurusan">Kompetensi Keahlian :</label><br>
					<select name="jurusan">
						<option value="TKR">T. Kendaraan Ringan</option>
						<option value="TP">T. Permesinan</option>
						<option value="TITL">T. Instalasi Tenaga Listrik</option>
						<option value="TEI">T. Elektronika Industri</option>
						<option value="TAV">T. Audio Video</option>
						<option value="TME">T. Mekatronika</option>
						<option value="TGB">T. Gambar Bangunan</option>
						<option value="TKBB">T. Konstruksi Batu dan Beton</option>
						<option value="TKJ">T. Komputer dan jaringan</option>
					</select>
				</div>
				
				<input type="submit" class="btn btn-success" value="Submit" name="insertAnggota">
			
			</form>

		</div>
	</div>

</body>
</html>

<?php
	//first check if post insertAnggota has value
	if(isset($_POST['insertAnggota'])){
		//if it is, then proceed to the following
		$nama = $_POST["nama"];
		$nis_nip = $_POST["nis_nip"];
		$jenis_kelamin = $_POST["jenis_kelamin"];
		$jurusan = $_POST["jurusan"];
		$status = $_POST["status"];

		$sql = "INSERT INTO anggota (nama, nis_nip, jenis_kelamin, jurusan, status, tgl_masuk) VALUES ('$nama', '$nis_nip', '$jenis_kelamin', '$jurusan', '$status', NOW() );";
		
		$result = mysqli_query($connection, $sql); 

		if($result){
?>

<script type="text/javascript">
	var notif = document.getElementById("notif");

	var show = "<div class='alert alert-success'><p><strong>Sukses!</strong> Data berhasil masuk.</p>";
	show+="<p><a href='daftar-anggota.php' class='btn btn-success'> Lihat semua anggota.</a></p></div>";
	notif.innerHTML = show;
</script>

<?php
		}else{
		//if inserting data fails, show error notification	
?>

<script type="text/javascript">
	var notif = document.getElementById("notif");
	var show = "<div class='alert alert-warning'><p><strong>Gagal!</strong> Terjadi kesalahan. Data tidak berhasil masuk.</p>";
	show+="<a href='daftar-anggota.php'>Lihat semua anggota.</a>";
	notif.innerHTML = show;
</script>
	</div>
</body>
</html>

<?php
		}
	}
?>