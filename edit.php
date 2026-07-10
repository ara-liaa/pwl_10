<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id'");
$user = mysqli_fetch_assoc($data);
?>

<h2>Edit User</h2>

<form method="POST">
    Username: <input type="text" value="<?= $user['username']; ?>" disabled><br><br>

    Password Baru: <input type="password" name="password"><br><br>

    Role:
    <select name="role">
        <option value="admin" <?= $user['role']=='admin'?'selected':''; ?>>Admin</option>
        <option value="user" <?= $user['role']=='user'?'selected':''; ?>>User</option>
    </select><br><br>

    <button name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {

    $role = $_POST['role'];

    if (!empty($_POST['password'])) {
        $pass = $_POST['password'];
        mysqli_query($conn, "UPDATE users SET password='$pass', role='$role' WHERE id_user='$id'");
    } else {
        mysqli_query($conn, "UPDATE users SET role='$role' WHERE id_user='$id'");
    }

    header("Location: home.php");
}
?>