<?php
session_start();
include '../php/functions.php';
$users = query('SELECT * FROM course');

if(isset($_POST['upload'])){

	if(regis($_POST)>0){
		echo "
		<script>
		alert('Berhasil!')
		document.location.href = 'login.php'
		</script>";
	} else {
		echo "
		<script>
		alert('Gagal!!!')
		document.location.href = 'login.php'
		</script>";
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="../asset/images/icon/clever.png">
	<title>Courses on E-Clever</title>
	<link rel="stylesheet" type="text/css" href="pengajar.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	
<!-- NAVIGATION -->
<header>
    <div class="nav" id="nav">
        <div id="learned-logo">
        <a href="#"><img src="../asset/images/icon/clever.png" style="width: 120px;"></a></div>
        <div class="switch-tab" id="switch-tab" onclick="switchTAB()"><img src="../asset/images/icon/menu.svg"></div>
        <ul id="list-switch">
			<li><a href="home.html"><img src="../asset/images/icon/home.svg" class="icon">Beranda</a></li>
			<li><a href="course_teacher.html"><img src="../asset/images/icon/archive.svg" class="icon">Kursus</a></li>
			<li><a href="profile_pengajar.html"><img src="../asset/images/icon/user.svg" class="icon">Profile</a></li>
            <li><a onclick="logout()"><img src="../asset/images/icon/power.svg" alt="">Keluar</a></li>
        </ul>
    </div>
</header>
	
<section class="pro">
	<div class="diffSection" id="course_section">
		<div class="totalcard">
			<div class="card">
				<div id="detail">
                <form id="register" class="input-group">
                <input type="hidden" name="id" value="<?= $users["id"] ?>">
				<input type="text" class="input-field" placeholder="Judul kursus" name="judul_course" id="judul_course">
                <input type="text" class="input-field" placeholder="Deskripsi" name="deskripsi" id="deskripsi">>
				<input type="file" class="input-field" placeholder="Gambar" name="gambar" id="gambar">
				<button type="submit" id="btnSubmit" class="submit-btn reg-btn" name="upload">Upload</button>
			    </form>
				</div>
				</center>
			</div>
		</div>
	 </div>
</section>

<!-- FOOTER -->
<footer>
	<div class="footer-container">
		<div class="left-col">
			<img src="../asset/images/icon/clever.png" style="width: 200px;">
			<div class="logo"></div>
			<div class="social-media">
				<a href="#"><img src="../asset/images/icon\fb.png"></a>
				<a href="#"><img src="../asset/images/icon\insta.png"></a>
				<a href="#"><img src="../asset/images/icon\tt.png"></a>
				<a href="#"><img src="../asset/images/icon\ytube.png"></a>
				<a href="#"><img src="../asset/images/icon\linkedin.png"></a>
			</div><br><br>
			<p class="rights-text">Copyright © 2023 Created By Team Eleven Pemrograman Web, Class C All Rights Reserved.</p>
			<br><p><img src="../asset/images/icon/location.png">Universitas Mataram</p><br>
			<p><img src="../asset/images/icon/phone.png"> +62-1234-567-890<br><img src="../asset/images/icon/mail.png">&nbsp; teameleven@unram.ac.id</p>
		</div>
		<div class="right-col">
			<h1 style="color: #fff">Untuk kabar Baru</h1>
			<div class="border"></div><br>
			<p>Masukan email untuk mendapatkan kabar baru dan kabar terupdate.</p>
			<form class="newsletter-form">
				<input class="txtb" type="email" placeholder="Masukkan Email">
				<input class="btn" type="submit" value="Submit">
			</form>
		</div>
	</div>
</footer>

</body>
</html>