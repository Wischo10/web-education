<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
$role = $_SESSION["role"] == 'admin';
require '../php/functions.php';

$id = $_GET["id"];

if( deleteCor($id) > 0){
    echo "
    <script>
    alert('Delete Berhasil!')
    document.location.href = 'Users.php'
    </script>";
} else {
    echo "
    <script>
    alert('Delete Gagal!!!')
    document.location.href = 'Users.php'
    </script>";
}

?>