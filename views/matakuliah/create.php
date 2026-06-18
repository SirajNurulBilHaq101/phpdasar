<?php
require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Tambah Mahasiswa</h1>
        <p class="text-muted">Masukkan data mahasiswa baru</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="store.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama Matakuliah</label>
                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan Nama MK">
            </div>
            
            <div class="mb-3">
                <label for="kode" class="form-label fw-medium">Kode Matakuliah</label>
                <input type="number" class="form-control" id="kode" name="kode" required placeholder="Masukkan kode Lengkap">
            </div>


            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="fa-solid fa-save me-1"></i> Simpan Data
            </button>
        </form>
    </div>
</div>

<?php require '../templates/footer.php'; ?>
