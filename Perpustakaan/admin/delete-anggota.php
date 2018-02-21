<?php
	include 'cekAdmin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../jquery/jquery-1.11.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.js"></script>
	<title>Notifikasi pembatalan anggota</title>
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
		<div class="well well-lg">
			<div class="alert alert-info">
<?php
	$id= $_GET['id'];
	$sql = "SELECT * FROM peminjaman p, anggota a WHERE a.id_anggota='$id'";
	$result = mysqli_query($connection, $sql);
	if($result){
		//first, fetch the nis_nip of the member
		while($row = mysqli_fetch_assoc($result)){
			$nis_nip = $row["nis_nip"];
			$kembali = $row["kembali"];
			//if kembali is still empty it means the member is still borrowing some book
			//show message that the member cannot be deleted
			if(!isset($kembali)){
				echo "Maaf, anggota tidak dapat dihapus jika masih ada buku yang dipinjam.";
				//break and stop the program here
				return;
			}
			//if all the books borrowed have been returned, proceed the following
		}
		//first delete all the loans ever done
		$sql = "DELETE FROM peminjaman WHERE id_anggota='$nis_nip'";
		$result= mysqli_query($connection, $sql);
		if($result){
			//then delete the member
			$sql = "DELETE FROM anggota WHERE id_anggota = '$id'";
			$result = mysqli_query($connection, $sql); 
			if($result){
				echo "Anggota berhasil dihapus!";
				
			}else{
				echo "Gagal dihapus!";
				
			}
		}else{
			echo "An error has occured";
		}
		
	}else{
		echo "An error has occured";
	}
	
?>	
		</div>
		<a href="daftar-anggota.php" class="btn btn-info">Kembali</a>
		</div>
	</div>
</body>
</html>