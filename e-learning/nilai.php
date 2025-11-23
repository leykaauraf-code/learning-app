<?php
// nilai.php (menggunakan PDO)
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: materi.php');
    exit;
}

$jawaban = isset($_POST['jawaban']) && is_array($_POST['jawaban']) ? $_POST['jawaban'] : [];
$questions = isset($_POST['questions']) && is_array($_POST['questions']) ? $_POST['questions'] : [];

if (empty($questions)) {
    echo "Tidak ada soal dikirim. <a href='materi.php'>Kembali</a>";
    exit;
}

// Ambil kunci jawaban untuk soal-soal yang dikirim
// siapkan placeholders untuk PDO IN
$placeholders = implode(',', array_fill(0, count($questions), '?'));
$sql = "SELECT id, jawaban_benar FROM kuis WHERE id IN ($placeholders)";
$stmt = $pdo->prepare($sql);
$stmt->execute($questions);
$kunciRows = $stmt->fetchAll();

// buat array id => jawaban_benar
$kunci = [];
foreach ($kunciRows as $r) {
    $kunci[$r['id']] = strtoupper(trim($r['jawaban_benar']));
}

// hitung skor
$total = count($kunci);
$benar = 0;
$dijawab = 0;
$detail = [];

foreach ($kunci as $id => $jawaban_benar) {
    if (isset($jawaban[$id])) {
        $dijawab++;
        $userAns = strtoupper(trim($jawaban[$id]));
        $isCorrect = ($userAns === $jawaban_benar) ? 1 : 0;
        if ($isCorrect) $benar++;
        $detail[$id] = [
            'user' => $userAns,
            'kunci' => $jawaban_benar,
            'benar' => $isCorrect
        ];
    } else {
        $detail[$id] = [
            'user' => null,
            'kunci' => $jawaban_benar,
            'benar' => 0
        ];
    }
}

$nilai = $total > 0 ? ($benar / $total) * 100 : 0;
$nilai_format = number_format($nilai, 2);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kuis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3>Hasil Kuis</h3>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Total Soal:</strong> <?= $total ?></p>
            <p><strong>Terjawab:</strong> <?= $dijawab ?></p>
            <p><strong>Benar:</strong> <?= $benar ?></p>
            <h4 class="mt-3">Nilai: <?= $nilai_format ?> / 100</h4>
        </div>
    </div>

    <h5>Rangkuman Jawaban</h5>
    <div class="list-group mb-3">
        <?php
        // ambil pertanyaan untuk menampilkan teks pertanyaan (opsional)
        $ids = array_keys($kunci);
        if (!empty($ids)) {
            $ph = implode(',', array_fill(0, count($ids), '?'));
            $q = $pdo->prepare("SELECT id, pertanyaan FROM kuis WHERE id IN ($ph) ORDER BY id ASC");
            $q->execute($ids);
            $qs = $q->fetchAll();
            $qsMap = [];
            foreach ($qs as $r) $qsMap[$r['id']] = $r['pertanyaan'];
        } else {
            $qsMap = [];
        }

        foreach ($kunci as $id => $k) {
            $rowq = isset($qsMap[$id]) ? $qsMap[$id] : '(pertanyaan tidak ditemukan)';
            $u = $detail[$id]['user'] ?? '-';
            $ok = $detail[$id]['benar'] ? 'Benar' : 'Salah';
            ?>
            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1"><?= nl2br(htmlspecialchars($rowq)) ?></h6>
                    <small><?= $ok ?></small>
                </div>
                <p class="mb-1">Jawaban Anda: <?= htmlspecialchars($u ?: '-') ?> — Kunci: <?= htmlspecialchars($k) ?></p>
            </div>
        <?php } ?>
    </div>

    <a href="materi.php" class="btn btn-secondary">Kembali ke Materi</a>
    <a href="kuis.php?materi_id=<?= isset($_GET['materi_id']) ? (int)$_GET['materi_id'] : '' ?>" class="btn btn-primary">Ulangi Kuis</a>
</div>
</body>
</html>
