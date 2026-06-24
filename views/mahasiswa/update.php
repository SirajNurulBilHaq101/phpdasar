<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $angkatan = (int)$_POST['angkatan'];

    if ($angkatan < 1901 || $angkatan > 2155) {
        die("Error: Tahun angkatan harus antara 1901 dan 2155.");
    }

    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE tbl_mahasiswa SET 
                nim_mhs = '$nim', 
                nama_mhs = '$nama', 
                jurusan_mhs = '$jurusan', 
                angkatan_mhs = '$angkatan', 
                status_mhs = '$status' 
              WHERE id = '$id'";

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
