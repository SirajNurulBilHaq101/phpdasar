<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_nilai = (int)$_POST['id_nilai'];
    $id_mhs = (int)$_POST['id_mhs'];
    $id_mk = (int)$_POST['id_mk'];
    $id_dsn = (int)$_POST['id_dsn'];

    $query = "UPDATE tbl_nilai SET 
                id_mhs = '$id_mhs', 
                id_mk = '$id_mk', 
                id_dsn = '$id_dsn' 
              WHERE id_nilai = '$id_nilai'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
    exit;
}
