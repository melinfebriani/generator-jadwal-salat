# generator-jadwal-sholat

## Tata cara Instalasi dan alur pemakaian package generator-jadwal-sholat
<br>
<br>

Setelah membuat project Laravel baru, jalankan kode berikut :
<br>
```
composer require kelompok5/generator-jadwal-sholat
```
<br>

Lalu tambahkan pada app -> config -> providers
<br>
```
\Kelompok5\GeneratorJadwalSholat\ContactServiceProvider::class
```
<br>

Anda bisa mempublish views file dengan:
<br>
```
php artisan vendor:publish --tag=public --force
```
<br>

## USAGE
<br>
Setelah melakukan instal, maka akan terdirect ke JadwalSalat pada browser.
<br>
terdapat pada 
```
https://my-app.test/JadwalSalat
```
