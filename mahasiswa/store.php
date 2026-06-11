<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $angkatan = (int)$_POST['angkatan'];
    if ($angkatan < 1901 || $angkatan > 2155) {
        die("Error: Tahun angkatan harus antara 1901 dan 2155.");
    }
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "INSERT INTO mahasiswa (nim, nama, jurusan, angkatan, status) 
              VALUES ('$nim', '$nama', '$jurusan', '$angkatan', '$status')";

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
