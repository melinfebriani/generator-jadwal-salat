# generator-jadwal-sholat

## Tata cara Instalasi dan alur pemakaian package JadwalSalat
<br>
<br>

Setelah membuat project Laravel baru, jalankan kode berikut :
<br>
```
composer require kelompok5/generator-jadwal-sholat
```
<br>

Lalu tambahkan pada app -> config -> providers
\Kelompok5\GeneratorJadwalSholat\ContactServiceProvider::class

Anda bisa mempublish config file dengan:
php artisan vendor:publish --tag=public --force

## USAGE
<br>
Setelah melakukan instal, maka akan terdirect ke JadwalSalat pada browser.
<br>
terdapat pada 
```
https://my-app.test/JadwalSalat
```
