<?php
require '../../config/database.php';

$total = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total FROM tbl_mahasiswa"
    )
);

$aktif = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total FROM tbl_mahasiswa
         WHERE status_mhs ='Aktif'"
    )
);

$nonaktif = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total FROM tbl_mahasiswa
         WHERE status_mhs ='Nonaktif'"
    )
);

$lulus = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total FROM tbl_mahasiswa
         WHERE status_mhs ='Lulus'"
    )
);

$dosen_total = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) as total FROM tbl_dosen"
    )
);

require '../../templates/header.php';
require '../../templates/sidebar.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2">Dashboard Analytics</h1>
        <p class="text-muted">Overview of Student Management System</p>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-info h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title text-uppercase fw-semibold mb-3">Total Dosen</h5>
                <h2 class="display-4 fw-bold mb-0"><?= $dosen_total['total'] ?? 0 ?></h2>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
                <small><i class="fa-solid fa-user-tie me-2"></i> Pengajar terdaftar</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-primary h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title text-uppercase fw-semibold mb-3">Total Mahasiswa</h5>
                <h2 class="display-4 fw-bold mb-0"><?= $total['total'] ?? 0 ?></h2>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
                <small><i class="fa-solid fa-users me-2"></i> Terdaftar di sistem</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title text-uppercase fw-semibold mb-3">Mahasiswa Aktif</h5>
                <h2 class="display-4 fw-bold mb-0"><?= $aktif['total'] ?? 0 ?></h2>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
                <small><i class="fa-solid fa-check-circle me-2"></i> Sedang studi</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title text-uppercase fw-semibold mb-3">Mahasiswa Non-Aktif</h5>
                <h2 class="display-4 fw-bold mb-0"><?= $nonaktif['total'] ?? 0 ?></h2>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
                <small><i class="fa-solid fa-check-circle me-2"></i> Sedang studi</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning h-100 shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title text-uppercase fw-semibold mb-3">Mahasiswa Lulus</h5>
                <h2 class="display-4 fw-bold mb-0"><?= $lulus['total'] ?? 0 ?></h2>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
                <small><i class="fa-solid fa-graduation-cap me-2"></i> Telah lulus</small>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title"><i class="fa-solid fa-chart-line me-2 text-primary"></i> System Status</h5>
        <p class="card-text text-muted mt-3">
            Sistem Manajemen Mahasiswa berjalan dengan lancar. Anda dapat mengelola data mahasiswa secara efisien menggunakan menu navigasi di sebelah kiri.
        </p>
    </div>
</div>

<?php require '../../templates/footer.php'; ?>