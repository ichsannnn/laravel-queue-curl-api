# Laravel Queue API
Mengambil data melalui API dengan total data yang banyak, lalu dimasukan kedalam antrian.

## Instalasi
* Buka terminal linux
* Jalankan perintah berikut untuk mendownload project
```bash
$ git clone https://github.com/skadevz/laravel-queue-curl-api.git
```
* Masuk kedalam direktori project melalui terminal
* Jalankan perintah berikut untuk persiapan awal, dan mendowload _package_ yang diperlukan
```bash
$ cp .env.example .env
$ composer install
$ php artisan key:generate
```
* Buka file .env menggunakan _text editor_, sesuaikan pengaturan database, dengan pengaturan yang dimiliki
* Ubah *QUEUE_DRIVER* pada file env dari *sync* menjadi *database*
* Kemudian jalankan perintah berikut untuk melakukan _migrate_ database
```bash
$ php artisan migrate
```
* Terkahir, jalankan aplikasi.


## Penggunaan
* Buka browser dan jalankan link berikut
```bash
$ http://localhost/laravel-queue-curl-api/public/api/get-coin
```
* Setelelah link dijalankan, akan muncul tulisan **Queue added.** Itu berarti daftar antrian dari API sudah dimasukan ke _table jobs_.
* Gunakan perintah berikut untuk menjalankan antrian, dan memasukan data ke _table coin_
```bash
$ php artisan queue:work
```
* Atau perintah berikut untuk menjalankan hanya satu antrian saja
```bash
$ php artisan queue:work --once
```
