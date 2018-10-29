<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>New Data</title>
  </head>
  <body>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php
session_start();
include'koneksi.php';
$user=$_GET['id'];
$select = "SELECT * FROM jurnal WHERE username = '$user'";
$query = mysqli_query($konek, $select);
$hasil= mysqli_fetch_array($query);

?>
<div class="position-relative">
<div class="float-lg-center">
<div class="p-3 mb-2 bg-secondary text-white">
<center><H1>FORM NEW DATA</H1>
	<br>
<form method="post">
 <div class="form-group">
<table border="0">

	<tr>
		<td><label for="nama">Nama </label><br></td>
		<td><input type="text" name="nama" class="form-control" id="nama" required><br></td>
	</tr>
	<tr>
		<td><label for="nim">NIM </label></td>
		<td><input type="text" name="nim" class="form-control" id="nim" required><br></td>
	</tr>
	<tr>
		<td><label for="kelas">Kelas  </label></td>
		<td><input type="text" name="kelas" class="form-control" id="kelas"><br></td>
	</tr>
	<tr>
		<td><label for="hobi">Hobi </label></td>
		<td><input type="text" name="hobi" class="form-control" id="hobi"><br></td>
	</tr>
	<tr>
		<td><label for="genre" >Genre Film </label></td>
		<td><select name="genre" id="genre" class="custom-select">
				<option value="Horror">Horror</option>
				<option value="Anime">Anime</option>
				<option value="Action">Action</option>
				<option value="Drama">Drama</option>
			</select><br><br>
		</td>
	</tr>
	<tr>
		<td><label for="wisata" >Tempat Wisata</label></td>
		<td><select name="wisata"  id="wisata" class="custom-select">
				<option value="Bali">Bali</option>
				<option value="Tanjung Selor">Tanjung Selor</option>
				<option value="Jakarta">Jakarta</option>
				<option value="Lombok">Lombok</option>
			</select><br><br>
		</td>
	</tr>
	<tr>
		<td>Tanggal  </td>
		<td><input type="date" name="tgl" class="custom-select"></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><br><button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button></td>
	</tr>
</table>
</div>
</form>
</center>
</div>
</div>
</div>

<?php
if(isset($_POST['submit'])){
$nama= $_POST['nama'];
$nim=$_POST['nim'];
$kelas=$_POST['kelas'];
$hobi=$_POST['hobi'];
$genre=$_POST['genre'];
$wisata=$_POST['wisata'];
$tgl=$_POST['tgl'];

$panjangnim=strlen($_POST['nim']);
$panjangnama=strlen($_POST['nama']);
$cek=true;

	if(empty($nim)) {
		echo"nim harus diisi !!<br>";
		$cek=false;
	}else{
		if($panjangnim>10){
			echo"nim harus 10 digit !!<br>";
			$cek=false;
		}else{
			if(!is_numeric($nim)){
				echo "nim harus angka!!<br>";
				$cek=false;
			}
		}
	}

	if(empty($nama)) {
		echo"nama harus diisi !!<br>";
		$cek=false;
		}else{
			if($panjangnama>25){
			echo"nama max 25 digit!!<br>";
			$cek=false;
		}else{
			if(is_numeric($nama)){
			echo"nama harus huruf!!<br>";
			$cek=false;
		}
	}
}


	if($cek==true){
	if(isset($_GET['id'])){
	$sql = "UPDATE `jurnal` SET `nama` = ' $nama', `nim` = '$nim', `kelas` = '$kelas', `hobi` = ' $hobi', `genre` = '$genre', `wisata` = '$wisata', `tgl` = '$tgl' WHERE `jurnal`.`username` = '$user';";
	$result = $konek->query($sql) or die ("Update Failed !!" . $konek->error);
	header("Location: dashboard.php");
	
	}else{
		echo "ERROR" . $konek->error;
		header("Location: newData.php");
	}



		/*	if(mysqli_affected_rows($konek) >0){
			echo"berhasil ditambahkan";
	}else{
			echo "gagal ditambahkan";
			echo "<br>";
			echo mysqli_error($konek);
		}*/
		
}
	}

 
?>