<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nidn = mysqli_real_escape_string($conn, $_POST['nidn']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $keahlian = mysqli_real_escape_string($conn, $_POST['keahlian']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "INSERT INTO tbl_dosen (nidn_dsn, nama_dsn, keahlian_dsn, status_dsn) 
              VALUES ('$nidn', '$nama', '$keahlian', '$status')";

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
