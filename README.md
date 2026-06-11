# 🎓 ManageMhs (Sistem Manajemen Mahasiswa)
**ManageMhs** adalah aplikasi berbasis web sederhana yang dibangun menggunakan **PHP Native**, **MySQL**, dan antarmuka responsif **Bootstrap 5**. Aplikasi ini dirancang untuk mengelola data mahasiswa secara efisien dengan fitur CRUD (Create, Read, Update, Delete) yang lengkap serta Dashboard statistik yang interaktif.
---
## 🛠️ Teknologi yang Digunakan
- **Backend:** PHP 8+ (Native)
- **Database:** MySQL (Ekstensi `mysqli`)
- **Frontend:** HTML5, Bootstrap 5 (CSS & JS Framework), FontAwesome 6 (Ikon)
---
## 📂 Struktur Direktori & Fungsi File
Aplikasi ini menggunakan pola arsitektur prosedural sederhana namun terstruktur (pemisahan *layout*, logika database, dan tampilan fitur).
```text
ManageMhs/
│
├── assets/
│   └── css/
│       └── style.css          # Berisi minor styling tambahan & logika Sidebar Collapse
│
├── config/
│   └── database.php           # File koneksi ke database MySQL (`db_mahasiswa`)
│
├── dashboard/
│   └── index.php              # Halaman Dashboard, menampilkan statistik jumlah mahasiswa
│
├── mahasiswa/                 # Modul CRUD Utama Mahasiswa
│   ├── index.php              # (Read) Menampilkan data mahasiswa dalam bentuk Tabel Bootstrap
│   ├── create.php             # (Create - Form) Antarmuka formulir tambah data mahasiswa
│   ├── store.php              # (Create - Logic) Skrip untuk memproses INSERT data ke tabel MySQL
│   ├── edit.php               # (Update - Form) Antarmuka formulir edit data mahasiswa (Prefilled)
│   ├── update.php             # (Update - Logic) Skrip untuk memproses UPDATE data di tabel MySQL
│   ├── delete.php             # (Delete - Logic) Skrip untuk memproses DELETE berdasarkan ID
│   └── show.php               # (Read Detail) Halaman yang menampilkan profil lengkap 1 mahasiswa
│
├── templates/                 # Komponen UI Reusable (Layouting)
│   ├── header.php             # Tag pembuka HTML, link ke Bootstrap CSS, & buka kontainer layout
│   ├── sidebar.php            # Navigasi utama aplikasi & header kontainer konten
│   └── footer.php             # Tag penutup HTML, link Bootstrap JS, & script fungsional (Toggle sidebar)
│
└── index.php                  # Entry point root, bertugas me-redirect user langsung ke folder /dashboard
```
---
## ⚙️ Penjelasan Fungsi & Method Kode
Walaupun aplikasi ini tidak berbasis OOP murni (tidak menggunakan class), ia memisahkan tanggung jawab logika secara prosedural pada setiap file:
### 1. `config/database.php`
- Menginisialisasi variabel kredensial server (Host, User, Pass, DB Name).
- Mengeksekusi fungsi `mysqli_connect()`. Jika gagal, program dihentikan dengan fungsi `die()`.
### 2. Modul Mahasiswa (Proses Data)
- **Pengambilan Data (`mahasiswa/index.php`)**: Menggunakan `mysqli_query()` dengan query `SELECT * FROM mahasiswa ORDER BY id DESC`. Data di-*looping* memakai `mysqli_fetch_assoc()` untuk dirender ke dalam `<table>` HTML.
- **Validasi Input (`store.php` & `update.php`)**:
  - Variabel form (`$_POST`) dibersihkan menggunakan `mysqli_real_escape_string()` untuk mencegah eksploitasi *SQL Injection*.
  - Terdapat validasi *hardcoded* untuk variabel `angkatan` menggunakan fungsi casting `(int)` dan pengecekan logika batas tahun `(1901 - 2155)` untuk mencegah MySQL *Out of Range error* pada tipe data `YEAR`.
- **Aksi Hapus (`delete.php`)**: Mengambil variabel `id` melalui parameter *Query String* (`$_GET['id']`), lalu mengeksekusi `DELETE FROM mahasiswa WHERE id = '$id'`.
### 3. Komponen Template (`header.php`, `sidebar.php`, `footer.php`)
- Sistem *layouting* diatur menggunakan skema **Bootstrap Grid Flexbox**. `header.php` membuka tag `div.d-flex`, kemudian menyertakan `sidebar.php` (elemen statis kiri), lalu konten utama dirender. Setelah konten utama selesai, tag ditutup oleh `footer.php`.
- Terdapat fungsi dinamis `basename(dirname($_SERVER['PHP_SELF']))` di `sidebar.php` untuk melacak direktori saat ini, yang digunakan untuk menyalakan indikator navigasi aktif (`.active`) pada Sidebar.
---
## 🔄 Alur Kerja Aplikasi (Workflow)
1. **Akses Awal**: Saat *user* mengakses URL `http://localhost/ManageMhs`, file root `index.php` diakses pertama kali dan secara otomatis memicu perintah `header("Location: dashboard/")` untuk me-redirect *user*.
2. **Dashboard**: Sistem meload file *templates*, kemudian menghitung baris tabel (*Aggregate function* `COUNT`) di MySQL untuk mendapatkan statistik total, mahasiswa aktif, dan lulus, lalu merendernya dalam bentuk Bootstrap Card.
3. **Melihat Data**: User menekan tab "Data Mahasiswa", pindah ke `mahasiswa/index.php`. File tersebut melakukan query seluruh data mahasiswa, menampilkannya ke tabel, dan menyajikan 3 opsi aksi di setiap baris: **Detail (Mata), Edit (Pena), Hapus (Tempat Sampah)**.
4. **Manipulasi Data (Contoh: Menambah Data)**:
   - User menekan "Tambah Mahasiswa" -> Diarahkan ke `create.php`.
   - Mengisi form, menekan Submit.
   - Form mengirimkan data (`method="POST"`) ke rute `store.php`.
   - `store.php` memvalidasi dan menjalankan query `INSERT`. Jika sukses, PHP me-redirect user kembali ke `mahasiswa/index.php` (`header("Location: index.php")`). Data yang baru diinput seketika terlihat di urutan teratas (berkat `ORDER BY id DESC`).
5. **Responsivitas**: Saat aplikasi dibuka di ponsel, skrip Javascript kecil pada `footer.php` mendeteksi resolusi layar, menambahkan *class* CSS `.collapsed` pada sidebar secara otomatis, dan memunculkan tombol tutup (X) agar UI tidak saling menumpuk.
---
## 🚀 Cara Menjalankan
1. Simpan folder proyek ke dalam web server lokal Anda (`htdocs` untuk XAMPP, atau `www` untuk Laragon).
2. Nyalakan service **Apache** dan **MySQL**.
3. Pastikan database bernama `db_mahasiswa` telah dibuat di phpMyAdmin Anda, beserta tabel `mahasiswa`.
4. Akses proyek Anda melalui browser di alamat: `http://localhost/ManageMhs` (atau sesuaikan dengan port dan domain lokal Anda).
