<?php
require_once '../config.php';
requireAdmin();

// Get statistics
$stmt = $pdo->query("SELECT COUNT(*) FROM prestasi WHERE kategori = 'akademik'");
$totalPrestasiAkademik = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM prestasi WHERE kategori = 'non_akademik'");
$totalPrestasiNonAkademik = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM berita");
$totalBerita = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM pesan WHERE status = 'baru'");
$totalPesanBaru = $stmt->fetchColumn();

// Get latest prestasi
$stmt = $pdo->query("SELECT * FROM prestasi ORDER BY created_at DESC LIMIT 5");
$latestPrestasi = $stmt->fetchAll();

// Get latest berita
$stmt = $pdo->query("SELECT * FROM berita ORDER BY created_at DESC LIMIT 5");
$latestBerita = $stmt->fetchAll();

$pageTitle = "Dashboard Admin";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - <?php echo SITE_NAME; ?></title>
    
    <link rel="icon" type="image/png" href="<?php echo SITE_URL; ?>/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/admin.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
            color: #212121;
        }
        
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: linear-gradient(135deg, #2E7D32 0%, #1B5E20 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-logo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            padding: 10px;
            margin-bottom: 15px;
        }
        
        .sidebar-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .sidebar-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .menu-item:hover,
        .menu-item.active {
            background: rgba(255,255,255,0.1);
            border-left-color: #FFB300;
        }
        
        .menu-item i {
            width: 20px;
            text-align: center;
        }
        
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: auto;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-name {
            font-weight: 500;
        }
        
        /* Main Content */
        .admin-main {
            flex: 1;
            margin-left: 260px;
        }
        
        .admin-header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-title h1 {
            font-size: 1.8rem;
            color: #2E7D32;
        }
        
        .header-actions {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-primary {
            background: #2E7D32;
            color: white;
        }
        
        .btn-primary:hover {
            background: #1B5E20;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background: #d32f2f;
            color: white;
        }
        
        .btn-danger:hover {
            background: #b71c1c;
        }
        
        .admin-content {
            padding: 30px;
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-icon.blue {
            background: linear-gradient(135deg, #2196F3, #1976D2);
        }
        
        .stat-icon.green {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
        }
        
        .stat-icon.orange {
            background: linear-gradient(135deg, #FF9800, #F57C00);
        }
        
        .stat-icon.purple {
            background: linear-gradient(135deg, #9C27B0, #7B1FA2);
        }
        
        .stat-info h3 {
            font-size: 2rem;
            color: #212121;
            margin-bottom: 5px;
        }
        
        .stat-info p {
            color: #757575;
            font-size: 0.95rem;
        }
        
        /* Tables */
        .content-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f5f5f5;
        }
        
        .card-title {
            font-size: 1.3rem;
            color: #212121;
            font-weight: 600;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background: #f5f5f5;
        }
        
        th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #2E7D32;
            font-size: 0.9rem;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid #f5f5f5;
        }
        
        tbody tr:hover {
            background: #f9f9f9;
        }
        
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .badge-primary {
            background: #E8F5E9;
            color: #2E7D32;
        }
        
        .badge-secondary {
            background: #FFF3E0;
            color: #E65100;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .admin-sidebar.active {
                transform: translateX(0);
            }
            
            .admin-main {
                margin-left: 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="<?php echo SITE_URL; ?>/images/logo.png" alt="Logo">
                </div>
                <div class="sidebar-title">Admin Panel</div>
                <div class="sidebar-subtitle">Insan Teladan</div>
            </div>
            
            <nav class="sidebar-menu">
                <a href="<?php echo SITE_URL; ?>/admin/dashboard.php" class="menu-item active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="<?php echo SITE_URL; ?>/admin/add_prestasi.php" class="menu-item">
                    <i class="fas fa-trophy"></i>
                    <span>Tambah Prestasi</span>
                </a>
                <a href="<?php echo SITE_URL; ?>/admin/add_berita.php" class="menu-item">
                    <i class="fas fa-newspaper"></i>
                    <span>Tambah Berita</span>
                </a>
                <a href="<?php echo SITE_URL; ?>/index.php" class="menu-item" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Lihat Website</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <div class="user-name"><?php echo h($_SESSION['admin_username']); ?></div>
                        <div style="font-size: 0.85rem; opacity: 0.8;">Administrator</div>
                    </div>
                </div>
                <a href="<?php echo SITE_URL; ?>/admin/logout.php" class="btn btn-danger btn-block">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="admin-main">
            <header class="admin-header">
                <div class="header-title">
                    <h1>Dashboard</h1>
                </div>
                <div class="header-actions">
                    <a href="<?php echo SITE_URL; ?>/index.php" class="btn btn-primary" target="_blank">
                        <i class="fas fa-eye"></i> Lihat Website
                    </a>
                </div>
            </header>
            
            <div class="admin-content">
                <!-- Statistics -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $totalPrestasiAkademik; ?></h3>
                            <p>Prestasi Akademik</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $totalPrestasiNonAkademik; ?></h3>
                            <p>Prestasi Non Akademik</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $totalBerita; ?></h3>
                            <p>Total Berita</p>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $totalPesanBaru; ?></h3>
                            <p>Pesan Baru</p>
                        </div>
                    </div>
                </div>
                
                <!-- Latest Prestasi -->
                <div class="content-card">
                    <div class="card-header">
                        <h2 class="card-title">Prestasi Terbaru</h2>
                        <a href="<?php echo SITE_URL; ?>/admin/add_prestasi.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Baru
                        </a>
                    </div>
                    
                    <?php if (!empty($latestPrestasi)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($latestPrestasi as $prestasi): ?>
                            <tr>
                                <td><?php echo h($prestasi['judul']); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $prestasi['kategori'] === 'akademik' ? 'primary' : 'secondary'; ?>">
                                        <?php echo ucfirst(h($prestasi['kategori'])); ?>
                                    </span>
                                </td>
                                <td><?php echo h($prestasi['nama_siswa']); ?></td>
                                <td><?php echo formatTanggal($prestasi['tanggal']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p style="text-align: center; padding: 20px; color: #757575;">Belum ada data prestasi</p>
                    <?php endif; ?>
                </div>
                
                <!-- Latest Berita -->
                <div class="content-card">
                    <div class="card-header">
                        <h2 class="card-title">Berita Terbaru</h2>
                        <a href="<?php echo SITE_URL; ?>/admin/add_berita.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Baru
                        </a>
                    </div>
                    
                    <?php if (!empty($latestBerita)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($latestBerita as $berita): ?>
                            <tr>
                                <td><?php echo h($berita['judul']); ?></td>
                                <td><?php echo h($berita['penulis']); ?></td>
                                <td><?php echo formatTanggal($berita['tanggal_post']); ?></td>
                                <td><?php echo $berita['views']; ?>x</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p style="text-align: center; padding: 20px; color: #757575;">Belum ada data berita</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>