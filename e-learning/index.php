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
            background: #f5f7fa;
            font-family: "Poppins", sans-serif;
        }

        /* Navbar */
        .navbar-custom {
            background: #0066ff;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
            font-weight: 600;
        }
        .navbar-custom .nav-link:hover {
            color: #cce4ff;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #0066ff 0%, #00c2ff 100%);
            color: white;
            padding: 80px 20px;
            border-radius: 20px;
            text-align: center;
            margin-top: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .hero h1 {
            font-size: 42px;
            font-weight: 700;
        }
        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .btn-custom {
            border-radius: 30px;
            padding: 12px 35px;
            font-size: 18px;
            font-weight: 600;
        }
        .btn-custom-light {
            background: #ffffff;
            color: #0066ff;
            transition: 0.3s;
        }
        .btn-custom-light:hover {
            background: #e6e6e6;
            color: #004fcc;
        }

        /* Features Section */
        .features {
            margin-top: 60px;
            margin-bottom: 60px;
        }
        .feature-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }
        .feature-box:hover {
            transform: translateY(-10px);
        }
        .feature-icon {
            font-size: 48px;
            color: #0066ff;
            margin-bottom: 20px;
        }
        .feature-title {
            font-weight: 700;
            margin-bottom: 10px;
        }
        .feature-desc {
            font-size: 16px;
            color: #555;
        }

        /* Testimoni Section */
        .testimoni {
            background: #e6f2ff;
            padding: 50px 20px;
            border-radius: 15px;
            margin-bottom: 60px;
        }
        .testimoni p {
            font-style: italic;
            font-size: 18px;
            color: #004fcc;
        }
        .testimoni .author {
            margin-top: 15px;
            font-weight: 600;
            color: #003366;
        }

        /* Footer */
        footer {
            margin-top: 40px;
            background: #ffffff;
            padding: 15px 0;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #666;
        }
    </style>

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">E-Learning</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Register.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <!-- HERO SECTION -->
    <div class="hero">
        <h1>Selamat Datang di E-Learning</h1>
        <p>Belajar jadi lebih mudah, cepat, dan menyenangkan.</p>

        <div class="mt-4">
            
        </div>
    </div>

    <!-- FEATURES SECTION -->
    <section id="features" class="features row text-center">
        <div class="col-md-4 mb-4">
            <div class="feature-box h-100">
                <div class="feature-icon"><i class="bi bi-speedometer2"></i></div>
                <h3 class="feature-title">Belajar Fleksibel</h3>
                <p class="feature-desc">Akses materi kapan saja dan di mana saja sesuai waktu Anda.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-box h-100">
                <div class="feature-icon"><i class="bi bi-journal-text"></i></div>
                <h3 class="feature-title">Materi Lengkap</h3>
                <p class="feature-desc">Materi pembelajaran lengkap dan terstruktur dengan baik.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-box h-100">
                <div class="feature-icon"><i class="bi bi-people"></i></div>
                <h3 class="feature-title">Interaksi Mudah</h3>
                <p class="feature-desc">Forum diskusi dan komunikasi langsung dengan pengajar.</p>
            </div>
        </div>
    </section>

    <!-- TESTIMONI SECTION -->
    <section id="testimoni" class="testimoni text-center">
        <p>"Platform E-Learning ini sangat membantu saya dalam memahami materi dengan cara yang menyenangkan dan interaktif."</p>
        <div class="author">- Andi, Mahasiswa Teknik Informatika</div>
    </section>

</div>

<!-- FOOTER -->
<footer class="text-center">
    <p>© <?= date('Y'); ?> E-Learning. Dikembangkan dengan ❤️</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
