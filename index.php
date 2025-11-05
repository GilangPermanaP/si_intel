<?php
require_once 'config.php';

// Set page title
$pageTitle = "Beranda";

// Fetch latest news
$stmt = $pdo->prepare("SELECT * FROM berita ORDER BY tanggal_post DESC LIMIT 6");
$stmt->execute();
$latestNews = $stmt->fetchAll();

// Fetch latest achievements
$stmt = $pdo->prepare("SELECT * FROM prestasi ORDER BY tanggal DESC LIMIT 6");
$stmt->execute();
$latestPrestasi = $stmt->fetchAll();

// Include header
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="container">
            <div class="hero-text">
                <h1 class="hero-title animate-fade-in-up">
                    Selamat Datang di<br>
                    <span class="text-primary">Sekolah Insan Teladan</span>
                </h1>
                <p class="hero-subtitle animate-fade-in-up" style="animation-delay: 0.2s;">
                    Menumbuhkan Generasi Penerus Bangsa Yang Cerdas, Peduli, 
                    Berkarakter Baik Berdasarkan Nilai-Nilai Kemanusiaan dan Menjadi Manusia Seutuhnya
                </p>
                <div class="hero-buttons animate-fade-in-up" style="animation-delay: 0.4s;">
                    <a href="<?php echo SITE_URL; ?>/pages/tentang.php" class="btn btn-primary">
                        <i class="fas fa-info-circle"></i> Tentang Kami
                    </a>
                    <a href="<?php echo SITE_URL; ?>/pages/hubungi.php" class="btn btn-outline">
                        <i class="fas fa-envelope"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-overlay"></div>
</section>

<!-- Visi Misi Section -->
<section class="section visi-misi-section">
    <div class="container">
        <div class="section-title">
            <h2>Visi & Misi Kami</h2>
            <p>Komitmen kami dalam membentuk generasi unggul</p>
        </div>
        
        <div class="visi-misi-grid">
            <div class="visi-misi-card animate-on-scroll">
                <div class="visi-misi-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Visi</h3>
                <p>
                    "Menumbuhkan Kembangkan Generasi Penerus Bangsa Yang Cerdas, Peduli, 
                    Berkarakter Baik Berdasarkan Nilai-Nilai Kemanusiaan Dan Menjadi Manusia Seutuhnya"
                </p>
            </div>
            
            <div class="visi-misi-card animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="visi-misi-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Misi</h3>
                <ul class="misi-list">
                    <li><i class="fas fa-check-circle"></i> Mendirikan dan menyelenggarakan sekolah berbasis nilai-nilai kemanusiaan</li>
                    <li><i class="fas fa-check-circle"></i> Mensosialisasikan program pendidikan kepada masyarakat</li>
                    <li><i class="fas fa-check-circle"></i> Menjadikan sekolah sebagai model yang melaksanakan pendidikan berkarakter</li>
                    <li><i class="fas fa-check-circle"></i> Menyelenggarakan pendidikan yang mengkombinasikan pengembangan budi pekerti</li>
                    <li><i class="fas fa-check-circle"></i> Memberikan kesempatan memperoleh pendidikan bermutu</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section why-choose-section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Mengapa Memilih Kami?</h2>
            <p>Keunggulan Sekolah Insan Teladan</p>
        </div>
        
        <div class="grid grid-3">
            <div class="feature-card animate-on-scroll">
                <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Pendidikan Berkualitas</h3>
                <p>Kurikulum nasional yang diperkaya dengan program pengembangan karakter</p>
            </div>
            
            <div class="feature-card animate-on-scroll" style="animation-delay: 0.1s;">
                <div class="feature-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3>Guru Profesional</h3>
                <p>Tenaga pendidik berkualitas dan berpengalaman di bidangnya</p>
            </div>
            
            <div class="feature-card animate-on-scroll" style="animation-delay: 0.2s;">
                <div class="feature-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Fasilitas Lengkap</h3>
                <p>Ruang kelas nyaman, perpustakaan, lab, dan area olahraga yang memadai</p>
            </div>
            
            <div class="feature-card animate-on-scroll" style="animation-delay: 0.3s;">
                <div class="feature-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3>Prestasi Membanggakan</h3>
                <p>Siswa-siswi berprestasi di berbagai bidang akademik dan non-akademik</p>
            </div>
            
            <div class="feature-card animate-on-scroll" style="animation-delay: 0.4s;">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Lingkungan Kondusif</h3>
                <p>Suasana belajar yang menyenangkan dan mendukung perkembangan anak</p>
            </div>
            
            <div class="feature-card animate-on-scroll" style="animation-delay: 0.5s;">
                <div class="feature-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3>Pendidikan Karakter</h3>
                <p>Fokus pada pembentukan akhlak dan nilai-nilai kemanusiaan</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Achievement Section -->
<?php if (!empty($latestPrestasi)): ?>
<section class="section prestasi-section">
    <div class="container">
        <div class="section-title">
            <h2>Prestasi Terkini</h2>
            <p>Kebanggaan siswa-siswi Insan Teladan</p>
        </div>
        
        <div class="grid grid-3">
            <?php foreach (array_slice($latestPrestasi, 0, 3) as $prestasi): ?>
            <div class="card animate-on-scroll">
                <div class="card-image">
                    <?php if ($prestasi['gambar']): ?>
                        <img src="<?php echo SITE_URL; ?>/images/uploads/<?php echo h($prestasi['gambar']); ?>" 
                             alt="<?php echo h($prestasi['judul']); ?>">
                    <?php else: ?>
                        <img src="<?php echo SITE_URL; ?>/images/placeholder.jpg" 
                             alt="<?php echo h($prestasi['judul']); ?>">
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-meta">
                        <span class="badge badge-<?php echo $prestasi['kategori'] === 'akademik' ? 'primary' : 'secondary'; ?>">
                            <?php echo ucfirst(h($prestasi['kategori'])); ?>
                        </span>
                        <span><i class="fas fa-calendar"></i> <?php echo formatTanggal($prestasi['tanggal']); ?></span>
                    </div>
                    <h3 class="card-title"><?php echo h($prestasi['judul']); ?></h3>
                    <p class="card-text">
                        <strong><?php echo h($prestasi['nama_siswa']); ?></strong> - Kelas <?php echo h($prestasi['kelas']); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?php echo SITE_URL; ?>/pages/prestasi_akademik.php" class="btn btn-primary">
                Lihat Semua Prestasi <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Latest News Section -->
