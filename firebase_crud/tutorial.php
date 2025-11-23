<?php
// tutorial_api.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tutorial API Firebase REST</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background: #f8f9fa; font-family: Poppins, sans-serif; padding: 30px;}
    h1, h2, h3 { color: #004ecc; }
    pre { background: #e9ecef; padding: 15px; border-radius: 8px; font-size: 0.9rem; overflow-x: auto;}
    code { font-family: monospace; }
    a { color: #0066ff; }
    a:hover { color: #004ecc; text-decoration: underline; }
  </style>
</head>
<body>
<div class="container">
  <h1 class="mb-4">Tutorial API Firebase REST untuk Materi Pembelajaran</h1>

  <section class="mb-4">
    <h2>1. Apa itu Firebase Realtime Database REST API?</h2>
    <p>Firebase menyediakan API berbasis HTTP (REST) untuk mengakses data Realtime Database. Kamu bisa mengambil, menambahkan, mengubah, atau menghapus data dengan metode HTTP seperti GET, PUT, POST, PATCH, DELETE.</p>
  </section>

  <section class="mb-4">
    <h2>2. URL Endpoint API</h2>
    <p>Format dasar URL Firebase REST API:</p>
    <pre><code>https://[PROJECT_ID].firebaseio.com/[PATH].json</code></pre>
    <p>Contoh endpoint untuk materi:</p>
    <pre><code>https://rest-api-latihan-33bf3-default-rtdb.asia-southeast1.firebasedatabase.app/users.json</code></pre>
  </section>

  <section class="mb-4">
    <h2>3. Mengambil Data Materi dengan HTTP GET</h2>
    <p>Untuk mengambil semua data materi, kamu cukup kirim request GET ke URL API dengan ekstensi <code>.json</code>. Firebase akan mengembalikan data dalam format JSON.</p>
    <p>Contoh respons:</p>
    <pre><code>{
  "abc123": {
    "judul": "Materi Matematika Dasar",
    "deskripsi": "Pengantar matematika untuk pemula",
    "isi": "Konten lengkap materi matematika",
    "kategori": "Matematika"
  },
  "def456": {
    "judul": "Fisika Dasar",
    "deskripsi": "Pengantar fisika dan konsep dasar",
    "isi": "Konten lengkap materi fisika",
    "kategori": "Fisika"
  }
}</code></pre>
  </section>

  <section class="mb-4">
    <h2>4. Contoh Kode PHP untuk Mengambil Data</h2>
    <pre><code>&lt;?php
function fetch_json($url, $timeout = 6) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
  $resp = curl_exec($ch);
  $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($resp === false || ($code !== 200 && $code !== 204)) {
    return ['error' => true, 'message' => "HTTP status $code"];
  }

  $data = json_decode($resp, true);
  if (json_last_error() !== JSON_ERROR_NONE) {
    return ['error' => true, 'message' => 'JSON decode error: ' . json_last_error_msg()];
  }
  return ['error' => false, 'data' => $data];
}

// URL API Firebase
$firebase_url = 'https://rest-api-latihan-33bf3-default-rtdb.asia-southeast1.firebasedatabase.app/users.json';

// Ambil data
$result = fetch_json($firebase_url);
if (!$result['error']) {
  print_r($result['data']);
} else {
  echo "Error: " . $result['message'];
}
?&gt;</code></pre>
  </section>

  <section class="mb-4">
    <h2>5. Struktur Data di Firebase</h2>
    <p>Firebase menyimpan data dalam struktur JSON berjenjang. Contohnya:</p>
    <pre><code>{
  "users": {
    "uid1": {
      "judul": "Materi 1",
      "deskripsi": "Deskripsi materi 1",
      "isi": "Isi lengkap materi 1",
      "kategori": "Kategori A"
    },
    "uid2": {
      "judul": "Materi 2",
      "deskripsi": "Deskripsi materi 2",
      "isi": "Isi lengkap materi 2",
      "kategori": "Kategori B"
    }
  }
}</code></pre>
    <p>Setiap item materi diindeks oleh <code>uid</code> unik sebagai key.</p>
  </section>

  <section class="mb-4">
    <h2>6. Operasi Lain dengan Firebase REST API</h2>
    <ul>
      <li><strong>POST</strong>: Menambahkan data baru (otomatis generate key unik).</li>
      <li><strong>PUT</strong>: Mengubah data pada path tertentu.</li>
      <li><strong>PATCH</strong>: Memperbarui sebagian data.</li>
      <li><strong>DELETE</strong>: Menghapus data pada path tertentu.</li>
    </ul>
    <p>Untuk operasi ini, biasanya diperlukan <em>authentication token</em> agar aman.</p>
  </section>

  <section class="mb-4">
    <h2>7. Keamanan dan Autentikasi</h2>
    <p>Jika database Firebase kamu private, kamu perlu menambahkan <code>?auth=[TOKEN]</code> di URL API untuk akses dengan token autentikasi.</p>
    <p>Contoh:</p>
    <pre><code>https://yourproject.firebaseio.com/users.json?auth=eyJhbGciOiJIUzI1NiIsInR5cCI...</code></pre>
  </section>

  <section class="mb-4">
    <h2>8. Kesimpulan</h2>
    <p>Firebase REST API memudahkan integrasi data realtime database dengan aplikasi PHP atau bahasa lain menggunakan HTTP standar.</p>
    <p>Kamu cukup mengirim request HTTP ke endpoint JSON Firebase dan memproses data JSON yang diterima.</p>
  </section>

  <footer class="text-center text-muted mt-5">
    <p>© <?= date('Y'); ?> E-Learning. Tutorial API dibuat dengan ❤️</p>
  </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
