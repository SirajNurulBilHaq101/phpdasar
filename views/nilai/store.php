<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_mhs = (int)$_POST['id_mhs'];
    $id_mk = (int)$_POST['id_mk'];
    $id_dsn = (int)$_POST['id_dsn'];

    $query = "INSERT INTO tbl_nilai (id_mhs, id_mk, id_dsn) 
              VALUES ('$id_mhs', '$id_mk', '$id_dsn')";

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