<?php if (!empty($latestNews)): ?>
<section class="section berita-section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terbaru</h2>
            <p>Informasi dan kegiatan terkini sekolah</p>
        </div>
        
        <div class="grid grid-3">
            <?php foreach (array_slice($latestNews, 0, 3) as $berita): ?>
            <div class="card animate-on-scroll">
                <div class="card-image">
                    <?php if ($berita['gambar']): ?>
                        <img src="<?php echo SITE_URL; ?>/images/uploads/<?php echo h($berita['gambar']); ?>" 
                             alt="<?php echo h($berita['judul']); ?>">
                    <?php else: ?>
                        <img src="<?php echo SITE_URL; ?>/images/placeholder.jpg" 
                             alt="<?php echo h($berita['judul']); ?>">
                    <?php endif; ?>
                </div>
                <div class="card-content">
                    <div class="card-meta">
                        <span><i class="fas fa-calendar"></i> <?php echo formatTanggal($berita['tanggal_post']); ?></span>
                        <span><i class="fas fa-user"></i> <?php echo h($berita['penulis']); ?></span>
                    </div>
                    <h3 class="card-title"><?php echo h($berita['judul']); ?></h3>
                    <p class="card-text"><?php echo truncateText(h($berita['konten']), 120); ?></p>
                    <a href="<?php echo SITE_URL; ?>/pages/detail_berita.php?id=<?php echo $berita['id']; ?>" class="btn btn-outline">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?php echo SITE_URL; ?>/pages/berita.php" class="btn btn-primary">
                Lihat Semua Berita <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Contact CTA Section -->
<section class="section cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Tertarik Bergabung dengan Kami?</h2>
            <p>Hubungi kami untuk informasi lebih lanjut tentang pendaftaran siswa baru</p>
            <div class="cta-buttons">
                <a href="<?php echo SITE_URL; ?>/pages/hubungi.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-phone"></i> Hubungi Kami
                </a>
                <a href="tel:02518553284" class="btn btn-outline btn-lg">
                    <i class="fas fa-phone-alt"></i> 0251-8553284
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section */
.hero-section {
    position: relative;
    min-height: 600px;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--white);
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><circle cx="200" cy="100" r="150" fill="rgba(255,255,255,0.03)"/><circle cx="1000" cy="400" r="200" fill="rgba(255,255,255,0.03)"/><circle cx="600" cy="300" r="100" fill="rgba(255,255,255,0.03)"/></svg>');
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.hero-content {
    position: relative;
    z-index: 1;
    padding: 100px 0;
}

.hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
}

.hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 30px;
    opacity: 0.95;
    max-width: 700px;
    line-height: 1.7;
}

.hero-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.bg-light {
    background: var(--bg-light);
}

/* Visi Misi */
.visi-misi-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    max-width: 1000px;
    margin: 0 auto;
}

.visi-misi-card {
    background: var(--white);
    padding: 40px;
    border-radius: 12px;
    box-shadow: var(--shadow);
    text-align: center;
}

.visi-misi-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 25px;
}

.visi-misi-card h3 {
    font-size: 1.8rem;
    color: var(--primary-color);
    margin-bottom: 20px;
}

.visi-misi-card p {
    line-height: 1.8;
    color: var(--text-light);
}

.misi-list {
    text-align: left;
    list-style: none;
}

.misi-list li {
    padding: 10px 0;
    display: flex;
    gap: 12px;
    line-height: 1.6;
}

.misi-list i {
    color: var(--primary-color);
    margin-top: 3px;
    flex-shrink: 0;
}

/* Feature Cards */
.feature-card {
    background: var(--white);
    padding: 30px;
    border-radius: 12px;
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    margin: 0 auto 20px;
}

.feature-card h3 {
    font-size: 1.3rem;
    margin-bottom: 12px;
    color: var(--text-dark);
}

.feature-card p {
    color: var(--text-light);
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--white);
    padding: 80px 0;
}

.cta-content {
    text-align: center;
    max-width: 700px;
    margin: 0 auto;
}

.cta-content h2 {
    font-size: 2.2rem;
    margin-bottom: 15px;
}

.cta-content p {
    font-size: 1.1rem;
    margin-bottom: 30px;
    opacity: 0.95;
}

.cta-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-lg {
    padding: 15px 35px;
    font-size: 1.1rem;
}

.cta-section .btn-outline {
    border-color: var(--white);
    color: var(--white);
}

.cta-section .btn-outline:hover {
    background: var(--white);
    color: var(--primary-color);
}

/* Responsive */
@media (max-width: 992px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .visi-misi-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .hero-section {
        min-height: 500px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
    }
    
    .hero-buttons .btn {
        width: 100%;
        text-align: center;
    }
    
    .cta-content h2 {
        font-size: 1.8rem;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .cta-buttons .btn {
        width: 100%;
    }
}
</style>

<?php include 'includes/footer.php'; ?>