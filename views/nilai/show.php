<?php
require '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $id);
$query = "SELECT n.id_nilai, m.nama_mhs, m.nim_mhs, m.jurusan_mhs, d.nama_dsn, d.nidn_dsn, mk.nama_mk, mk.kode_mk 
          FROM tbl_nilai n 
          JOIN tbl_mahasiswa m ON n.id_mhs = m.id_mhs 
          JOIN tbl_dosen d ON n.id_dsn = d.id_dsn 
          JOIN tbl_matakuliah mk ON n.id_mk = mk.id_mk 
          WHERE n.id_nilai = '$id'";
$result = mysqli_query($conn, $query);
$nilai = mysqli_fetch_assoc($result);

if (!$nilai) {
    header("Location: index.php");
    exit;
}

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Detail Nilai</h1>
        <p class="text-muted">Informasi lengkap nilai mahasiswa</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
    <div class="card-body p-5">
        <div class="text-center mb-4">
            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow" style="width: 100px; height: 100px;">
                <i class="fa-solid fa-graduation-cap fs-1"></i>
            </div>
            <h3 class="mb-1 fw-bold"><?= htmlspecialchars($nilai['nama_mhs']) ?></h3>
            <p class="text-muted mb-2"><?= htmlspecialchars($nilai['nim_mhs']) ?></p>
        </div>

        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                <span class="text-muted">Mahasiswa</span>
                <span class="fw-medium text-end">
                    <?= htmlspecialchars($nilai['nama_mhs']) ?><br>
                    <small class="text-muted"><?= htmlspecialchars($nilai['nim_mhs']) ?> - <?= htmlspecialchars($nilai['jurusan_mhs']) ?></small>
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                <span class="text-muted">Mata Kuliah</span>
                <span class="fw-medium text-end">
                    <?= htmlspecialchars($nilai['nama_mk']) ?><br>
                    <small class="text-muted">Kode: <?= htmlspecialchars($nilai['kode_mk']) ?></small>
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-3 border-bottom-0">
                <span class="text-muted">Dosen Pengampu</span>
                <span class="fw-medium text-end">
                    <?= htmlspecialchars($nilai['nama_dsn']) ?><br>
                    <small class="text-muted">NIDN: <?= htmlspecialchars($nilai['nidn_dsn']) ?></small>
                </span>
            </li>
        </ul>
        
        <div class="d-flex gap-2">
            <a href="edit.php?id=<?= $nilai['id_nilai'] ?>" class="btn btn-warning flex-grow-1 fw-medium">
                <i class="fa-solid fa-pen-to-square me-1"></i> Edit Data
            </a>
            <a href="delete.php?id=<?= $nilai['id_nilai'] ?>" class="btn btn-danger flex-grow-1 fw-medium" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                <i class="fa-solid fa-trash me-1"></i> Hapus Data
            </a>
        </div>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
