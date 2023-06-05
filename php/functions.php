<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'e_clever';
$conn = mysqli_connect($host, $user, $pass, $dbname) or die("gagal");
mysqli_select_db($conn, $dbname);


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// Utuk Users
function InsertUsers($data) {
    global $conn;
    $id = ($data['id_users']); 
    $nama = ($data['nama']);
    $username = ($data['username']);
    $email = ($data['email']);
    $role = ($data['role']);

    $query = "INSERT INTO dokumen VALUES
                ('','$nama','$username', '$email','$role') ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteUsers($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id_users = '$id'");
    return mysqli_affected_rows($conn);
}


// Untuk Kursus
function InsertCourse($data) {
    global $conn;
    $judul = htmlspecialchars($data['judul_course']);
    $deskrip = htmlspecialchars($data['deskripsi']);


    $gambar = upload();
	if( !$gambar ) {
		return false;
	}

    $query = "INSERT INTO course VALUES
                ('','$judul', '$deskrip', '$gambar') ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteCor($id){
    global $conn;
    $query = "DELETE FROM course WHERE id_course = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 100000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../temp/' . $namaFileBaru);

	return $namaFileBaru;
}

function InsertDoc($data) {
    global $conn;
    $idcourse = ($data['id_course']); 
    $judul = ($data['judul_doc']);
    $link = ($data['link']);
	$convertedUrl = str_replace("watch?v=","embed/", $link);

    $query = "INSERT INTO dokumen VALUES
                ('','$idcourse','$judul', '$convertedUrl') ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteDoc($id){
    global $conn;
    $iddoc = ($id['id_doc']);
    $query = "DELETE FROM dokumen WHERE id_doc = '$iddoc'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



function update($data){
    global $conn;
    $id = $data(["id_users"]);
    $name = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $role = htmlspecialchars($data["role"]);

    $query = "UPDATE users SET
                nama = '$name',
                username = '$username',
                email = '$email',
                role = '$role'
                WHERE id = $id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// Untuk Daftar
function regis($data){
    global $conn;

    $name = stripslashes($data["name"]);
    $username = stripslashes($data["username"]);
    $email = stripslashes($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = htmlspecialchars($data["role"]);

    $result = mysqli_query($conn, "SELECT username, email FROM users WHERE username = '$username' or email = '$email'");

    if( mysqli_fetch_assoc($result) ){
        echo "
		<script>
		alert('username atau email sudah terdaftar!')
		</script>";
        return false;
    }

    if( $password !== $password2){
		echo "
		<script>
		alert('Konfirmasi Password Salah')
		</script>";
        return false;
	}

    $query = "INSERT INTO users VALUES
    ('','$name', '$username', '$email', '$password', '$role' ) ";

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

?>