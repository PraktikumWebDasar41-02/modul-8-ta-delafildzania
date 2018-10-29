<?php

session_start();

$_SESSION['username'];
unset($_SESSION['username']);
$_SESSION['password'];
unset($_SESSION['password']);
session_unset();
session_destroy();
header('Location: index.php');
?>


