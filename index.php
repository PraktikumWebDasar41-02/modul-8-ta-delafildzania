<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>index</title>
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
<center><H1>FORM LOGIN</H1>
<br><br>
<form method="post" action="index.php">
	<div class="form-group">
<table border="0">
	<tr>
		<td><label for="user">Username</label><br></td>
		<td><input type="text" name="user" id="user" class="form-control"><br></td>
	</tr>
	<tr>
		<td><label for="pass">Password</label><br></td>
		<td><input type="password" name="pass" id="pass" class="form-control"><br></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><button type="submit" name="submit" value="Login" class="btn btn-primary">Login</button></td>
	</tr>
</table>


<?php
session_start();
include'koneksi.php';
if(isset($_POST['submit'])){	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$data = mysqli_query($konek, "SELECT * FROM jurnal WHERE username= '$user' AND password= '$pass'");

	$cek= mysqli_num_rows($data);
	if($cek > 0){
		$result = mysqli_fetch_assoc($data); 
		$_SESSION['username'] =  $result['user'];
		$_SESSION['password'] =  $result['pass'];
		header("Location: dashboard.php"); 
	}else{
		header("Location: index.php?pesan==gagal");
	}
}

	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else{ 
			if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
			}else{
				if($_GET['pesan'] == "belum_login"){
				echo "Anda harus login untuk mengakses halaman ";
				}else{
					if ($_GET['pesan'] == "Update") {
						echo "Data berhasil di Tambah";
					}
				}
			}
		}
	}
	
?>

<br><br>
belum punya akun? silahkan <a href ="register.php" class="badge badge-primary"> buat akun.</a>
</form>
</div>
</center>
</div>
</div>
</div>