<?php
require '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM matakuliah WHERE id = '$id'");
$mk = mysqli_fetch_assoc($query);

if (!$mk) {
    header("Location: index.php");
    exit;
}

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Detail Mahasiswa</h1>
        <p class="text-muted">Informasi lengkap profil mahasiswa</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0 mx-auto" style="max-width: 500px;">
    <div class="card-body p-5">
        <div class="text-center mb-4">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow" style="width: 100px; height: 100px;">
                <i class="fa-solid fa-user fs-1"></i>
            </div>
            <h3 class="mb-1 fw-bold"><?= htmlspecialchars($mk['nama']) ?></h3>
            <p class="text-muted mb-2"><?= htmlspecialchars($mk['kode']) ?></p>
            
        </div>

        
        <div class="d-flex gap-2">
            <a href="edit.php?id=<?= $mk['id'] ?>" class="btn btn-warning flex-grow-1 fw-medium">
                <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profil
            </a>
            <a href="delete.php?id=<?= $mk['id'] ?>" class="btn btn-danger flex-grow-1 fw-medium" onclick="return confirm('Apakah Anda yakin ingin menghapus data profil ini?')">
                <i class="fa-solid fa-trash me-1"></i> Hapus Profil
            </a>
        </div>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
