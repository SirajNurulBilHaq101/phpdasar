<?php
require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Tambah Dosen</h1>
        <p class="text-muted">Masukkan data tenaga pendidik baru</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="store.php" method="POST">
            <div class="mb-3">
                <label for="nidn" class="form-label fw-medium">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn" required placeholder="Masukkan Nomor Induk Dosen Nasional">
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label fw-medium">Nama Lengkap & Gelar</label>
                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Contoh: Dr. Budi Santoso, M.Kom">
            </div>

            <div class="mb-3">
                <label for="keahlian" class="form-label fw-medium">Bidang Keahlian</label>
                <input type="text" class="form-control" id="keahlian" name="keahlian" required placeholder="Contoh: Rekayasa Perangkat Lunak">
            </div>

            <div class="mb-4">
                <label for="status" class="form-label fw-medium">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Cuti">Cuti</option>
                    <option value="Keluar">Keluar</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="fa-solid fa-save me-1"></i> Simpan Data Dosen
            </button>
        </form>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
