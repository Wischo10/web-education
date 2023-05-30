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

function InsertCourse($data) {
    global $conn;
    $judul = ($data['judul_course']);
    $deskrip = ($data['deskripsi']);
    $gambar = ($data['gambar']);

    $query = "INSERT INTO course VALUES
                ('','$judul', '$deskrip', '$gambar') ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM users WHERE id_users = $id");
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