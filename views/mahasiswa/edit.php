<?php
require '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = '$id'");
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
        <h1 class="h2">Edit Mahasiswa</h1>
        <p class="text-muted">Perbarui data mahasiswa</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
            
            <div class="mb-3">
                <label for="nim" class="form-label fw-medium">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required value="<?= htmlspecialchars($mhs['nim']) ?>">
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= htmlspecialchars($mhs['nama']) ?>">
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label fw-medium">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required value="<?= htmlspecialchars($mhs['jurusan']) ?>">
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label fw-medium">Angkatan</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" required value="<?= htmlspecialchars($mhs['angkatan']) ?>" min="1901" max="2155">
            </div>

            <div class="mb-4">
                <label for="status" class="form-label fw-medium">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Aktif" <?= ($mhs['status'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="Lulus" <?= ($mhs['status'] == 'Lulus') ? 'selected' : '' ?>>Lulus</option>
                    <option value="Cuti" <?= ($mhs['status'] == 'Cuti') ? 'selected' : '' ?>>Cuti</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning w-100 py-2 fw-semibold">
                <i class="fa-solid fa-pen-to-square me-1"></i> Perbarui Data
            </button>
        </form>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
