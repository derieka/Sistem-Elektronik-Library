<?php
	include "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<script src="../js/jquery.qrcode.js"></script>
	<script src="../js/qrcode.js"></script>
	<script src="../js/sriwulan.js"></script>
	<title>Admin - Daftar Anggota</title>
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
	            <li><a href="tambah-anggota.php">Tambah Anggota</a></li>
	            <li class="active"><a href="daftar-anggota.php">Daftar Anggota</a></li>
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
			<h1>Daftar Anggota</h1>
			<div class="well well-sm">
				<p>Petunjuk :</p>
				<p>1. Klik pencarian dan masukkan kata kunci untuk mencari aggota.</p>
				<p>2. Klik edit untuk merubah data anggota.</p>
				<p>3. Klik hapus untuk menghapus data anggota.</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="well well-lg" style="background: white">

		<button type="button" id="search" class="btn btn-primary btn-block">Pencarian</button>

		<!-- form pencarian anggota -->

			<div class="well well-lg" id="searchBox">
				<h2 class="text-center">Pencarian Anggota</h2>
				<div class="text-center">
					<form role="form" method="GET">
						<select name="category">
							<option value="nama">Nama</option>
							<option value="nis_nip">NIS/NIP</option>
							<option value="jurusan">Jurusan</option>
							<option value="status">Status</option>
						</select>
						<input type="text" placeholder="Masukkan kata kunci" name="keyword">
						<input type="submit" name="search" value="cari" class="btn btn-info">
					</form>
				</div>
			</div>

			<table class="table table-hover table-bordered">
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>NIS/NIP</th>
					<th>Jenis kelamin</th>
					<th>Status</th>
					<th>Jurusan</th>
					<th>Tanggal Masuk</th>
					<th>Action</th>
				</tr>
<?php

	//if category and keyword already have values
	//then proceed the following by showing ONLY what user requests
	if(isset($_GET['category'])&&isset($_GET['keyword'])){
		$category = $_GET['category'];
		$keyword = $_GET['keyword'];

		//search for data in table anggota where category contains keyword
		$sql = "SELECT * FROM anggota WHERE $category LIKE '%$keyword%'";
		$result = mysqli_query($connection, $sql);
		if($result){
			$count=mysqli_num_rows($result);
		}else{
			die("Maaf, tidak ditemukan data yang cocok dengan keyword Anda.");
		}


	//if category and keyword are still null
	//then proceed the following by showing all data stored in database
	}else{
		$sql = "SELECT * FROM anggota;";
		$result = mysqli_query($connection, $sql);

		$count=mysqli_num_rows($result);
	}

	if($count>0){
		$number = 1;

		echo "<p>$count data ditampilkan.<p>";

		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["id_anggota"];
	        echo "<tr> <td>" . $number. "</td><td> " .
	        $row["nama"]. "</td><td> " .
	        $row["nis_nip"]."</td><td>".
	        $row["jenis_kelamin"]."</td><td>".
	        $row["status"]."</td><td>".
	        $row["jurusan"]."</td><td>".
	        $row["tgl_masuk"]."</td><td>";

					$qr='id_anggota='.$row["id_anggota"];
					echo '
					<a role="button" class="btn btn-success btn-sm" onclick="printcard(\''.$row["id_anggota"].'\', \''.$row["nama"].'\', \''.$row["nis_nip"].'\', \''.$row["jurusan"].'\')">Cetak Kartu</a>
					<a onclick="generateqr(\''.$qr.'\')" role="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalqrcode">Lihat QRCode</a>
					';

					echo "<a href='edit-anggota.php?id=$id' role='button' class='btn btn-info btn-sm'>Edit</a>&nbsp;".
	        "<a href='delete-anggota.php?id=$id' role='button' class='btn btn-danger btn-sm'>Hapus</a></td></tr>";

		   $number++;
	    }
	}else{
		echo "Maaf, tidak ditemukan data yang cocok.";

	}
?>
			</table>
		</div>
		<!-- Modal QRCODE -->
		<div id="modalqrcode" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">QR Code</h4>
	      </div>
	      <div class="modal-body">
					<div id="qrcodeTable"></div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

		//hide the div when document first ready
		$("#searchBox").hide();
		//toggle when the button is clicked
		$("#search").click(function(){
			$("#searchBox").toggle("medium");
		});
	});
</script>
</body>
</html>
