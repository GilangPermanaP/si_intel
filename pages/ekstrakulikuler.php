<?php
require_once '../config.php';
$pageTitle = "Ekstrakurikuler";

// Fetch ekstrakurikuler from database
$stmt = $pdo->query("SELECT * FROM ekstrakurikuler ORDER BY nama ASC");
$ekstrakurikuler = $stmt->fetchAll();

include '../includes/header.php';
?>

<div class="page-header">
    <div class="page-header-content">
        <h1>Ekstrakurikuler</h1>
        <p>Kegiatan pengembangan bakat dan minat siswa</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="intro-section">
            <p>
                Terdapat beberapa kegiatan ekstrakurikuler yang dapat diikuti oleh para siswa, diantaranya:
            </p>
        </div>
        
        <?php if (!empty($ekstrakurikuler)): ?>
        <div class="grid grid-3">
            <?php foreach ($ekstrakurikuler as $ekskul): ?>
            <div class="ekskul-card">
                <div class="ekskul-image">
                    <?php if ($ekskul['gambar']): ?>
                        <img src="<?php echo SITE_URL; ?>/images/uploads/<?php echo h($ekskul['gambar']); ?>" 
                             alt="<?php echo h($ekskul['nama']); ?>">
                    <?php else: ?>
                        <div class="ekskul-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="ekskul-content">
                    <h3 class="ekskul-title"><?php echo h($ekskul['nama']); ?></h3>
                    <p class="ekskul-desc"><?php echo h($ekskul['deskripsi']); ?></p>
                    <div class="ekskul-meta">
                        <div class="meta-item">
                            <i class="fas fa-user-tie"></i>
                            <span><?php echo h($ekskul['pembina']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span><?php echo h($ekskul['jadwal']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="no-data">
            <i class="fas fa-info-circle"></i>
            <p>Data ekstrakurikuler akan segera ditambahkan</p>
        </div>
        <?php endif; ?>

        <div class="manfaat-section">
            <h3>Manfaat Mengikuti Ekstrakurikuler</h3>
            <div class="grid grid-2">
                <div class="manfaat-card">
                    <div class="manfaat-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4>Mengembangkan Bakat</h4>
                    <p>Menyalurkan dan mengasah bakat serta minat siswa di berbagai bidang</p>
                </div>
                
                <div class="manfaat-card">
                    <div class="manfaat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Meningkatkan Kemampuan Sosial</h4>
                    <p>Belajar berinteraksi, bekerjasama, dan berorganisasi dengan teman sebaya</p>
                </div>
                
                <div class="manfaat-card">
                    <div class="manfaat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Meraih Prestasi</h4>
                    <p>Kesempatan untuk mengikuti kompetisi dan meraih prestasi di tingkat lokal hingga nasional</p>
                </div>
                
                <div class="manfaat-card">
                    <div class="manfaat-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h4>Keseimbangan Akademik</h4>
                    <p>Menyeimbangkan kegiatan akademik dengan pengembangan soft skills dan hobi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.intro-section {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: var(--shadow);
    margin-bottom: 40px;
    text-align: center;
}

.intro-section p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-light);
    margin: 0;
}

.ekskul-card {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow);
    overflow: hidden;
    transition: var(--transition);
}

.ekskul-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.ekskul-image {
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: var(--bg-light);
}

.ekskul-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.ekskul-card:hover .ekskul-image img {
    transform: scale(1.1);
}

.ekskul-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
    color: white;
    font-size: 3rem;
}

.ekskul-content {
    padding: 25px;
}

.ekskul-title {
    font-size: 1.3rem;
    color: var(--text-dark);
    margin-bottom: 12px;
    font-weight: 600;
}

.ekskul-desc {
    color: var(--text-light);
    line-height: 1.7;
    margin-bottom: 20px;
}

.ekskul-meta {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding-top: 15px;
    border-top: 1px solid var(--border-color);
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--text-light);
    font-size: 0.95rem;
}

.meta-item i {
    color: var(--primary-color);
    width: 20px;
    text-align: center;
}

.no-data {
    background: white;
    padding: 60px 30px;
    border-radius: 12px;
    box-shadow: var(--shadow);
    text-align: center;
}

.no-data i {
    font-size: 4rem;
    color: var(--primary-color);
    margin-bottom: 20px;
}

.no-data p {
    font-size: 1.1rem;
    color: var(--text-light);
}

.manfaat-section {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: var(--shadow);
    margin-top: 60px;
}

.manfaat-section h3 {
    color: var(--primary-color);
    font-size: 1.8rem;
    margin-bottom: 35px;
    text-align: center;
}

.manfaat-card {
    background: var(--bg-light);
    padding: 30px;
    border-radius: 12px;
    text-align: center;
    transition: var(--transition);
}

.manfaat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow);
    background: white;
}

.manfaat-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    margin: 0 auto 20px;
}

.manfaat-card h4 {
    color: var(--text-dark);
    font-size: 1.2rem;
    margin-bottom: 12px;
}

.manfaat-card p {
    color: var(--text-light);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .ekskul-image {
        height: 200px;
    }
}
</style>

<?php include '../includes/footer.php'; ?>