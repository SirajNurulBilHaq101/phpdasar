<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);


    $query = "INSERT INTO tbl_matakuliah (nama_mk, kode_mk) 
              VALUES ('$nama', '$kode')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    header("Location: create.php");
    exit;
}
