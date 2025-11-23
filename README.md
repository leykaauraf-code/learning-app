# Aplikasi E-Learning Materi Pembelajaran dengan Firebase REST API

Aplikasi web sederhana untuk menampilkan dan mengelola materi pembelajaran menggunakan PHP dan Firebase Realtime Database via REST API.

---

## Fitur

- Menampilkan daftar materi belajar (Read)
- Menambah materi baru (Create)
- Mengubah materi (Update)
- Menghapus materi (Delete)
- Pencarian dan filter kategori materi
- Pagination daftar materi

---

## Teknologi yang Digunakan

- PHP 7.x atau lebih tinggi
- Firebase Realtime Database (REST API)
- Bootstrap 5 untuk tampilan frontend
- cURL di PHP untuk request HTTP ke Firebase

---

## Persiapan Firebase

1. Buat project Firebase di [https://console.firebase.google.com/](https://console.firebase.google.com/).
2. Aktifkan Realtime Database, atur aturan aksesnya sesuai kebutuhan (misal untuk testing bisa gunakan):
    ```json
    {
      "rules": {
        ".read": true,
        ".write": true
      }
    }
    ```
    tapi untuk produksi wajib menggunakan autentikasi.
3. Salin URL database realtime:
https://rest-api-latihan-33bf3-default-rtdb.asia-southeast1.firebasedatabase.app/users.json?print=pretty
untuk endpoint koleksi data materi.

DATABASE LOKAL

## Instalasi dan Setup Aplikasi Lokal

1. Pastikan kamu menggunakan webserver dengan PHP (XAMPP, WAMP, LAMP, atau built-in PHP server).
2. Pastikan ekstensi cURL PHP aktif (`php_curl`).
3. Clone atau download project ini ke folder webserver kamu.
4. Buka file PHP seperti `materi.php`, `materi_crud.php`, dan sesuaikan URL Firebase di variabel `$firebase_base_url` dengan URL Firebase milikmu.
5. Jalankan aplikasi di browser melalui localhost.

---

## Struktur File Penting

- `materi.php`  
Menampilkan daftar materi dengan fitur pencarian, filter, dan pagination.

- `materi_crud.php`  
Form tambah, edit, dan hapus materi dengan operasi Create, Update, Delete via Firebase REST API.

- `tutorial_api.php`  
Halaman tutorial penggunaan Firebase REST API dalam aplikasi.

- `logout.php` / `login.php` (opsional)  
Jika ada fitur login/authentication.

---

## Cara Menggunakan

- Buka `materi.php` untuk melihat daftar materi.
- Klik tombol **Tambah Materi Baru** untuk membuat materi baru.
- Gunakan tombol **Edit** untuk memperbarui materi.
- Gunakan tombol **Hapus** untuk menghapus materi.
- Gunakan fitur pencarian dan filter kategori untuk mempersempit daftar materi.

---

## Catatan

- Pastikan aturan keamanan Firebase diatur agar data tidak bisa diakses sembarangan (untuk produksi).
- Operasi Create, Update, Delete dilakukan via HTTP cURL di PHP, sehingga server harus punya izin akses internet.
- Jika butuh autentikasi Firebase (token), tambahkan token di URL API sebagai parameter `?auth=YOUR_TOKEN`.

---

## Contoh Endpoint API

| Operasi  | HTTP Method | Endpoint                             | Keterangan                   |
| -------- | ----------- | ---------------------------------- | --------------------------- |
| Create   | POST        | `/users.json`                      | Tambah data materi baru     |
| Read     | GET         | `/users.json`                      | Ambil semua materi          |
| Read     | GET         | `/users/{id}.json`                 | Ambil materi per ID         |
| Update   | PUT / PATCH | `/users/{id}.json`                 | Ubah materi berdasarkan ID  |
| Delete   | DELETE      | `/users/{id}.json`                 | Hapus materi berdasarkan ID |

---

## Lisensi

Aplikasi ini disediakan tanpa garansi. Bebas digunakan dan dikembangkan lebih lanjut.

---

## Kontak

Untuk bantuan dan pengembangan lebih lanjut, silakan hubungi:

- Nama: [Nama Anda]  
- Email: [email@domain.com]  
- GitHub: [https://github.com/username](https://github.com/username)

---

Terima kasih telah menggunakan aplikasi ini!  
Semoga bermanfaat untuk pembelajaran dan pengembangan kamu.


