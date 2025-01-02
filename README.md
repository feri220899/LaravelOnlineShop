# Panduan User Melakukan Transaksi

## 1. Melihat Barang
- login aplikasi dengan user yang tersedia di database ataupun registrasi di menu registrasi
- Buka halaman utama toko online.
- Cari barang yang ingin dibeli menggunakan fitur pencarian atau filter.
- Klik pada barang untuk melihat  harga, dan ketersediaan stok.

## 2. Menambahkan Barang ke Keranjang ataupun langsung checkout barang
- Klik tombol **Checkout** pada barang yang ingin dibeli ataupun .
- Klik tombol **Icon Tambah ke Keranjang** pada barang yang ingin dibeli.
- Periksa isi keranjang dengan mengklik ikon keranjang di sudut kanan atas.
- Pastikan jumlah barang yang diinginkan sudah sesuai. Anda dapat mengubah jumlah barang langsung di halaman keranjang.

## 3. Melakukan Checkout
- Setelah semua barang ditambahkan ke keranjang, klik tombol **Checkout**.
- Isi informasi pengiriman, seperti nama, alamat, dan nomor telepon.
- Klik **Lanjutkan** untuk menuju halaman pembayaran.

## 4. Mengunggah Bukti Pembayaran
- Transfer total pembayaran ke rekening toko yang tertera.
- Unggah bukti pembayaran melalui formulir yang tersedia pada halaman pembayaran.
- Klik tombol **Kirim Bukti Pembayaran** untuk menyelesaikan proses ini.

## 5. Menunggu Verifikasi
- Setelah bukti pembayaran diunggah, Customer Service Layer 1 akan memverifikasi pembayaran Anda.
- **Jika pembayaran valid**:
  - Anda akan menerima notifikasi bahwa pesanan Anda telah dikonfirmasi.
  - Pesanan akan diteruskan ke proses pengepakan dan pengiriman.
- **Jika pembayaran tidak valid**:
  - Anda akan menerima notifikasi bahwa pembayaran ditolak.
  - Anda dapat mengunggah ulang bukti pembayaran.

## 6. Melacak Status Pesanan
- Setelah pembayaran terverifikasi, pesanan Anda akan diproses oleh Customer Service Layer 2.
- Anda dapat melacak status pengiriman barang melalui halaman **Riwayat Pesanan** di akun Anda.

## 7. Menerima Barang
- Barang akan dikirim 
- klik Recive Order untuk menyelesaikan

---

## Catatan Penting
- **Batas Waktu Pembayaran**: Pembayaran harus dilakukan dalam waktu 1x24 jam setelah checkout. Jika tidak, pesanan akan otomatis dibatalkan.
- **Stok Barang**: Barang yang ada di keranjang tidak akan mengurangi stok sampai pembayaran berhasil diverifikasi.

---

# Deployment guite 
Panduan ini menjelaskan langkah-langkah untuk Deployment guite aplikasi toko online sederhana, melakukan migrasi database, dan menambahkan data awal menggunakan seeder.

---

## 1. Instalasi Laravel
### Prasyarat
- **PHP**: Versi 8.0 atau lebih baru.
- **Composer**: Dependency manager untuk PHP.
- **Database**: PostgreSQL
- **Web Server**: Apache atau Nginx.

### Langkah Instalasi
1. **Clone Proyek**:
   ```bash
   git clone https://github.com/feri220899/LaravelOnlineShop.git
   ```
2. **Instal Dependency**:
   ```bash
   composer install
   ```
3. **Konfigurasi File `.env`**:
   - Salin file `.env.example` menjadi `.env`:
     ```bash
     cp .env.example .env
     ```
   - Edit file `.env` untuk menyesuaikan dengan konfigurasi database Anda:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nama_database
     DB_USERNAME=username
     DB_PASSWORD=password
     ```
4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Perintah storage link**:
   ```bash
   php artisan storage:link
---

## 2. Migrasi Database
### Menjalankan Migrasi
1. Pastikan database yang Anda tentukan di file `.env` telah dibuat.
2. Jalankan perintah berikut untuk melakukan migrasi:
   ```bash
   php artisan migrate
   ```
   Perintah ini akan membuat tabel-tabel yang didefinisikan dalam file migrasi di direktori `database/migrations`.

---

## 3. Menambahkan Data Awal dengan Seeder

### Menjalankan Seeder
1. Jalankan seeder dengan perintah:
   ```bash
   php artisan db:seed --class=UserSeeder
   ```
2. Untuk menjalankan semua seeder di direktori `database/seeders`, gunakan:
   ```bash
   php artisan db:seed
   ```

---

