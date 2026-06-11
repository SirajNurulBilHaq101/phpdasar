<?php
require '../../config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM dosen WHERE id = '$id'");
$dsn = mysqli_fetch_assoc($query);

if (!$dsn) {
    header("Location: index.php");
    exit;
}

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Edit Dosen</h1>
        <p class="text-muted">Perbarui data tenaga pendidik</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $dsn['id'] ?>">
            
            <div class="mb-3">
                <label for="nidn" class="form-label fw-medium">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn" required value="<?= htmlspecialchars($dsn['nidn']) ?>">
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama Lengkap & Gelar</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= htmlspecialchars($dsn['nama']) ?>">
            </div>

            <div class="mb-3">
                <label for="keahlian" class="form-label fw-medium">Bidang Keahlian</label>
                <input type="text" class="form-control" id="keahlian" name="keahlian" required value="<?= htmlspecialchars($dsn['keahlian']) ?>">
            </div>

            <div class="mb-4">
                <label for="status" class="form-label fw-medium">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Aktif" <?= ($dsn['status'] == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="Cuti" <?= ($dsn['status'] == 'Cuti') ? 'selected' : '' ?>>Cuti</option>
                    <option value="Keluar" <?= ($dsn['status'] == 'Keluar') ? 'selected' : '' ?>>Keluar</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning w-100 py-2 fw-semibold">
                <i class="fa-solid fa-pen-to-square me-1"></i> Perbarui Data
            </button>
        </form>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
