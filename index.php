<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO crud_146 (nama, email, alamat, no_hp, jurusan) 
              VALUES ('$nama', '$email', '$alamat', '$no_hp', '$jurusan')";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Mahasiswa - 146</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container">
    <h2>Data Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM crud_146");
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['alamat']."</td>
                    <td>".$row['no_hp']."</td>
                    <td>".$row['jurusan']."</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."' class='edit-btn'>Edit</a>
                        <a href='javascript:void(0);' onclick='confirmDelete(".$row['id'].")' class='delete-btn'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <h2>Tambah Data Baru</h2>
    <form action="" method="POST" class="form-input">
        <input type="text" name="nama" placeholder="Nama" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <textarea name="alamat" placeholder="Alamat" required></textarea><br>
        <input type="text" name="no_hp" placeholder="No HP" required><br>
        <input type="text" name="jurusan" placeholder="Jurusan" required><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</div>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Apakah kamu yakin?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "delete.php?id=" + id;
        }
    })
}
</script>
</body>
</html>