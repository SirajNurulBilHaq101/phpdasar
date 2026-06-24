<?php
require '../../config/database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $id = mysqli_real_escape_string($conn, $id);
    $query = "DELETE FROM tbl_mahasiswa WHERE id_mhs = '$id'";
    mysqli_query($conn, $query);
}

header("Location: index.php");
exit;
