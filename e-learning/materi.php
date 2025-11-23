<?php
// materi.php - ambil daftar materi dari Firebase REST API dan tampilkan
$firebase_url = 'https://rest-api-latihan-33bf3-default-rtdb.asia-southeast1.firebasedatabase.app/users.json?print=pretty';

// helper ambil json (cURL)
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
        return ['error' => true, 'message' => ($err ?: "HTTP status $code")];
    }

    $data = json_decode($resp, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return ['error' => true, 'message' => 'JSON decode error: ' . json_last_error_msg()];
    }
    return ['error' => false, 'data' => $data];
}

$result = fetch_json($firebase_url);



// proses data dari firebase (ubah struktur menjadi list materi)
$materials = [];
if (!$result['error'] && is_array($result['data'])) {
    // Firebase returns associative array keyed by uid/key.
    // Kita coba deteksi objek yang menyerupai materi: punya judul/title atau summary/deskripsi.
    foreach ($result['data'] as $key => $item) {
        if (!is_array($item)) continue;

        // detect possible title field
        $title = $item['judul'] ?? $item['title'] ?? $item['nama'] ?? null;
        $desc  = $item['deskripsi'] ?? $item['description'] ?? $item['summary'] ?? $item['keterangan'] ?? null;
        $content = $item['isi'] ?? $item['content'] ?? $item['bio'] ?? null;
        $category = $item['kategori'] ?? $item['category'] ?? ($item['role'] ?? null);

        // We'll treat entries that have title + (deskripsi or content) as materi candidates
        if ($title && ($desc || $content)) {
            $materials[] = [
                'id' => $key,
                'judul' => $title,
                'deskripsi' => $desc ?? '',
                'isi' => $content ?? '',
                'kategori' => $category ?? 'Umum',
                'raw' => $item
            ];
        }
    }
}

// jika tidak ada materi hasil parse, gunakan sample
if (empty($materials)) {
    $materials = $sample_materi;
}

// pencarian & filter kategori dari query params
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
$categoryFilter = isset($_GET['category']) ? trim($_GET['category']) : '';

// filter
$filtered = array_filter($materials, function($m) use ($search, $categoryFilter) {
    if ($search !== '') {
        $q = strtolower($search);
        if (strpos(strtolower($m['judul'] ?? ''), $q) === false && strpos(strtolower($m['deskripsi'] ?? ''), $q) === false) {
            return false;
        }
    }
    if ($categoryFilter !== '' && strtolower($categoryFilter) !== strtolower($m['kategori'])) {
        return false;
    }
    return true;
});

// pagination sederhana
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$perPage = 6;
$total = count($filtered);
$pages = (int)ceil($total / $perPage);
$offset = ($page - 1) * $perPage;
$paged = array_slice(array_values($filtered), $offset, $perPage);

// ambil daftar kategori unik untuk dropdown
$cats = [];
foreach ($materials as $m) {
    $cats[] = $m['kategori'] ?? 'Umum';
}
$cats = array_values(array_unique($cats));

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Materi - E-Learning (API)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#f5f7fa; font-family:Poppins, sans-serif; }
    .card-materi { border-radius:12px; }
    .mono { font-family: monospace; font-size:0.9rem; }
  </style>
</head>
<body>
<div class="container py-4">
    <a href="dashboard.php" class="btn btn-link mb-3">← Kembali</a>

    <div class="d-flex align-items-center mb-3 gap-3">
        <h2 class="mb-0">Materi Pembelajaran (via API)</h2>
        <small class="text-muted">Sumber: Firebase REST API</small>
    </div>

    <!-- optional local header image (use your uploaded file path) -->
    <div class="mb-3 text-center">
        <img src="/mnt/data/A_webpage_screenshot_of_an_e-learning_platform%27s_w.png" alt="Header" style="max-width:420px; width:100%; border-radius:10px; box-shadow:0 8px 24px rgba(0,0,0,0.08);">
    </div>

    <form class="row g-2 mb-3" method="get" action="materi.php">
        <div class="col-md-6">
            <input type="search" name="q" class="form-control" placeholder="Cari judul atau deskripsi..." value="<?= htmlspecialchars($search) ?>">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-select">
                <option value="">Semua Kategori</option>
                <?php foreach ($cats as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>" <?= $categoryFilter===$c ? 'selected' : '' ?>><?= htmlspecialchars($c) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3 d-flex">
            <button class="btn btn-primary me-2">Cari</button>
            <a href="materi.php" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <div class="row g-4">
        <?php if (empty($paged)): ?>
            <div class="col-12">
                <div class="alert alert-info">Tidak ada materi ditemukan.</div>
            </div>
        <?php endif; ?>

        <?php foreach ($paged as $m): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card card-materi p-3 h-100">
                    <h5><?= htmlspecialchars($m['judul'] ?? 'Tanpa Judul') ?></h5>
                    <p class="text-muted"><?= htmlspecialchars(mb_strimwidth($m['deskripsi'] ?? '-', 0, 120, '...')) ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="badge bg-secondary"><?= htmlspecialchars($m['kategori'] ?? 'Umum') ?></span>
                        <div>
                            <a href="materi_detail.php?id=<?= urlencode($m['id']) ?>" class="btn btn-outline-primary btn-sm">Baca</a>
                           
                            
                        </div>
                    </div>
                    <!-- debug raw (jika ingin melihat data mentah dari firebase) -->
                    <!-- <pre class="mono small"><?= htmlspecialchars(json_encode($m['raw'] ?? [], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE)) ?></pre> -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- pagination -->
    <?php if ($pages > 1): ?>
    <nav class="mt-4" aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php for ($i=1;$i<=$pages;$i++): ?>
                <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                    <a class="page-link" href="?q=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <?php endif; ?>

    <footer class="text-center mt-4 text-muted">
        Data diambil dari API: <a href="<?= htmlspecialchars($firebase_url) ?>" target="_blank">Firebase REST API</a>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
