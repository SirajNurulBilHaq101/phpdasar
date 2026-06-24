<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);
   

    $query = "UPDATE tbl_matakuliah SET 
                nama_mk = '$nama', 
                kode_mk = '$kode'
              WHERE id_mk = '$id'";

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
