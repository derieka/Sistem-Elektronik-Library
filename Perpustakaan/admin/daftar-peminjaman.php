<?php
	include "cekAdmin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>

	<title>Admin - Daftar Peminjaman</title>
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
	        <li class="dropdown active">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Peminjaman<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="tambah-peminjaman.php">Pinjam - Kembali</a></li>
	            <li class="active"><a href="daftar-peminjaman.php">Daftar Peminjaman</a></li>
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
			<h1>Daftar Peminjaman</h1>
			<div class="well well-sm">
				<p>Petunjuk :</p>
				<p>Klik pencarian dan masukkan kata kunci untuk mencari.</p>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="well well-lg" style="background: white">
		<button type="button" id="search" class="btn btn-primary btn-block">Pencarian</button>

		<!-- form pencarian anggota -->

			<div class="well well-lg" id="searchBox">
				<h2 class="text-center">Pencarian Peminjaman</h2>
				<div class="text-center">
					<form role="form" method="GET">
						<select name="category">
							<option value="nama">Nama</option>
							<option value="nis_nip">NIS/NIP</option>
							<option value="judul">Judul Buku</option>
							<option value="isbn">ISBN Buku</option>
						</select>
						<input type="text" placeholder="Masukkan kata kunci" name="keyword">
						<input type="submit" name="search" value="cari" class="btn btn-info">
					</form>
				</div>
			</div>
			<table class="table table-hover table-bordered">
				<tr>
					<th>No.</th>
					<th>NIS/NIP peminjam</th>
					<th>Nama peminjam</th>
					<th>Judul buku</th>
					<th>ISBN buku</th>
					<th>Tanggal pinjam</th>
					<th>Tanggal harus kembali</th>
					<th>Tanggal kembali</th>
				</tr>

<?php
	//create query to select all attributes from the three tables using foreign key
	$sql = "SELECT * FROM buku b, anggota a, peminjaman p WHERE b.isbn = p.id_buku AND a.nis_nip = p.id_anggota";
	$result = mysqli_query($connection, $sql);

	if(!$result){
		die("No result found");
	}else{
		$count=mysqli_num_rows($result);
	}

	if($count>0){
		$number = 1;

		echo "<p>$count data ditampilkan.<p>";

		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["id_peminjaman"];
			if(!isset($row["kembali"])){
				//if row kembali is empty, set status to 'belum kembali'
				$status = "belum kembali";
	        }else{
	        	//if row kembali already has value, set status to row kembali value
	        	$status = ($row["kembali"]);
	        }
	        echo "<tr> <td>" . $number. "</td><td> ".
	        $row["id_anggota"]."</td><td>".
	        $row["nama"]."</td><td>".
	        $row["judul"]."</td><td>".
	        $row["id_buku"]."</td><td>".
	        $row["tgl_pinjam"]."</td><td>".
	        $row["tgl_kembali"]."</td><td>".
	        $status."</td></tr>";


	        $number++;
	    }
	}
?>

			</table>
		</div>
	</div>
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
