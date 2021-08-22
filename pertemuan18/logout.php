<?php 

session_start();

// menghaspus sesseion
$_SESSION = [];
session_unset();
session_destroy();

// menghapus cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

// redirect
header("Location: login.php");

 ?>