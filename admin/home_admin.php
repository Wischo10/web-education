<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
$role = $_SESSION["role"] == 'admin';
include '../php/functions.php';
$course = query("SELECT * FROM course");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="../asset/images/icon/clever.png">
	<title>Courses on E-Clever</title>
	<script src="https://unpkg.com/feather-icons"></script>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
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
			<li><a href="home_admin.php"><img src="../asset/images/icon/home.svg" class="icon">Beranda</a></li>
		<li><a href="course_admin.php"><img src="../asset/images/icon/archive.svg" class="icon">Kursus</a></li>
			<li><a href="Users.php"><img src="../asset/images/icon/user.svg" class="icon">Daftar Pengguna</a></li>
            <li><a href="list_course.php"><img src="../asset/images/icon/book.svg" class="icon">Daftar Kursus</a></li>
            <li><a href="profile_admin.php"><img src="../asset/images/icon/user.svg" class="icon">Data Diri</a></li>
            <li><a href="../php/logout.php"><img src="../asset/images/icon/power.svg" alt="">Keluar</a></li>
			</ul>
		</div>
	</header>

<!-- MAIN Heading of Page -->
<div class="title">
		<span>Kursus<br>Di E-Clever</span>
		<div class="shortdesc">
			<p>Pelajari bahasa pemrograman dan konsepnya untuk mempersiapkan masa depanmu.</p>
		</div>
	</div>
<div class="diffSection" id="course_section">
		<div class="totalcard">
		<?php $i = 1; ?>
			<?php foreach($course as $row) : ?>
			<div class="card">
				<center>
				<img src="../temp/<?= $row["gambar"]; ?>">
				</center>
				<center><div class="card-title"><?= $row["judul_course"]; ?></div>
				<div id="detail">
					<p><?= $row["deskripsi"]; ?></p>
					<div class="duty"></div>
					<a href="course_admin.php" target="_blank"><button class="btn-course">Join Course</button></a>
				</div>
				</center>
		
			</div>
			<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>


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