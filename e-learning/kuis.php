<?php
// kuis.php (menggunakan PDO dari koneksi.php)
require_once 'koneksi.php';

$materi_id = isset($_GET['materi_id']) ? (int) $_GET['materi_id'] : 1;

// ambil soal untuk materi_id
$stmt = $pdo->prepare("SELECT id, pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d FROM kuis WHERE materi_id = :mid ORDER BY id ASC");
$stmt->execute(['mid' => $materi_id]);
$soal = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kuis Pengantar Sistem Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h3 class="mb-4">Kuis Pengantar Sistem Informasi</h3>

    <?php if (empty($soal)): ?>
        <div class="alert alert-warning">Belum ada soal untuk materi ini.</div>
        <a href="materi.php" class="btn btn-secondary">Kembali</a>
        <?php exit; ?>
    <?php endif; ?>

    <form method="POST" action="nilai.php">
        <?php $no = 1; foreach ($soal as $row): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p><strong><?php echo $no++; ?>. <?php echo nl2br(htmlspecialchars($row['pertanyaan'])); ?></strong></p>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="q<?= $row['id'] ?>A" name="jawaban[<?= $row['id'] ?>]" value="A">
                        <label class="form-check-label" for="q<?= $row['id'] ?>A">A. <?= htmlspecialchars($row['pilihan_a']) ?></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="q<?= $row['id'] ?>B" name="jawaban[<?= $row['id'] ?>]" value="B">
                        <label class="form-check-label" for="q<?= $row['id'] ?>B">B. <?= htmlspecialchars($row['pilihan_b']) ?></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="q<?= $row['id'] ?>C" name="jawaban[<?= $row['id'] ?>]" value="C">
                        <label class="form-check-label" for="q<?= $row['id'] ?>C">C. <?= htmlspecialchars($row['pilihan_c']) ?></label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="q<?= $row['id'] ?>D" name="jawaban[<?= $row['id'] ?>]" value="D">
                        <label class="form-check-label" for="q<?= $row['id'] ?>D">D. <?= htmlspecialchars($row['pilihan_d']) ?></label>
                    </div>

                    <!-- kirim daftar soal ke nilai.php supaya kita bisa ambil kunci jawaban dari DB -->
                    <input type="hidden" name="questions[]" value="<?= $row['id'] ?>">
                </div>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
        <a href="materi.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
