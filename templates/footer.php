        </main> <!-- End Main Content -->
    </div> <!-- End Row -->
</div> <!-- End Container Fluid -->

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const closeBtn = document.getElementById('sidebarClose');
    
    // Auto collapse pada layar kecil
    if(window.innerWidth <= 768) {
        sidebar.classList.add('collapsed');
    }

    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
    });

    if(closeBtn) {
        closeBtn.addEventListener('click', function() {
            sidebar.classList.add('collapsed');
        });
    }
</script>
</body>
</html>
