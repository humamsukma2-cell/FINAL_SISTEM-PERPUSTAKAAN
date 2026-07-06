# Sistem Informasi Perpustakaan

Sistem Informasi Perpustakaan adalah aplikasi berbasis Laravel yang digunakan untuk mengelola data buku, data anggota, transaksi peminjaman, pengembalian buku, laporan transaksi, export data, serta pencarian data secara global. Sistem ini dibuat sebagai project final mata kuliah Pemrograman Web 2.

- NAMA     : MUHAMMAD HUMAM SUKMA
- NIM      : 60324087
- KELAS    : PEMROGRAMAN WEB 2 (B)
---

## 5 Fitur Utama

### 1. Authentication System

Sistem sudah dilengkapi dengan fitur autentikasi menggunakan Laravel Breeze. Pengguna dapat melakukan register, login, dan logout. Setiap halaman utama sistem dilindungi middleware authentication, sehingga hanya user yang sudah login yang dapat mengakses fitur pengelolaan data.

Fitur yang tersedia:

- Register akun
- Login
- Logout
- Password hashing
- Middleware protection
<img width="955" height="439" alt="image" src="https://github.com/user-attachments/assets/e8bd3258-1f3e-43ef-8349-297410f48b5a" />


---

### 2. CRUD Buku

Fitur ini digunakan untuk mengelola data buku perpustakaan. Admin dapat menambahkan, melihat, mengubah, menghapus, mencari, dan memfilter data buku.

Fitur yang tersedia:

- Tambah buku
- Lihat daftar buku
- Lihat detail buku
- Edit data buku
- Hapus data buku
- Search buku
- Filter kategori buku
- Export data buku
<img width="945" height="442" alt="image" src="https://github.com/user-attachments/assets/b57b8a2c-c988-42b6-b710-847e83444184" />


---

### 3. CRUD Anggota

Fitur ini digunakan untuk mengelola data anggota perpustakaan. Data anggota dilengkapi validasi seperti email, nomor telepon, tanggal lahir, status anggota, dan tanggal pendaftaran.

Fitur yang tersedia:

- Tambah anggota
- Lihat daftar anggota
- Lihat detail anggota
- Edit data anggota
- Hapus data anggota
- Validasi email
- Validasi nomor telepon
- Export data anggota
<img width="959" height="368" alt="image" src="https://github.com/user-attachments/assets/daaf279b-ba2a-4522-a278-26641701e049" />


---

### 4. Transaksi Peminjaman dan Pengembalian Buku

Fitur ini digunakan untuk mencatat proses peminjaman dan pengembalian buku. Saat transaksi peminjaman dibuat, stok buku otomatis berkurang. Sistem juga otomatis membuat kode transaksi dan tanggal kembali selama 7 hari dari tanggal pinjam.

Jika buku dikembalikan melewati tanggal kembali, sistem akan menghitung denda keterlambatan sebesar Rp 5.000 per hari.

Fitur yang tersedia:

- Form peminjaman buku
- Generate kode transaksi otomatis
- Tanggal kembali otomatis +7 hari
- Stok buku otomatis berkurang saat dipinjam
- Pengembalian buku
- Stok buku otomatis bertambah saat dikembalikan
- Perhitungan denda Rp 5.000 per hari
- Badge keterlambatan
- Alert keterlambatan pada detail transaksi
<img width="959" height="387" alt="image" src="https://github.com/user-attachments/assets/9482ca49-f7ee-4dc6-8470-6badb58d3245" />


---

### 5. Dashboard, Global Search, dan Laporan Transaksi

Dashboard digunakan untuk menampilkan ringkasan data penting seperti total buku, anggota aktif, transaksi, buku yang sedang dipinjam, buku terlambat, dan total denda. Dashboard juga dilengkapi chart untuk melihat perkembangan transaksi dan buku populer.

Global Search digunakan untuk mencari data dari tiga module utama, yaitu buku, anggota, dan transaksi. Hasil pencarian ditampilkan dalam bentuk tab dan dilengkapi keyword highlighting.

Laporan transaksi digunakan untuk melihat data transaksi berdasarkan filter tanggal, status, dan anggota. Laporan juga dapat dicetak atau diexport ke PDF.

Fitur yang tersedia:

