<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = ($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM users 
                             WHERE username='$username' 
                             AND password='$password'");

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    header("Location: home.php");
} else {
    echo "Login gagal! <a href='index.php'>Coba lagi</a>";
}
?>