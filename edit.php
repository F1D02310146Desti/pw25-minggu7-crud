<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM crud_146 WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "UPDATE crud_146 SET 
        nama='$nama', 
        email='$email', 
        alamat='$alamat', 
        no_hp='$no_hp', 
        jurusan='$jurusan'
        WHERE id=$id");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form action="" method="POST" class="form-input">
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
        <input type="email" name="email" value="<?= $data['email'] ?>" required><br>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br>
        <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required><br>
        <input type="text" name="jurusan" value="<?= $data['jurusan'] ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</div>
</body>
</html>