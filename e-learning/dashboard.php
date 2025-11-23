<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-Learning - Selamat Datang</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background: #f0f4ff;
            font-family: "Poppins", sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        nav {
            background: #0056d2;
            padding: 10px 0;
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.15);
        }
        nav .navbar-brand, nav .nav-link, nav .btn-logout {
            color: #fff;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        nav .nav-link:hover, nav .btn-logout:hover {
            color: #cce4ff;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #0066ff 0%, #00c2ff 100%);
            color: white;
            padding: 80px 20px;
            border-radius: 20px;
            text-align: center;
            margin: 40px auto 50px auto;
            max-width: 900px;
            box-shadow: 0 12px 30px rgba(0, 102, 255, 0.4);
        }
        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .hero p {
            font-size: 20px;
            font-weight: 400;
            opacity: 0.9;
        }

        /* Feature Cards Container */
        .features-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            max-width: 900px;
            margin: 0 auto 80px auto;
            flex-wrap: wrap;
            padding: 0 15px;
        }

        /* Feature Cards */
        .feature-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px 25px;
            box-shadow: 0 6px 20px rgb(0 0 0 / 0.1);
            flex: 1 1 300px;
            max-width: 350px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 14px 40px rgb(0 102 255 / 0.3);
        }

        .feature-card img {
            width: 80px;
            margin-bottom: 25px;
        }

        .feature-card h4 {
            font-weight: 700;
            margin-bottom: 15px;
            color: #004ecc;
            font-size: 22px;
        }

        .feature-card p {
            color: #555;
            font-size: 16px;
            margin-bottom: 25px;
            min-height: 60px;
        }

        .feature-card a.btn {
            background: #0066ff;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            color: white;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        .feature-card a.btn:hover {
            background: #004ecc;
            color: #e6f0ff;
        }

        /* Footer */
        footer {
            margin-top: auto;
            background: #ffffff;
            padding: 15px 0;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="#" class="navbar-brand">E-Learning</a>
        <a href="logout.php" class="btn btn-logout">Logout</a>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <h1>Selamat Datang di E-Learning</h1>
    <p>Belajar jadi lebih mudah, cepat, dan menyenangkan.</p>
</div>

<!-- Fitur Aplikasi -->
<h2 class="text-center mb-4" style="color:#004ecc;">Fitur Aplikasi</h2>
<div class="features-container">
    <div class="feature-card" onclick="location.href='materi.php';" role="button" tabindex="0">
        <img src="https://img.icons8.com/fluency/96/reading.png" alt="Materi Belajar" />
        <h4>Materi Belajar</h4>
        <p>Akses berbagai materi pembelajaran secara mudah dan gratis.</p>
        <a href="materi.php" class="btn">Buka Materi</a>
    </div>

    <div class="feature-card" onclick="location.href='kuis.php';" role="button" tabindex="0">
        <img src="https://img.icons8.com/fluency/96/combo-chart.png" alt="Kuis Interaktif" />
        <h4>Kuis Interaktif</h4>
        <p>Uji pemahaman Anda dengan kuis interaktif</p>
        <a href="kuis.php" class="btn">Lihat Progress</a>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>© <?= date('Y'); ?> E-Learning. Dikembangkan dengan ❤️</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
