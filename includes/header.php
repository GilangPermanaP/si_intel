<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sekolah Insan Teladan - Menumbuhkan Generasi Penerus Bangsa Yang Cerdas, Peduli, Berkarakter Baik Berdasarkan Nilai-Nilai Kemanusiaan dan Menjadi Manusia Seutuhnya">
    <meta name="keywords" content="sekolah, pendidikan, TK, SD, SMP, Bogor, Insan Teladan">
    <meta name="author" content="Sekolah Insan Teladan">
    
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo SITE_URL; ?>/images/logo.png">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/navbar.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/responsive.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header Start -->
    <!-- <header class="header">
        Top Bar
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-content">
                    <div class="top-bar-left">
                        <a href="tel:02518553284" class="top-bar-link">
                            <i class="fas fa-phone"></i> 0251-8553284
                        </a>
                        <a href="mailto:yayasanmullafi@yahoo.com" class="top-bar-link">
                            <i class="fas fa-envelope"></i> yayasanmullafi@yahoo.com
                        </a>
                    </div>
                    <div class="top-bar-right">
                        <span class="top-bar-text">
                            <i class="fas fa-map-marker-alt"></i> Kaliuurn, Kec. Tajur Halang, Kabupaten Bogor
                        </span>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Main Navigation -->
        <nav class="navbar">
            <div class="container">
                <div class="navbar-content">
                    <!-- Logo -->
                    <div class="navbar-brand">
                        <a href="<?php echo SITE_URL; ?>/index.php">
                            <img src="<?php echo SITE_URL; ?>/images/logo.png" alt="Logo Sekolah Insan Teladan" class="logo-img">
                            <div class="brand-text">
                                <span class="brand-title">The End Of Education</span>
                                <span class="brand-subtitle">Is Character</span>
                            </div>
                        </a>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <!-- Navigation Menu -->
                    <ul class="navbar-menu" id="navbarMenu">
                        <li class="nav-item">
                            <a href="<?php echo SITE_URL; ?>/pages/tentang.php" class="nav-link">Tentang Kami</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle">
                                Kesiswaan <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo SITE_URL; ?>/pages/kurikulum_tk.php">Kurikulum TK</a></li>
                                <li><a href="<?php echo SITE_URL; ?>/pages/kurikulum_sd.php">Kurikulum SD</a></li>
                                <li><a href="<?php echo SITE_URL; ?>/pages/kurikulum_smp.php">Kurikulum SMP</a></li>
                                <li><a href="<?php echo SITE_URL; ?>/pages/ekstrakulikuler.php">Ekstrakulikuler</a></li>
                                <li><a href="<?php echo SITE_URL; ?>/pages/tenaga_pendidik.php">Tenaga Pendidik</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle">
                                Prestasi <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo SITE_URL; ?>/pages/prestasi_akademik.php">Akademik</a></li>
                                <li><a href="<?php echo SITE_URL; ?>/pages/prestasi_non_akademik.php">Non Akademik</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo SITE_URL; ?>/pages/berita.php" class="nav-link">Berita</a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo SITE_URL; ?>/pages/hubungi.php" class="nav-link">Hubungi Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Header End -->
</body>

    <!-- Main Content Wrapper -->
    <main class="main-content">
    
    <script src="navbar.js"></script>
