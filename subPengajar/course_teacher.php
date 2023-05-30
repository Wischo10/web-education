<?php
session_start();
include '../php/functions.php';
$course = query("SELECT * FROM course");
$doc = query("SELECT * FROM dokumen");
$role = $_SESSION["role"] == 'pengajar';
$id = $_SESSION['id_users'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="../asset/images/icon/clever.png">
	<title>Courses on E-Clever</title>
	<link rel="stylesheet" type="text/css" href="../subPengajar/pengajar.css">

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
		<li><a href="profile_pengajar.php"><img src="../asset/images/icon/user.svg" class="icon">Profile</a></li>
		<li><a onclick="logout()"><img src="../asset/images/icon/power.svg" alt="">Keluar</a></li>
        </ul>
    </div>
</header>

<!-- Videos on HTML -->
<?php $i = 1; ?>
<?php foreach($doc as $row) : ?>
<div class="title2" id="">
		<span><?= $row['judul']; ?></span>
	</div>
	<center>
		<div class="ccardbox2">
			<div class="dcard2">
				<div class="fpart2"><img src="<?=  $row['gambar']; ?>">
					<iframe src="<?=  $row['link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>
<br><br>
<?php $i++; ?>
<?php endforeach; ?>


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
<script type="text/javascript" src="../js/script.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            var videoId = "<?php echo $doc['link']; ?>";
            var materiId = "<?php echo $doc['id_doc']; ?>";
            var playerId = "player-" + materiId;
            playVideo(playerId, videoId);
        });
    </script>
</body>
</html>