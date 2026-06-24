<?php
require '../../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM tbl_mahasiswa ORDER BY id_mhs DESC"
);

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Data Mahasiswa</h1>
        <p class="text-muted">Kelola informasi mahasiswa terdaftar</p>
    </div>
    <a href="create.php" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> Tambah Mahasiswa
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="py-3">NIM</th>
                        <th class="py-3">Nama</th>
                        <th class="py-3">Jurusan</th>
                        <th class="py-3">Angkatan</th>
                        <th class="py-3">Status</th>
                        <th class="px-4 py-3 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($mhs = mysqli_fetch_assoc($data)):
                    ?>
                        <tr>
                            <td class="px-4 align-middle"><?= $no++ ?></td>
                            <td class="align-middle fw-medium"><?= htmlspecialchars($mhs['nim_mhs']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($mhs['nama_mhs']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($mhs['jurusan_mhs']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($mhs['angkatan_mhs']) ?></td>
                            <td class="align-middle">
                                <?php if(strtolower($mhs['status_mhs']) == 'aktif'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php elseif(strtolower($mhs['status_mhs']) == 'lulus'): ?>
                                    <span class="badge bg-primary">Lulus</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary"><?= htmlspecialchars($mhs['status_mhs']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 align-middle text-end">
                                <div class="btn-group" role="group">
                                    <a href="show.php?id=<?= $mhs['id_mhs'] ?>" class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= $mhs['id_mhs'] ?>" class="btn btn-sm btn-warning text-dark" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $mhs['id_mhs'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
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