# Destigo - Sistem Pemesanan Tiket Destinasi Wisata
## 1. Deskripsi Destigo

Destigo adalah aplikasi web berbasis Laravel yang digunakan untuk melakukan pemesanan tiket destinasi wisata lokal maupun internasional. Aplikasi ini dirancang untuk memudahkan pengguna dalam melihat informasi destinasi wisata, memesan tiket, melakukan pembayaran, serta mendapatkan e-ticket. Selain itu, aplikasi ini menyediakan dashboard admin untuk mengelola data negara, destinasi wisata, pemesanan, pembayaran, dan pengguna.

Project ini dibuat untuk memenuhi tugas UAS mata kuliah Pemrograman Berbasis Web (PBW).

## 2. Tujuan Destigo
Tujuan dibuatnya aplikasi Destigo adalah:

  - Mempermudah proses pemesanan tiket wisata secara online
  - Menyediakan informasi destinasi wisata berdasarkan negara
  - Mempermudah admin dalam mengelola data wisata
  - Menyediakan sistem e-ticket digital

## 3. Fitur Aplikasi
Fitur User

  - Register akun
  - Login akun
  - Melihat daftar negara wisata
  - Melihat daftar destinasi wisata
  - Melihat detail destinasi
  - Memesan tiket wisata
  - Mengisi data pengunjung
  - Sistem perhitungan harga otomatis
  - Simulasi pembayaran
  - Mendapatkan e-ticket
  - QR Code tiket
  - Logout akun

Fitur Admin

  - Login admin
  - Dashboard admin
  - Statistik jumlah negara
  - Statistik jumlah destinasi
  - Statistik jumlah pemesanan
  - Statistik pembayaran
  - Statistik user
  - CRUD data negara
  - CRUD data destinasi wisata
  - Melihat data booking
  - Melihat data pembayaran
    
## 4. Teknologi yang digunakan
Framework dan tools yang digunakan:

  - Laravel 12
  - PHP 8.2
  - MySQL
  - Blade Template Engine
  - Tailwind CSS
  - Laravel Breeze
  - Simple QR Code
  - Vite
  - Composer
  - XAMPP

## 5. Struktur Database

Aplikasi ini menggunakan beberapa tabel utama:

Tabel utama:
  - users
  - countries
  - destinations
  - bookings
  - visitors
  - payments
    
Tabel bawaan Laravel:
  - sessions
  - cache
  - cache_locks
  - jobs
  - job_batches
  - failed_jobs
  - migrations
  - password_reset_tokens

## 6. Alur Sistem
### User
1. Register akun
2. Login ke sistem
3. Pilih negara tujuan
4. Pilih destinasi wisata
5. Lihat detail destinasi
6. Booking tiket
7. Isi data pengunjung
8. Lakukan pembayaran
9. Dapatkan e-ticket beserta QR Code

### Admin
1. Login sebagai admin
2. Masuk ke dashboard admin
3. Kelola data negara
4. Kelola data destinasi
5. Melihat data booking
6. Melihat data pembayaran
7. Monitoring aktivitas sistem

## 7. Instalasi Project

#### 1. Clone Repository

   git clone https://github.com/cutfarah/Project_UAS_PBW.git

   cd Project_UAS_PBW

#### 2. Install Dependency

    composer install
    npm install

#### 3. Copy File Environment
   
    copy .env.example .env

#### 4. Generate Application Key

    php artisan key:generate

#### 5. Konfigurasi Database

    Edit file .env
  
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=destigo_db
      DB_USERNAME=root
      DB_PASSWORD=

#### 6. Import Database

    Jika menggunakan file SQL, import destigo_db.sql melalui phpMyAdmin.
    
    Atau jika ingin membuat database dari migration:
    php artisan migrate

#### 7. Buat Storage Link

    php artisan storage:link

#### 8. Jalankan Project

    php artisan serve
    npm run dev

    Buka browser:

    http://127.0.0.1:8000

## 8. Akun Demo

#### Admin

Email: admin@gmail.com

Password: destigo123

## 9. Cara Penggunaan

#### User
  - Register akun baru
  - Login ke sistem
  - Pilih negara tujuan
  - Pilih destinasi wisata
  - Isi jumlah tiket
  - Isi data pengunjung
  - Lakukan pembayaran
  - Dapatkan e-ticket
    
    
#### Admin
  - Login sebagai admin
  - Kelola data negara
  - Kelola data destinasi
  - Pantau pemesanan tiket
  - Pantau pembayaran user
  - Lihat statistik sistem

## 10. Author
Nama: Cut Farah Salsabila

NPM: 2408107010100

Mata Kuliah: Pemrograman Berbasis Web (A)