- Dashboard statistik
- Grafik transaksi
- Grafik buku populer
- Quick actions
- Widget buku terlambat
- Global search buku, anggota, dan transaksi
- Hasil pencarian dalam bentuk tabs
- Keyword highlighting
- Filter laporan berdasarkan tanggal, status, dan anggota
- Export laporan ke PDF
- Print-friendly report
<img width="944" height="439" alt="image" src="https://github.com/user-attachments/assets/421d57b2-bbfb-4806-88f4-68165b20575a" />


---

## Fitur Tambahan yang Digunakan

Project ini menggunakan minimal 3 fitur tambahan, yaitu:

### 1. Notifikasi Terlambat

Sistem menampilkan informasi transaksi yang sudah melewati tanggal kembali. Informasi keterlambatan ditampilkan pada dashboard, index transaksi, dan detail transaksi.

Fitur yang tersedia:

- Widget buku terlambat di dashboard
- Jumlah transaksi terlambat
- List anggota dan buku yang terlambat
- Badge "Terlambat X hari" di index transaksi
- Alert keterlambatan di detail transaksi

---

### 2. Export Data

Sistem mendukung export data untuk membantu admin menyimpan atau mencetak data dari sistem.

Fitur yang tersedia:

- Export data buku
- Export data anggota
- Export laporan transaksi ke PDF

---

### 3. Riwayat dan Informasi Transaksi

Sistem menampilkan informasi transaksi peminjaman secara detail, mulai dari tanggal pinjam, tanggal kembali, status transaksi, tanggal dikembalikan, hingga denda.

Fitur yang tersedia:

- Detail transaksi peminjaman
- Status transaksi
- Informasi denda
- Informasi keterlambatan
- Riwayat transaksi pada daftar transaksi
- Informasi anggota dan buku pada setiap transaksi

---

## Teknologi yang Digunakan

- Laravel
- Laravel Breeze
- PHP
- MySQL
- Bootstrap
- Blade Template
- Chart.js
- Maatwebsite Excel
- Barryvdh DomPDF

---

## Cara Install Project

### 1. Clone Repository

Clone repository dari GitHub:

```bash
git clone link-repository-anda
```

Masuk ke folder project:

```bash
cd nama-folder-project
```

Contoh:

```bash
cd perpustakaan
```

---

### 2. Install Dependency Laravel

Setelah masuk ke folder project, jalankan perintah berikut untuk menginstall dependency Laravel:

```bash
composer install
```

Perintah ini digunakan untuk mengunduh semua package Laravel yang dibutuhkan oleh sistem.

---

### 3. Install Dependency Frontend

Jalankan perintah berikut untuk menginstall dependency frontend:

```bash
npm install
```

Perintah ini dibutuhkan karena project menggunakan Laravel Breeze dan asset frontend seperti CSS dan JavaScript.

---

### 4. Buat File Environment

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Jika menggunakan Windows dan perintah tersebut tidak berjalan, file `.env.example` dapat dicopy secara manual, kemudian ubah namanya menjadi:

```text
.env
```

File `.env` digunakan untuk mengatur konfigurasi project, seperti nama aplikasi, database, dan pengaturan lainnya.

---

### 5. Generate Application Key

Jalankan perintah berikut:

```bash
php artisan key:generate
```

Perintah ini digunakan untuk membuat application key Laravel agar sistem dapat berjalan dengan benar.

---

### 6. Buat Database

Buka MySQL atau phpMyAdmin, lalu buat database baru dengan nama:

```text
perpustakaan
```

Setelah database dibuat, buka file `.env`, lalu sesuaikan konfigurasi database:

```env
DB_DATABASE=perpustakaan
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi database di komputer masing-masing.

---

### 7. Jalankan Migration

Setelah database dikonfigurasi, jalankan migration untuk membuat tabel-tabel yang dibutuhkan:

```bash
php artisan migrate
```

Jika project menyediakan seeder, jalankan juga perintah berikut:

```bash
php artisan db:seed
```

Migration digunakan untuk membuat struktur tabel database seperti tabel user, buku, anggota, transaksi, dan tabel lain yang dibutuhkan sistem.

---

### 8. Jalankan Server Laravel

Jalankan server Laravel dengan perintah:

```bash
php artisan serve
```

Setelah berhasil, buka browser dan akses alamat berikut:

```text
http://127.0.0.1:8000
```

---

### 9. Jalankan Vite

Buka terminal baru tanpa menutup server Laravel, lalu jalankan:

```bash
npm run dev
```

Perintah ini digunakan agar tampilan frontend, asset CSS, JavaScript, dan Laravel Breeze dapat berjalan dengan baik.
