<?php
require '../../config/database.php';

$mhs_query = mysqli_query($conn, "SELECT id_mhs, nim_mhs, nama_mhs FROM tbl_mahasiswa ORDER BY nama_mhs ASC");
$dsn_query = mysqli_query($conn, "SELECT id_dsn, nama_dsn FROM tbl_dosen ORDER BY nama_dsn ASC");
$mk_query = mysqli_query($conn, "SELECT id_mk, nama_mk FROM tbl_matakuliah ORDER BY nama_mk ASC");

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Tambah Nilai</h1>
        <p class="text-muted">Masukkan data nilai mahasiswa</p>
    </div>
    <a href="index.php" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm border-0" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="store.php" method="POST">
            <div class="mb-3">
                <label for="id_mhs" class="form-label fw-medium">Mahasiswa</label>
                <select class="form-select" id="id_mhs" name="id_mhs" required>
                    <option value="" disabled selected>Pilih Mahasiswa</option>
                    <?php while ($mhs = mysqli_fetch_assoc($mhs_query)): ?>
                        <option value="<?= $mhs['id_mhs'] ?>"><?= htmlspecialchars($mhs['nim_mhs'] . ' - ' . $mhs['nama_mhs']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_mk" class="form-label fw-medium">Mata Kuliah</label>
                <select class="form-select" id="id_mk" name="id_mk" required>
                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                    <?php while ($mk = mysqli_fetch_assoc($mk_query)): ?>
                        <option value="<?= $mk['id_mk'] ?>"><?= htmlspecialchars($mk['nama_mk']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="id_dsn" class="form-label fw-medium">Dosen Pengampu</label>
                <select class="form-select" id="id_dsn" name="id_dsn" required>
                    <option value="" disabled selected>Pilih Dosen Pengampu</option>
                    <?php while ($dsn = mysqli_fetch_assoc($dsn_query)): ?>
                        <option value="<?= $dsn['id_dsn'] ?>"><?= htmlspecialchars($dsn['nama_dsn']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="fa-solid fa-save me-1"></i> Simpan Data
            </button>
        </form>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
