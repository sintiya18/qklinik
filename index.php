<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Qlinic - Sistem Antrian Klinik</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: #e7f1ff;
        }

        /* hero*/
        .hero {
    min-height: 50vh;
    display: flex;
    justify-content: center;   /* tengah horizontal */
    align-items: center;       /* tengah vertical */
    text-align: center;
    padding: 120px 20px 60px;
}

        .hero h1 {
            font-size: 44px;
            font-weight: 700;
            color: #0d6efd;
            margin-top: 10px;
        }

        .hero p {
            font-size: 18px;
            color: #6c757d;
            max-width: 600px;
            margin: 10px auto;
        }
  

        /* logo */
        .hero-img {
            max-width: 160px;
            margin-bottom: 10px;
        }

        /* btn */
        .btn-custom {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .btn-primary-custom {
            background: #0d6efd;
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            background: #0b5ed7;
            color: white;
        }

        .btn-outline-custom {
            border: 2px solid #0d6efd;
            color: #0d6efd;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: #0d6efd;
            color: white;
        }

        /* section */
        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            font-weight: 700;
            margin-bottom: 50px;
        }

        /* fitur */
        .fitur {
            background: #f8f9fa;
        }

        .fitur-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(0,0,0,0.08);
            transition: 0.3s;
            text-align: center;
            height: 100%;
        }

        .fitur-card:hover {
            transform: translateY(-6px);
        }

        .fitur-card h5 {
            font-weight: 600;
        }

        /* about */
        .about p {
            max-width: 700px;
            margin: auto;
            color: #6c757d;
            text-align: center;
        }

        /* footer*/
        .footer {
            background: #0d6efd;
            color: white;
            text-align: center;
            padding: 18px;
        }
    </style>
</head>

<body>

<!-- HERO -->
<section class="hero">
    <div class="container">

        <img src="assets/img/logo.png" alt="Qlinic Logo" class="hero-img">

     
        <h1>Sistem Antrian Klinik </h1>
        <p>
            Antrian lebih cepat, pelayanan lebih efisien tanpa harus menunggu lama di klinik.
        </p>

      
        <div class="mt-4">
            <a href="auth/register.php" class="btn-custom btn-primary-custom me-2">
                Daftar
            </a>

            <a href="auth/login.php" class="btn-custom btn-outline-custom">
                Login
            </a>
        </div>

    </div>
</section>


<section class="fitur">
    <div class="container">
        <h2 class="section-title">Fitur Unggulan</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="fitur-card">
                    <h5>📲 Antrian Online</h5>
                    <p>Ambil nomor tanpa harus datang langsung ke klinik.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="fitur-card">
                    <h5>⚡ Cepat & Efisien</h5>
                    <p>Mengurangi waktu tunggu pasien secara signifikan.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="fitur-card">
                    <h5>📊 Real-time</h5>
                    <p>Pantau antrian secara langsung dan akurat.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about">
    <div class="container">
        <h2 class="section-title">Tentang Qlinic</h2>
        <p>
            Qlinic adalah sistem antrian digital yang membantu klinik dalam mengatur pelayanan pasien
            secara modern, cepat, dan efisien tanpa antrian panjang.
        </p>
    </div>
</section>


<div class="footer">
    <p class="mb-0">© 2026 Qlinic - Sistem Antrian Klinik</p>
</div>

</body>
</html>