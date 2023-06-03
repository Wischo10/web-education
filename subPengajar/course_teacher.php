<?php
session_start();
$role = $_SESSION["role"] == 'pengajar';
$id = $_SESSION['id_users'];
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
include '../php/functions.php';
$course = query("SELECT * FROM course WHERE id_course");
$doc = query("SELECT * FROM dokumen WHERE id_doc");

if(isset($_POST['upload_link'])){

	
	if(InsertDoc($_POST)>0){
		echo "
		<script>
		alert('Upload Video Berhasil!')
		</script>";
		header("Refresh:0");
	} else {
		echo "
		<script>
		alert('Upload Video Gagal!!!')
		</script>";
	}
}
if(isset($_POST['delete_link'])){

	
	if(deleteDoc($_POST)>0){
		echo "
		<script>
		alert('Upload Video Berhasil!')
		</script>";
		header("Refresh:0");
	} else {
		echo "
		<script>
		alert('Upload Video Gagal!!!')
		</script>";
	}
}

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
		<li><a href="upload.php"><img src="../asset/images/icon/upload.svg" class="icon">Upload</a></li>
		<li><a href="profile_pengajar.php"><img src="../asset/images/icon/user.svg" class="icon">Profile</a></li>
		<li><a href="../php/logout.php"><img src="../asset/images/icon/power.svg" alt="">Keluar</a></li>
        </ul>
    </div>
</header>

<!-- Videos on HTML -->
<section class="pro">
		
<?php $i = 1; ?>
		<?php foreach($course as $row) :?>
		<div class="title2" id="">
			<span class="tag2"><?= $row['judul_course'];?></span>
			<div class="diffSection" id="course_section">
				<div class="totalcard">
					<div class="card">
						<div id="detail">
						<form id="upload_link" class="input-group" method="post">
							<input type="hidden" class="input-field" value="<?= $row['id_course'];?>" name="id_course" id="id_course" >
							<input type="link" class="input-field" placeholder="Link" name="link" id="link">
							<button type="submit" id="btnSubmit" class="submit-btn" name="upload_link">Add YouTube Video Link to Course </button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php foreach($doc as $col) :?>
			<?php if  ($row['id_course']==$col['id_course']){?>
			<br>
			<center>
				<div class="ccardbox2">
					<div class="fpart2">
						<h2><?=  $col['judul_doc']; ?></h2>
						<iframe src="<?=  $col['link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<form id="delete_video" class="input-group" method="post">
						<input type="hidden" class="input-field" value="<?= $col['id_doc'];?>" name="id_doc" id="id_doc" >
						<br>
						<button type="submit" id="btnSubmit" class="submit-btn" name="delete_link">Delete Video </button>
						<br>
					</form>
					</div>
				</div>
			</center>
			<?php } ?>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<br><br>

		<?php $i++; ?>

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