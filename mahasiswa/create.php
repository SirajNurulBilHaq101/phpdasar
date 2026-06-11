<?php
require '../templates/header.php';
require '../templates/sidebar.php';
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
                <label for="nim" class="form-label fw-medium">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required placeholder="Masukkan NIM">
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan Nama Lengkap">
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label fw-medium">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required placeholder="Contoh: Teknik Informatika">
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label fw-medium">Angkatan</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" required placeholder="Contoh: 2023" min="1901" max="2155">
            </div>

            <div class="mb-4">
                <label for="status" class="form-label fw-medium">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Cuti">Cuti</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="fa-solid fa-save me-1"></i> Simpan Data
            </button>
        </form>
    </div>
</div>

<?php require '../templates/footer.php'; ?>
