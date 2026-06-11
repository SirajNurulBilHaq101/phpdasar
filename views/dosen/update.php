<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nidn = mysqli_real_escape_string($conn, $_POST['nidn']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $keahlian = mysqli_real_escape_string($conn, $_POST['keahlian']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE dosen SET 
                nidn = '$nidn', 
                nama = '$nama', 
                keahlian = '$keahlian', 
                status = '$status' 
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
