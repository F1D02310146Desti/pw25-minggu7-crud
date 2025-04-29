<?php
include 'db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM crud_146 WHERE id=$id");

header("Location: index.php");
?>