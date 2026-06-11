<?php
require '../../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM dosen ORDER BY id DESC"
);

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Data Dosen</h1>
        <p class="text-muted">Kelola informasi tenaga pendidik</p>
    </div>
    <a href="create.php" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> Tambah Dosen
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="py-3">NIDN</th>
                        <th class="py-3">Nama Dosen</th>
                        <th class="py-3">Bidang Keahlian</th>
                        <th class="py-3">Status</th>
                        <th class="px-4 py-3 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($dsn = mysqli_fetch_assoc($data)):
                    ?>
                        <tr>
                            <td class="px-4 align-middle"><?= $no++ ?></td>
                            <td class="align-middle fw-medium"><?= htmlspecialchars($dsn['nidn']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($dsn['nama']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($dsn['keahlian']) ?></td>
                            <td class="align-middle">
                                <?php if(strtolower($dsn['status']) == 'aktif'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php elseif(strtolower($dsn['status']) == 'cuti'): ?>
                                    <span class="badge bg-warning text-dark">Cuti</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary"><?= htmlspecialchars($dsn['status']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 align-middle text-end">
                                <div class="btn-group" role="group">
                                    <a href="show.php?id=<?= $dsn['id'] ?>" class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= $dsn['id'] ?>" class="btn btn-sm btn-warning text-dark" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $dsn['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data dosen ini?')" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    
                    <?php if(mysqli_num_rows($data) == 0): ?>
                        <tr>
                            <td colspan="6" class="text-center p-5 text-muted">
                                <i class="fa-solid fa-user-slash fs-1 d-block mb-3"></i>
                                Belum ada data dosen
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
