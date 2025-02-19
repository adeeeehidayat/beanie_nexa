# Beanie 

Proyek ini adalah aplikasi web berbasis Laravel untuk e-commerce kopi.
# Fitur Database di Pengguna
- Login/Register
- Tambah Produk ke keranjang dan mengurangi stok produk
- Jika stok produk habis maka muncul peringatan produk habis saat menambahkan produk ke keranjang
- Jika menghapus produk dari keranjang akan mengembalikan jumlah stok
- Produk dan Artikel dinamis dari database (termasuk data carousel yang dinamis)
# Fitur Database di Admin
- CRUD Produk dan Artikel

## Instalasi
Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal untuk tim reviewer NEXA.
- Pastikan untuk terhubung dengan internet karena asset gambar diambil dari unsplash dan placehold.co
### 1. Clone Repository
```sh
git clone https://github.com/adeeeehidayat/beanie_nexa.git
cd beanie_nexa
```

### 2. Instal Dependensi
```sh
composer install
```

### 3. Konfigurasi Lingkungan
Salin file `.env.example` ke `.env` dan ubah konfigurasi
```sh
cp .env.example .env
```

### 4. Generate Key
```sh
php artisan key:generate
```

### 5. Konfigurasi Database
Pastikan database sudah dibuat, lalu sesuaikan `.env`:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=beanie_db
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

## Menjalankan Proyek
### 1. Migrasi dan Seeder Database
```sh
php artisan migrate --seed
```

### 2. Menjalankan Server
```sh
php artisan serve
```
Akses aplikasi di browser: `http://127.0.0.1:8000`

Contoh akun user
- username : budi123
- password : password123
---