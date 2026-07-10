<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = ($_POST['password']);

$query = "INSERT INTO users (username, password, role) 
          VALUES ('$username', '$password', 'user')";

if (mysqli_query($conn, $query)) {
    echo "Registrasi berhasil! <a href='index.php'>Login</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>