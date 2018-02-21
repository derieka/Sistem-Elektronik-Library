<?php
	require "cekAdmin.php";

	$id = $_GET['id'];

	$sql = "SELECT * FROM anggota WHERE id_anggota = '$id'";
	
	$result = mysqli_query($connection, $sql); 
	$count=mysqli_num_rows($result);

	if($count==1){
		while($row = mysqli_fetch_assoc($result)){

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Admin - Edit Data Anggota</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">SeL Admin</a>
	    </div>
	    <div>
	       	<ul class="nav navbar-nav navbar-right">
        		<li><a href="daftar-anggota.php">Kembali</a>
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
			<h3>Edit Data Anggota</h3>
			<h5 class="text-info">Mohon isi data dengan lengkap dan benar.</h5>
			<form role="form" class="form-horizontal" method="POST">

			  	<div class="form-group">
					<label for="id_anggotta">ID Anggota :</label><br>
					<input type="text" maxlength="100" name="id_anggota" placeholder="ID anggota" class="form-control" id="id_anggota" value="<?php echo $row['id_anggota']; ?>" required>
				</div>

				<div class="form-group">
					<label for="nama">Nama :</label><br>
					<input type="text" maxlength="100" name="nama" placeholder="Nama" class="form-control" id="Nama" value="<?php echo $row['nama']; ?>" required>
				</div>

				<div class="form-group">
					<label for="nis_nip">NIS/NIP :</label><br>
					<input type="text" maxlength="30" name="nis_nip" placeholder="NIS (untuk siswa) / NIP (untuk guru)" class="form-control" id="nis_nip" required>
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
				
				
				<div class="form-group">
					<label for="status">Status :</label><br>
					<select name="status">
						<option value="Siswa">Siswa</option>
						<option value="Guru">Guru</option>
						<option value="Lainnya">Lainnya</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="jenis_kelamin">Jenis kelamin :</label><br>
					<select name="jenis_kelamin">
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>


<?php
				}
	}

?>			
				<input type="submit" class="btn btn-success" value="Submit" name="editAnggota">
				<a role="button" class="btn btn-default" id="resetButton" href="daftar-anggota.php">Batalkan</a>

			</form>
		</div>
	</div>

</body>
</html>

<?php

	if(isset($_POST['editAnggota'])){
		//if it is, then proceed to the following

		$id_anggota = $_POST['id_anggota'];
		$nama = $_POST['nama'];
		$nis_nip = $_POST['nis_nip'];
		$jurusan = $_POST['jurusan'];
		$status = $_POST['status'];
		$jenis_kelamin = $_POST['jenis_kelamin'];

		//update data to database
		$sql = "UPDATE anggota SET id_anggota='$id_anggota', nama='$nama', nis_nip='$nis_nip', jurusan='$jurusan', status='$status', jenis_kelamin='$jenis_kelamin' WHERE id_anggota='$id' ";

		try{
			$result = mysqli_query($connection, $sql);	
		}catch(Exception $errorMessage){
			echo "Error :".$errorMessage;
		}
		

		if($result){
			echo "<script> alert('Data berhasil di perbarui.');</script>";
			header("Location: daftar-buku.php");
		}else{
			echo "<script>alert('Data gagal diperbarui. Silahkan cek kembali.');</script>";
		}
	}
?>