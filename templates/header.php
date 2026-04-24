<?php 
include __DIR__ . '/../functions/auth.php';
cekLogin();

$nama = $_SESSION['nama'] ?? 'User';
$role = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Qlinic</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .custom-navbar {
            background: #0d6efd;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;

            /* efek modern */
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .menu-toggle {
            font-size: 22px;
            cursor: pointer;
            margin-right: 15px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            font-size: 18px;
        }

        .navbar-brand img {
            height: 35px;
            width: 35px;
            object-fit: contain;
        }

        .navbar-user {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .user-badge {
            background: rgba(255,255,255,0.2);
            padding: 5px 10px;
            border-radius: 20px;
        }

        body {
            padding-top: 60px;
        }

        /* responsive*/
        @media (max-width: 576px) {
            .navbar-user span,
            .navbar-user .nama-user {
                display: none;
            }

            .navbar-brand span {
                display: none;
            }
        }
    </style>
</head>

<body>

<!-- header -->
<nav class="custom-navbar">

    <!-- toglesidebar -->
    <span class="menu-toggle" onclick="toggleSidebar()">☰</span>

    <!-- logo-->
    <div class="navbar-brand">
        <img src="../assets/img/logo.png" alt="Logo">
        <span>Qklinik</span>
    </div>

    <!-- user info -->
    <div class="navbar-user">
        <span class="user-badge">
            <?= htmlspecialchars($role) ?>
        </span>

        <i class="bi bi-person-circle"></i>

        <span class="nama-user">
            <?= htmlspecialchars($nama) ?>
        </span>
    </div>

</nav>


<?php if(isset($_GET['msg'])){ ?>
<div class="alert alert-success text-center m-0">
    <?php
    if($_GET['msg']=='ambil') echo "Berhasil ambil antrian!";
    if($_GET['msg']=='update') echo "Status berhasil diupdate!";
    ?>
</div>
<?php } ?>