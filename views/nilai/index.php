<?php
require '../../config/database.php';

$query = "SELECT n.id_nilai, m.nama_mhs, m.nim_mhs, d.nama_dsn, mk.nama_mk 
          FROM tbl_nilai n 
          JOIN tbl_mahasiswa m ON n.id_mhs = m.id_mhs 
          JOIN tbl_dosen d ON n.id_dsn = d.id_dsn 
          JOIN tbl_matakuliah mk ON n.id_mk = mk.id_mk 
          ORDER BY n.id_nilai DESC";
$data = mysqli_query($conn, $query);

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Data Nilai</h1>
        <p class="text-muted">Kelola informasi nilai mahasiswa</p>
    </div>
    <a href="create.php" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> Tambah Nilai
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="py-3">Mahasiswa</th>
                        <th class="py-3">Mata Kuliah</th>
                        <th class="py-3">Dosen Pengampu</th>
                        <th class="px-4 py-3 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if($data && mysqli_num_rows($data) > 0):
                        while ($nilai = mysqli_fetch_assoc($data)):
                    ?>
                        <tr>
                            <td class="px-4 align-middle"><?= $no++ ?></td>
                            <td class="align-middle">
                                <div class="fw-medium"><?= htmlspecialchars($nilai['nama_mhs']) ?></div>
                                <div class="small text-muted"><?= htmlspecialchars($nilai['nim_mhs']) ?></div>
                            </td>
                            <td class="align-middle"><?= htmlspecialchars($nilai['nama_mk']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($nilai['nama_dsn']) ?></td>
                            <td class="px-4 align-middle text-end">
                                <div class="btn-group" role="group">
                                    <a href="show.php?id=<?= $nilai['id_nilai'] ?>" class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="edit.php?id=<?= $nilai['id_nilai'] ?>" class="btn btn-sm btn-warning text-dark" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $nilai['id_nilai'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center p-5 text-muted">
                                <i class="fa-solid fa-folder-open fs-1 d-block mb-3"></i>
                                Belum ada data nilai
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>
