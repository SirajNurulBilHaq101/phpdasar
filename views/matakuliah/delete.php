<?php
require '../../config/database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $id = mysqli_real_escape_string($conn, $id);
    $query = "DELETE FROM tbl_matakuliah WHERE id_mk = '$id'";
    mysqli_query($conn, $query);
}

header("Location: index.php");
exit;
