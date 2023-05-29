<?php 
session_start();
include '../php/functions.php';
session_unset();
session_destroy();
header('location: ../index.html');
?>