<?php
session_start();
include '../php/functions.php';
$id_users = $_SESSION['id_users'];
$username = $_SESSION['username'];
$role = $_SESSION["role"] == 'pengajar';
$id_user = $_SESSION['id_users'];
$name = $_SESSION['nama'];

$users = query("SELECT * FROM users");
$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $role = $row['role'];
    $nama = $row['nama'];
    $email = $row['email'];

}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="../asset/images/icon/clever.png">
	<title>Courses on E-Clever</title>
	<link rel="stylesheet" type="text/css" href="../subPengajar/pengajar.css">
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
		<li><a href="home_teacher.php"><img src="../asset/images/icon/home.svg" class="icon">Beranda</a></li>
		<li><a href="course_teacher.php"><img src="../asset/images/icon/archive.svg" class="icon">Kursus</a></li>
		<li><a href="upload.php"><img src="../asset/images/icon/upload.svg" class="icon">Upload</a></li>
		<li><a href="profile_pengajar.php"><img src="../asset/images/icon/user.svg" class="icon">Profile</a></li>
		<li><a href="../php/logout.php"><img src="../asset/images/icon/power.svg" alt="">Keluar</a></li>
        </ul>
    </div>
</header>
	
<section class="pro">
	<div class="diffSection" id="course_section">
		<div class="totalcard">
			<div class="card">
				<center><img src="../asset/images/profile/pic.jpg"></center>
				<center><div class="card-title"><?php echo $_SESSION['username'];?></div>
				<div id="detail">
				<div class="duty">Nama : <?php echo $nama; ?></div>
					<br>
					<div class="duty">Email : <?php echo $email; ?></div>
					<br>
					<div class="duty">Role : <?php echo $role; ?></div>
					<a href="update_Profile_pengajar.php"><button type="submit" class="btn-course">update profile</button></a>
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