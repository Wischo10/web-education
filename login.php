<?php 
include '../clever/php/functions.php';

if(isset($_POST["daftar"])){

	if(regis($_POST)>0){
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

if(isset($_POST["masuk"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	

	if(mysqli_num_rows($result) === 1){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id_users'] = $row['id_user'];
		$role = $row['role'];
		if ($password === $row['password']) {
			$_SESSION['login'] = true;
			$_SESSION['role'] = $role;
			if ($role == 'pengajar') {
				header('Location: subPengajar/home_teacher.php');
			}
			elseif ($role == 'pelajar') {
				header('Location: subPelajar/home.php');
			} else {
				header('Location: admin/home.php');
			}
			exit;
		}
	}

	$error = false;
}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/clever.png">
	<title>E-Clever</title>
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
		<div class="form-box">
			<div class="close" onclick="window.location.href='index.html'"><img src="../asset/images/icon/x-square.svg" alt=""></div>
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" id="log" onclick="login()">Masuk</button>
				<button type="button" class="toggle-btn" id="reg" onclick="register()">Daftar</button>
			</div>
			<div class="social-icons">
				<img src="asset/images/icon/fb2.png">
				<img src="asset/images/icon/insta2.png">
				<img src="asset/images/icon/tt2.png">
			</div>

			<?php if(isset($error)) : ?>
				<p style="color: red; font-style: italic; margin-left:20%; padding-bottom:10%;">username atau password salah</p>
			<?php endif; ?>
			
			<!-- Login Form -->
			<form action="" id="login" class="input-group" method="post">
				<div class="inp">
					<img src="asset/images/icon/user.png"><input type="text" class="input-field" placeholder="Username atau Email" style="width: 88%; border:none;" name="username" required="required">
				</div>
				<div class="inp">
					<img src="asset/images/icon/password.png"><input type="password" class="input-field" placeholder="Password" style="width: 88%; border: none;" name="password" required="required">
				</div>
				<input type="checkbox" class="check-box">Ingat Password
				<button type="submit" class="submit-btn" name="masuk">Masuk</button>
			</form>
			
			<!-- Registration Form -->
			<form action="" id="register" class="input-group" method="post">
				<input type="text" class="input-field" placeholder="Nama Lengkap" name="name" required="required">
				<input type="text" class="input-field" placeholder="username" name="username" required="required">
				<input type="email" class="input-field" placeholder="Alamat Email" name="email" required="required">
				<input type="password" class="input-field" placeholder="Buat Password" name="password" required="required">
				<input type="password" class="input-field" placeholder="Konfirmasi Password" name="password2" required="required">
				<input type="radio" name="role" value="pelajar"><label> Pelajar</label><input type="radio" name="role" value="pengajar"><label> Pengajar</label>
				<button type="submit" id="btnSubmit" class="submit-btn reg-btn" name="daftar">Daftar</button>
			</form>
		</div>
		<script type="text/javascript" src="js/script.js"></script>
</body>
</html>