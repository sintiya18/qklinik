<?php 
$role = $_SESSION['role'] ?? null;
$page = basename($_SERVER['PHP_SELF']);
?>


<div class="sidebar" id="sidebar">

    <div class="sidebar-title">MENU</div>

    <a href="dashboard.php" class="<?= $page=='dashboard.php'?'active':'' ?>">📊 Dashboard</a>

    <?php if($role == 'admin'){ ?>
        <a href="users.php" class="<?= $page=='users.php'?'active':'' ?>">👤 User</a>
    <?php } ?>

    <?php if($role == 'petugas'){ ?>
        <a href="antrian.php" class="<?= $page=='antrian.php'?'active':'' ?>">📋 Antrian</a>
    <?php } ?>

    <?php if($role == 'pasien'){ ?>
        <a href="tambah_antrian.php" class="<?= $page=='tambah_antrian.php'?'active':'' ?>">➕ Ambil Antrian</a>
    <?php } ?>

    <hr>

    <a href="../auth/logout.php" class="logout">🚪 Logout</a>

</div>