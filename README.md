
# Hotel Holly Web

Aplikasi web hotel yang komprehensif ini, yang dikembangkan menggunakan framework Laravel, menawarkan perjalanan yang lancar dari reservasi hingga penyelesaian pembayaran. Dengan antarmuka yang intuitif dan fitur-fitur yang tangguh, pengguna dapat dengan mudah menelusuri kamar yang tersedia, membuat reservasi untuk tanggal yang diinginkan, mengelola pemesanan, dan menyelesaikan pembayaran yang aman, semuanya dalam satu platform. Dibangun dengan fokus pada pengalaman pengguna dan efisiensi, aplikasi ini menyederhanakan seluruh proses pemesanan hotel baik untuk tamu maupun administrator, meningkatkan pengalaman keseluruhan untuk semua pemangku kepentingan yang terlibat.


## Fitur

- **Pencarian Ketersediaan Kamar (Room Availability Search)**: Pengguna dapat mencari kamar yang tersedia berdasarkan tanggal check-in dan check-out, jumlah tamu, serta preferensi kamar seperti tipe dan fasilitas
- **Deskripsi Kamar (Room Descriptions)**: Setiap tipe kamar akan ditampilkan lengkap dengan informasi seperti:
                                            •	Foto kamar
                                            •	Fasilitas (AC, TV, Wi-Fi, dsb)
                                            •	Harga per malam
                                            •	Kapasitas Kasur
                                            •	Kamar Tersedia
- **Pemesanan Kamar (Room Reservation)**: Pengguna dapat memesan kamar secara langsung melalui website dengan mengisi formulir data tamu, memilih tipe kamar, serta menentukan tanggal menginap ( Check-in & Check-out )
- **Konfirmasi Reservasi (Reservation Confirmation)**: Setelah pemesanan berhasil, pengguna akan menerima konfirmasi melalui tampilan di web dan email yang berisi:
1.	ID reservasi
2.	Rincian kamar
3.	Tanggal menginap
4.	Total biaya
- **Pembatalan dan Perubahan Reservasi (Cancellation & Modification)**: Pengguna dapat membatalkan atau mengubah data pemesanannya sesuai dengan ketentuan hotel, misalnya sebelum H-1 tanggal check-in
- **Opsi Pembayaran (Payment Options)**: Menyediakan beberapa metode pembayaran, seperti:
                                          1.	Transfer bank
                                          2.	Kartu kredit/debit
                                          3.	Pembayaran di tempat (cash on arrival)
- **Integrasi Kalender (Calendar Integration)**: Pengguna dapat menambahkan jadwal menginap ke kalender digital mereka (Google Calendar atau lainnya) agar tidak lupa tanggal reservasi

## Screenshoots

![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/c16b2bf9-5049-49a5-bb8c-9fff8a8b4a32)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/6bc14de1-7dee-4bd5-a27d-9a26cecaf2f1)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/0aadcb07-d116-4141-9b84-1b5345c8ca2a)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/15bc6d78-f56c-4680-bea4-052b41dc6b39)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/ecba58e9-69a2-46a5-83cf-917676f22853)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/ce3b8c94-fe5f-443d-af86-12e417751069)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/9c612d77-c27d-480d-8638-7bcb3752f45f)



## Tech Stack

**Framework:** Laravel, Bootstrap

**Database:** MySQL or sqlite


## Run Locally

Clone the project


```bash
  cd your-folder
  git clone https://github.com/Yosafat0804/Hotel-Holly-Web.git
```

Go to the project directory

```bash
  cd laravel-hotel-Holly-Web
```

Install Packages

```bash
  composer install
```
Copy .env.example to .env

```bash
  cp .env.example .env
```
Generate AppKey

```bash
  php artisan key:generate
```

Create a new database your-database-name
Open .env on your code editor and set the .env database config

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=root
DB_PASSWORD=
```

Migrate project to generate table

```bash
  php artisan migrate
```
After creating a table, we'll seeding database, run seed command

```bash
  php artisan db:seed
```
Run project

```bash
  php artisan serve
```

open your project locally : http://127.0.0.1:8000 (port and host adjust)


## Authors

- [@Yosafat0804](https://www.github.com/Yosafat0804)


