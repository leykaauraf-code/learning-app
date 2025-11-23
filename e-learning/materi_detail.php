<?php
// materi_detail_api.php
// Menampilkan detail materi dari Firebase (per-id)

$firebase_base = 'https://rest-api-latihan-33bf3-default-rtdb.asia-southeast1.firebasedatabase.app';

// ambil id dari query string
$id = isset($_GET['id']) ? trim($_GET['id']) : '';

if ($id === '') {
    echo "ID materi tidak diberikan. Gunakan ?id=<uid>";
    exit;
}

// helper ambil JSON via cURL
function fetch_json($url, $timeout = 6) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    $resp = curl_exec($ch);
    $err  = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($resp === false || ($code !== 200 && $code !== 204)) {
        return ['error' => true, 'message' => ($err ?: "HTTP status $code"), 'code' => $code, 'raw' => $resp];
    }

    $data = json_decode($resp, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return ['error' => true, 'message' => 'JSON decode error: ' . json_last_error_msg(), 'raw' => $resp];
    }
    return ['error' => false, 'data' => $data];
}

// build URL untuk id spesifik
$url = $firebase_base . '/users/' . urlencode($id) . '.json?print=pretty';
$res = fetch_json($url);

// default fallback jika tidak ada data materi
$material = null;
$error = null;
if ($res['error']) {
    $error = $res['message'] ?? 'Gagal mengambil data';
} else {
    $material = $res['data'];
    if (!is_array($material) || empty($material)) {
        $error = 'Materi/entri tidak ditemukan pada API untuk id ini.';
    }
}

// helper untuk mengekstrak possible fields (ada banyak kemungkinan nama field di users.json)
function get_field($arr, $keys, $default = '') {
    foreach ((array)$keys as $k) {
        if (isset($arr[$k]) && $arr[$k] !== null && $arr[$k] !== '') return $arr[$k];
    }
    return $default;
}

// kalau ada data, ambil field penting
$judul = $material ? get_field($material, ['judul','title','nama','judul_materi']) : '';
$deskripsi = $material ? get_field($material, ['deskripsi','description','summary','keterangan']) : '';
$isi = $material ? get_field($material, ['isi','content','bio','penjelasan']) : '';
$kategori = $material ? get_field($material, ['kategori','category','role']) : '';
$last_update = $material ? ( $material['last_update'] ?? $material['updated_at'] ?? '' ) : '';

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Detail Materi - <?= htmlspecialchars($judul ?: $id) ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{font-family:Poppins, sans-serif;background:#f5f7fa}
    .card{border-radius:12px}
    .mono{font-family:monospace}
  </style>
</head>
<body>
<div class="container py-4">


  <!-- header image lokal -->
  <div class="mb-3 text-center">
    <img src="/mnt/data/A_webpage_screenshot_of_an_e-learning_platform's_w.png" alt="Header" style="max-width:640px; width:100%; border-radius:10px; box-shadow:0 8px 24px rgba(0,0,0,0.08);">
  </div>

  <?php if ($error): ?>
    <div class="alert alert-warning">
      <?= htmlspecialchars($error) ?>
      <div class="mt-2"><a href="materi.php" class="btn btn-sm btn-secondary">Kembali ke daftar materi</a></div>
    </div>
  <?php else: ?>
    <div class="card p-4 mb-3">
      <h2><?= htmlspecialchars($judul ?: 'Tanpa Judul') ?></h2>
      <p class="text-muted mb-1">Kategori: <strong><?= htmlspecialchars($kategori ?: 'Umum') ?></strong></p>
      <?php if ($last_update): ?>
        <p class="text-muted small">Terakhir diperbarui: <?= htmlspecialchars($last_update) ?></p>
      <?php endif; ?>
      <hr>
      <?php if ($deskripsi): ?>
        <p class="lead"><?= nl2br(htmlspecialchars($deskripsi)) ?></p>
      <?php endif; ?>

      <div class="mt-3">
        <?php
        // jika isi mengandung HTML (trusted), tampilkan mentah. Jika tidak yakin, escape.
        if ($isi !== '') {
            // gunakan deteksi sederhana: jika ada tag <p> atau <h,anggap HTML
            if (strpos($isi, '<') !== false && (strip_tags($isi) !== $isi)) {
                echo $isi; // trusted HTML
            } else {
                echo '<p>' . nl2br(htmlspecialchars($isi)) . '</p>';
            }
        } else {
            echo '<p class="text-muted">Tidak ada isi materi lengkap.</p>';
        }
        ?>
      </div>

      <div class="mt-4 d-flex justify-content-between align-items-center">
        <div>
          <a href="materi.php" class="btn btn-outline-secondary">Kembali</a>
        </div>
        <div>
         
        </div>
      </div>
    </div>

  <?php endif; ?>

  <footer class="text-center text-muted mt-4">
    <p class="mb-0">Data diambil dari: <a href="<?= htmlspecialchars($url) ?>" target="_blank">API Firebase (per-id)</a></p>
  </footer>
</div>

</body>
</html>
