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
        <h1 class="h2">Edit Mata kuliah</h1>
        <p class="text-muted">Perbarui data Mata kuliah</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $mk['id'] ?>">
            
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= htmlspecialchars($mk['nama']) ?>">
            </div>
            
            <div class="mb-3">
                <label for="kode" class="form-label fw-medium">Kode</label>
                <input type="number" class="form-control" id="kode" name="kode" required value="<?= htmlspecialchars($mk['kode']) ?>">
            </div>


            <button type="submit" class="btn btn-warning w-100 py-2 fw-semibold">
                <i class="fa-solid fa-pen-to-square me-1"></i> Perbarui Data
            </button>
        </form>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
