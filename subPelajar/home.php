<?php
session_start();
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
include '../php/functions.php';
$role = $_SESSION["role"];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="../asset/images/icon/clever.png">
	<title>Courses on E-Clever</title>
	<script src="https://unpkg.com/feather-icons"></script>
	<link rel="stylesheet" type="text/css" href="pelajarstyle.css">
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
				<li><a href="home.php"><img src="../asset/images/icon/home.svg" class="icon">Beranda</a></li>
				<li><a href="mycourse.html"><img src="../asset/images/icon/archive.svg" class="icon">Kursus Saya</a></li>
				<li><a href="profile.html"><img src="../asset/images/icon/user.svg" class="icon">Profile</a></li>
				<li><a onclick="logout()"><img src="../asset/images/icon/power.svg" alt="">Keluar</a></li>
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
<!-- Course -->
<div class="diffSection" id="course_section">
	<div class="totalcard">
		<div class="card">
			<center><img src="../asset/images/course/thumb-1.png"></center>
			<center><div class="card-title">Hypertext Markup Language (HTML)</div>
			<div id="detail">
				<p>“ HTML adalah kerangka struktural dari proses desain situs web. Dan proses desain website HTML menggunakan tag HTML yang sering digunakan dalam desain website antara lain div, p, h1, img, a, nav, ol, ul dan masih banyak lagi.“</p>
				<div class="duty"></div>
				<a href="mycourse.html" target="_blank"><button class="btn-course">Join Course</button></a>
			</div>
			</center>
		</div>
		<div class="card">
			<center><img src="../asset/images/course/thumb-2.png"></center>
			<center><div class="card-title">Cascading Style Sheet (CSS)</div>
			<div id="detail">
				<p>“ Cascading Style Sheet merupakan bahasa presentasi digunakan untuk mengatur tampilan visual halaman web. CSS memungkinkan pengembang web untuk membuat halaman web yang tampak cantik dan menarik, mengontrol bagaimana elemen seperti teks, gambar, dan formulir ditampilkan. “</p>
				<div class="duty"></div>
				<a href="mycourse.html" target="_blank"><button class="btn-course">Join Course</button></a>
			</div>
			</center>
		</div>
		<div class="card">
			<center><img src="../asset/images/course/thumb-3.png"></center>
			<center><div class="card-title">Javascript (JS)</div>
			<div id="detail">
				<p>“ JavaScript memungkinkan pengembang web untuk menambahkan interaksi, animasi, dan efek visual ke halaman web. JavaScript juga memungkinkan pengembang memvalidasi input formulir, membuat pop-up, dan menambahkan konten secara real-time tanpa memuat ulang halaman. “</p>
				<div class="duty"></div>
				<a href="login.html" target="_blank"><button class="btn-course">Join Course</button></a>
			</div>
			</center>
		</div>
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