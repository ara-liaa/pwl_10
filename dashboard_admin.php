<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}
?>

<h2>Selamat datang Administrator, <?= $_SESSION['username']; ?>!</h2>

<h3>Data Member</h3>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php
$data = mysqli_query($conn, "SELECT * FROM users");
while ($row = mysqli_fetch_assoc($data)) {
    echo "<tr>
            <td>{$row['id_user']}</td>
            <td>{$row['username']}</td>
            <td>{$row['role']}</td>
            <td>
                <a href='edit.php?id={$row['id_user']}'>Edit</a> |
                <a href='hapus.php?id={$row['id_user']}' onclick=\"return confirm('Yakin mau hapus?')\">Hapus</a>
            </td>
          </tr>";
}
?>
</table>

<h3>Tambah User</h3>
<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Role:
    <select name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br><br>
    <button name="tambah">Tambah</button>
</form>

<?php
if (isset($_POST['tambah'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $r = $_POST['role'];

    mysqli_query($conn, "INSERT INTO users (username, password, role)
                         VALUES ('$u','$p','$r')");

    header("Refresh:0");
}
?>

<br>
<a href="logout.php">Logout</a>