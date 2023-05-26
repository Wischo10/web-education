<?php
require '../php/functions.php';

$id = $_GET["id"];

if( delete($id) > 0){
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