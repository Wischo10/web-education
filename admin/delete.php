<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
$role = $_SESSION["role"] == 'admin';
require '../php/functions.php';

$id = $_GET["id"];

if( deleteUsers($id) > 0){
    echo "
    <script>
    alert('Daftar Berhasil!')
    document.location.href = 'login.php'
    </script>";
} else {
    echo "
    <script>
    alert('Daftar Gagal!!!')
    document.location.href = 'login.php'
    </script>";
}

?>