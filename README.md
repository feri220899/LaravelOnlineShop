# Aplikasi Pengelolaan Barang dan Transaksi Toko Online

## Pendahuluan
Aplikasi ini dirancang untuk mempermudah pengelolaan data barang, transaksi, dan proses pengiriman di toko online. Dengan fitur-fitur yang disediakan, admin dapat menambahkan barang secara efisien, pembeli dapat melakukan pembelian dengan mudah, dan tim Customer Service (CS) dapat mengelola verifikasi pembayaran serta pengiriman barang.

---

## Fitur Utama

### Admin
- **Menambahkan Barang**
  - **Individu**: Admin dapat menambahkan barang satu per satu melalui form input.
  - **Massal (Bulk)**: Admin dapat mengimpor data barang dari file Excel untuk menambahkan banyak barang sekaligus.

- **Manajemen Stok**
  - Stok barang otomatis berkurang setelah pembayaran berhasil diverifikasi oleh CS Layer 1.
  - Stok barang akan kembali jika pesanan dibatalkan secara otomatis oleh sistem setelah 1x24 jam tanpa pembayaran yang valid.

### Pembeli
- **Melihat Barang**
  - Pembeli dapat melihat semua barang yang tersedia tanpa batasan kategori.

- **Membeli Barang**
  - Barang dapat ditambahkan ke keranjang belanja tanpa langsung mengurangi stok.
  - Stok hanya berkurang setelah pembayaran berhasil diverifikasi.

- **Unggah Bukti Pembayaran**
  - Pembayaran dilakukan dengan mengunggah bukti pembayaran melalui formulir di sistem.

### Customer Service (CS)
#### CS Layer 1:
- **Verifikasi Pembayaran**
  - Memeriksa dan memvalidasi bukti pembayaran yang diunggah pembeli.
  - Mengonfirmasi pembayaran yang valid dan mengubah status pesanan menjadi "Terverifikasi".

- **Mengonfirmasi Pesanan**
  - Pesanan yang telah diverifikasi diteruskan ke CS Layer 2 untuk diproses lebih lanjut.

#### CS Layer 2:
- **Pengepakan dan Pengiriman**
  - Memastikan barang yang dipesan diproses dengan benar.
  - Memantau status pengiriman hingga barang sampai ke pembeli.

---

## Panduan Penggunaan

### Admin
#### Menambahkan Barang Secara Individu:
1. Masuk ke dashboard admin.
2. Pilih menu **Tambah Barang**.
3. Isi form dengan data barang (nama, harga, stok, deskripsi, dll.).
4. Klik **Simpan** untuk menambahkan barang ke sistem.

#### Menambahkan Barang Secara Massal:
1. Siapkan file Excel dengan format yang sesuai (misalnya: kolom nama, harga, stok).
2. Masuk ke dashboard admin.
3. Pilih menu **Impor Barang**.
4. Unggah file Excel, lalu klik **Proses**.
5. Sistem akan memproses data dan menambahkan barang ke sistem.

### Pembeli
#### Membeli Barang:
1. Pilih barang yang ingin dibeli dan tambahkan ke keranjang.
2. Periksa isi keranjang dan klik **Checkout**.
3. Unggah bukti pembayaran melalui formulir yang tersedia.
4. Tunggu konfirmasi dari CS Layer 1.

### Customer Service
#### Verifikasi Pembayaran (CS Layer 1):
1. Masuk ke dashboard CS Layer 1.
2. Pilih menu **Verifikasi Pembayaran**.
3. Periksa bukti pembayaran yang diunggah pembeli.
4. Jika valid, klik **Konfirmasi**. Jika tidak valid, klik **Tolak**.
5. Setelah konfirmasi, pesanan diteruskan ke CS Layer 2.

#### Pengepakan dan Pengiriman (CS Layer 2):
1. Masuk ke dashboard CS Layer 2.
2. Pilih menu **Proses Pengiriman**.
3. Pengepakan barang sesuai pesanan.
4. Masukkan detail pengiriman (kurir, nomor resi, dll.).
5. Klik **Selesai** untuk menyelesaikan proses pengiriman.

---

## Proses Otomatis Sistem
- **Pembatalan Pesanan**: Jika pembayaran tidak dilakukan atau gagal diverifikasi dalam 1x24 jam, pesanan akan otomatis dibatalkan, dan stok barang dikembalikan.
- **Pengurangan Stok**: Stok barang akan berkurang hanya setelah pembayaran berhasil diverifikasi oleh CS Layer 1.

---

## Catatan Tambahan
- Pastikan file Excel yang diunggah memiliki format yang benar untuk menghindari kesalahan impor data.
- Sistem belum terintegrasi dengan pembayaran otomatis, sehingga verifikasi manual oleh CS Layer 1 sangat penting.

---

## Bantuan dan Dukungan
Jika mengalami masalah, silakan hubungi tim dukungan melalui email: support@tokoonline.com atau telepon: 123-456-789.

---

**Selamat menggunakan aplikasi!**

