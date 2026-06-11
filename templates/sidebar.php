<?php
$current_page = basename($_SERVER['PHP_SELF']);
$dir = basename(dirname($_SERVER['PHP_SELF']));
?>

<aside id="sidebar" class="bg-dark text-white p-4" style="width: 260px; flex-shrink: 0; transition: all 0.3s ease;">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center text-white text-decoration-none">
            <i class="fa-solid fa-graduation-cap fs-4 me-2 text-primary"></i> 
            <span class="fs-5 fw-bold">MhsPro</span>
        </div>
        <button id="sidebarClose" class="btn btn-dark d-md-none border-0 text-white p-0">
            <i class="fa-solid fa-xmark fs-4"></i>
        </button>
    </div>
    
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="../dashboard/index.php" class="nav-link text-white <?= ($dir == 'dashboard') ? 'active' : '' ?>">
                <i class="fa-solid fa-chart-pie me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="../mahasiswa/index.php" class="nav-link text-white <?= ($dir == 'mahasiswa') ? 'active' : '' ?>">
                <i class="fa-solid fa-users me-2"></i> Data Mahasiswa
            </a>
        </li>
    </ul>
</aside>
<main class="flex-grow-1 p-4" style="min-width: 0; transition: all 0.3s ease; height: 100vh; overflow-y: auto;">
    <button id="sidebarToggle" class="btn btn-outline-secondary mb-4 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
        <i class="fa-solid fa-bars"></i>
    </button>
