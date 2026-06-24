<?php
require '../../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM tbl_matakuliah ORDER BY id_mk DESC"
);

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Data Mata Kuliah</h1>
        <p class="text-muted">Kelola informasi Mata Kuliah terdaftar</p>
    </div>
    <a href="create.php" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> Tambah Mata Kuliah
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="py-3">Nama Matakuliah</th>
                        <th class="py-3">Kode Matakuliah</th>
                        <th class="py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($mk = mysqli_fetch_assoc($data)):
                    ?>
                        <tr>
                            <td class="px-4 align-middle"><?= $no++ ?></td>
                            
                            <td class="align-middle fw-medium"><?= htmlspecialchars($mk['nama_mk']) ?></td>
                            <td class="align-middle fw-medium"><?= htmlspecialchars($mk['kode_mk']) ?></td>
                            
                            <td class="px-4 align-middle text-end">
                                <div class="btn-group" role="group">
                                    <a href="show.php?id=<?= $mk['id_mk'] ?>" class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= $mk['id_mk'] ?>" class="btn btn-sm btn-warning text-dark" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $mk['id_mk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    
                    <?php if(mysqli_num_rows($data) == 0): ?>
                        <tr>
                            <td colspan="7" class="text-center p-5 text-muted">
                                <i class="fa-solid fa-folder-open fs-1 d-block mb-3"></i>
                                Belum ada data mahasiswa
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>