# Jazzlyn_TechChallenge_Authentication_02

Berikut adalah proyek Laravel 12 untuk RnD BNCC Tech Challenge Authentication.

## 💡 Fitur
- Login dan Register menggunakan Laravel Passport
- Otentikasi user melalui RESTful API
- Halaman Login dan Register berbasis View (Blade)
- Dashboard sederhana setelah login
- Logout menggunakan metode API (token-based)
- Terhubung dengan database MySQL
- Validasi input dan penanganan error yang user-friendly
- Dokumentasi pengujian API menggunakan Postman

## 📂 Struktur
- Endpoint Web berada di `routes/web.php`
- Endpoint API berada di `routes/api.php`
- Controller untuk Web View berada di `app/Http/Controllers/AuthController.php`
- Controller untuk API berada di `app/Http/Controllers/Api/AuthApiController.php`
- Model User berada di `app/Models/User.php`
- Halaman Blade (`login`, `register`, `dashboard`) berada di `resources/views/`

## 📄 Dokumentasi
File dokumentasi hasil testing API menggunakan Postman tersedia dalam file PDF:
`Dokumentasi_API_Laravel_RnD_Authentication.pdf`
