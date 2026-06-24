<?php
require '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE id_mhs = '$id'");
$mhs = mysqli_fetch_assoc($query);

if (!$mhs) {
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
            <h3 class="mb-1 fw-bold"><?= htmlspecialchars($mhs['nama_mhs']) ?></h3>
            <p class="text-muted mb-2"><?= htmlspecialchars($mhs['nim_mhs']) ?></p>
            
            <div class="mt-2">
                <?php if(strtolower($mhs['status_mhs']) == 'aktif'): ?>
                    <span class="badge bg-success px-3 py-2 fs-6">Aktif</span>
                <?php elseif(strtolower($mhs['status_mhs']) == 'lulus'): ?>
                    <span class="badge bg-primary px-3 py-2 fs-6">Lulus</span>
                <?php else: ?>
                    <span class="badge bg-secondary px-3 py-2 fs-6"><?= htmlspecialchars($mhs['status_mhs']) ?></span>
                <?php endif; ?>
            </div>
        </div>

        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                <span class="text-muted">Nomor Induk Mahasiswa</span>
                <span class="fw-medium"><?= htmlspecialchars($mhs['nim_mhs']) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                <span class="text-muted">Nama Lengkap</span>
                <span class="fw-medium"><?= htmlspecialchars($mhs['nama_mhs']) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                <span class="text-muted">Jurusan Program Studi</span>
                <span class="fw-medium"><?= htmlspecialchars($mhs['jurusan_mhs']) ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3 border-bottom-0">
                <span class="text-muted">Tahun Angkatan</span>
                <span class="fw-medium"><?= htmlspecialchars($mhs['angkatan_mhs']) ?></span>
            </li>
        </ul>
        
        <div class="d-flex gap-2">
            <a href="edit.php?id=<?= $mhs['id_mhs'] ?>" class="btn btn-warning flex-grow-1 fw-medium">
                <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profil
            </a>
            <a href="delete.php?id=<?= $mhs['id_mhs'] ?>" class="btn btn-danger flex-grow-1 fw-medium" onclick="return confirm('Apakah Anda yakin ingin menghapus data profil ini?')">
                <i class="fa-solid fa-trash me-1"></i> Hapus Profil
            </a>
        </div>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
