<?php
require '../php/functions.php';
$users = query("SELECT * FROM users");
if(isset($_POST["submit"])){

	if(InsertUsers($_POST)>0){
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

}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="../asset/images/icon/clever.png">
	<title>Courses on E-Clever</title>
	<link rel="stylesheet" href="../admin/adminstyle.css">
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
            <li><a href="mycourse.html"><img src="../asset/images/icon/archive.svg" class="icon">Kursus</a></li>
			<li><a href="users.php"><img src="../asset/images/icon/user.svg" class="icon">Daftar Pengguna</a></li>
            <li><a href="profile.html"><img src="../asset/images/icon/user.svg" class="icon">Profile</a></li>
            <li><a onclick="logout()"><img src="../asset/images/icon/power.svg" alt="">Keluar</a></li>
        </ul>
    </div>
</header>
	
<section class="daf-users">
	<div class="tab-users" id="">
		<h1>Daftar Pengguna</h1><br>

		<table border="1" cellpadding="10" cellspacing="0">

			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Role</th>
				<th>Aksi</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($users as $row) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["username"]; ?></td>
				<td><?= $row["email"]; ?></td>
				<td><?= $row["role"]; ?></td>
				<td>
					<a href="update.php?id=<?= $row["id"]; ?>">ubah</a><br>
					<a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
		</table>
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