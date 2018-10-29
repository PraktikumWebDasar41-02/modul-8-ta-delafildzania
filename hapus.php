<?php
$konek=mysqli_connect('localhost', 'root', '', 'modul8');
$user=$_GET['id'];
mysqli_query($konek, "DELETE FROM `jurnal` WHERE `jurnal`.`username` = '$user'") or die(mysql_error());
header("Location: dashboard.php");
?>