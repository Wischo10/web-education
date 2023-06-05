<?php
include '../php/functions.php';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$role = $_SESSION["role"] == 'pengajar';

$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $role = $row['role'];
    $nama = $row['nama'];
    $email = $row['email'];
    $id = $row['id_users'];

    if (isset($_POST['updateProf'])) {

        $newUsername = $_POST['username'];
        $newRole = $_POST['role'];
        $newNama = $_POST['nama'];
        $newEmail = $_POST['email'];
        $id = $_POST['id_users'];

        $query = "UPDATE users SET
                    nama = '$newNama',
                    username = '$newUsername',
                    email = '$newEmail',
                    role = '$newRole'
                    WHERE id_users = $id";


        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['username'] = $newUsername;
            $_SESSION['nama'] = $newNama;
            $_SESSION['email'] = $newEmail;
            echo "<script>alert('Profile updated successfully.');</script>";
        } else {
            echo "<script>alert('Error updating profile.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="png" href="../asset/images/icon/clever.png">
    <title>Courses on E-Clever</title>
    <link rel="stylesheet" type="text/css" href="../admin/adminstyle.css">
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
                    <center>
                        <div class="card-title">
                            <?php echo $_SESSION['username']; ?>
                        </div>
                        <div id="detail">
                            <form name="update_profil" method="POST" action="">
                                <input type="hidden" class="input-field-up" value="<?= $id; ?>" name="id_users" id="id_course">
                                <br>
                                <input type="text" value="<?= $_SESSION['username']; ?>" name="username" id="username">
                                <br>
                                <input type="text" value="<?= $nama; ?>" name="nama" id="nama">
                                <br>
                                <input type="text" value="<?= $email; ?>" name="email" id="email">
                                <br>
                                <input type="hidden" value="<?= $role; ?>" name="role" id="role">
                                <br>
								<a href="profile.php"><button type="submit" name="updateProf" class="btn-course">Update Done</button></a>
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
                <p class="rights-text">Copyright ©
                    2023 Created By Team Eleven Pemrograman Web, Class C All Rights Reserved.</p>
                <br>
                <p><img src="../asset/images/icon/location.png">Universitas Mataram</p><br>
                <p><img src="../asset/images/icon/phone.png"> +62-1234-567-890<br><img src="../asset/images/icon/mail.png">&nbsp; teameleven@unram.ac.id</p>
            </div>
        </div>
    </footer>

</body>

</html>
