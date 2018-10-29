<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Profile</title>
  </head>
  <body>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<div class="position-relative">
<div class="float-lg-center">
<div class="p-3 mb-2 bg-secondary text-white">
<center><H1>PROFIL ANDA</H1>
<?php

session_start();
include'koneksi.php';

$user = $_GET['id'];
$sql="SELECT * FROM jurnal WHERE `jurnal`.`username` = '$user';";
$query=mysqli_query($konek, $sql);
$halo= mysqli_fetch_array($query);

?>
<img src="<?= $halo['foto']; ?>" width="150" class="rounded" ><br><br>
<form method="post">
<input  type="file" name="foto"><br>
<input type="submit" name="submit" value="Ubah"><br>
</form>
<?php
if (isset($_POST['submit'])) {
	$foto= $_POST['foto'];
	$sql = "UPDATE `jurnal` SET `foto` = ' $foto'  WHERE `jurnal`.`username` = '$user';";
	$result = $konek->query($sql) or die ("Update Failed !!" . $konek->error);
	
	}

echo "Nama : " .$halo['nama']."<br>";
echo "NIM : " .$halo['nim']."<br>";
echo "kelas : " .$halo['kelas']."<br>";
echo "Hobi : " .$halo['hobi']."<br>";
echo "Genre : " .$halo['genre']."<br>";
echo "Wisata : " .$halo['wisata']."<br>";
echo "Tanggal Lahir : " .$halo['tgl']."<br>";
echo "Username : " .$halo['username']."<br>";
echo "Email : " .$halo['email']."<br>";
echo "Password : " .$halo['password']."<br>";
?>
<form method="post">
<input  type="password" name="password2" ><br>
<input type="submit" name="subpass" value="Ubah Password"><br>
</form>
<?php
if (isset($_POST['subpass'])) {
	$pass2= $_POST['password2'];
	$sql2 = "UPDATE `jurnal` SET `password` = ' $pass2'  WHERE `jurnal`.`username` = '$user';";
	$result = $konek->query($sql2) or die ("Update Failed !!" . $konek->error);
	
	}
?>


<a href ="dashboard.php" class="badge badge-primary"> Dashboard.</a><br>
<a href="logout.php"  class="badge badge-primary">Logout</a>

</center>
</div>
</div>
</div>