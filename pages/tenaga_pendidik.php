<?php
require_once '../config.php';
$pageTitle = "Tenaga Pendidik";

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$perPage = 8;
$offset = ($page - 1) * $perPage;

// Get total count
$stmt = $pdo->query("SELECT COUNT(*) FROM tenaga_pendidik");
$totalGuru = $stmt->fetchColumn();
$totalPages = ceil($totalGuru / $perPage);

// Get tenaga pendidik with pagination
$stmt = $pdo->prepare("SELECT * FROM tenaga_pendidik ORDER BY nama ASC LIMIT ? OFFSET ?");
$stmt->execute([$perPage, $offset]);
$tenagaPendidik = $stmt->fetchAll();

include '../includes/header.php';
?>

<div class="page-header">
    <div class="page-header-content">
        <h1>Tenaga Pendidik</h1>
        <p>Berikut ini adalah profil tenaga pendidik yang ada di Sekolah Insan Teladan</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php if (!empty($tenagaPendidik)): ?>
        <div class="grid grid-4">
            <?php foreach ($tenagaPendidik as $guru): ?>
            <div class="teacher-card">
                <div class="teacher-image">
                    <?php if ($guru['foto']): ?>
                        <img src="<?php echo SITE_URL; ?>/images/uploads/<?php echo h($guru['foto']); ?>" 
                             alt="<?php echo h($guru['nama']); ?>">
                    <?php else: ?>
                        <div class="teacher-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="teacher-info">
                    <h3><?php echo h($guru['nama']); ?></h3>
                    <p class="teacher-nik"><?php echo h($guru['nik']); ?></p>
                    <p class="teacher-position"><?php echo h($guru['posisi']); ?></p>
                    <?php if ($guru['quotes']): ?>
                        <p class="teacher-quotes">"<?php echo h($guru['quotes']); ?>"</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=1" class="btn btn-secondary" title="Halaman Pertama">
                    <i class="fas fa-angle-double-left"></i>
                </a>
                <a href="?page=<?php echo $page - 1; ?>" class="btn btn-secondary" title="Sebelumnya">
                    <i class="fas fa-chevron-left"></i>
                </a>
            <?php endif; ?>
            
            <?php
            $start = max(1, $page - 2);
            $end = min($totalPages, $page + 2);
            
            for ($i = $start; $i <= $end; $i++):
            ?>
                <a href="?page=<?php echo $i; ?>" 
                   class="btn <?php echo $page == $i ? 'btn-primary' : 'btn-secondary'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            
            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="btn btn-secondary" title="Selanjutnya">
                    <i class="fas fa-chevron-right"></i>
                </a>
                <a href="?page=<?php echo $totalPages; ?>" class="btn btn-secondary" title="Halaman Terakhir">
                    <i class="fas fa-angle-double-right"></i>
                </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <?php else: ?>
        <div class="no-data">
            <i class="fas fa-user-friends"></i>
            <p>Data tenaga pendidik akan segera ditambahkan</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
.teacher-card {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow);
    overflow: hidden;
    transition: var(--transition);
    text-align: center;
}

.teacher-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.teacher-image {
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: var(--bg-light);
}

.teacher-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.teacher-card:hover .teacher-image img {
    transform: scale(1.05);
}

.teacher-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
    color: white;
    font-size: 3.5rem;
}

.teacher-info {
    padding: 20px;
}

.teacher-info h3 {
    font-size: 1.1rem;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-weight: 600;
    line-height: 1.3;
}

.teacher-nik {
    font-size: 0.9rem;
    color: var(--primary-color);
    font-weight: 500;
    margin-bottom: 8px;
}

.teacher-position {
    color: var(--text-light);
    margin-bottom: 12px;
    font-size: 0.95rem;
}

.teacher-quotes {
    font-style: italic;
    font-size: 0.85rem;
    color: var(--text-light);
    line-height: 1.5;
    padding-top: 12px;
    border-top: 1px solid var(--border-color);
}

.pagination {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 50px;
    flex-wrap: wrap;
}

.pagination .btn {
    min-width: 40px;
    height: 40px;
    padding: 8px 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.pagination .btn-secondary {
    background: #f5f5f5;
    color: var(--text-dark);
}

.pagination .btn-secondary:hover {
    background: #e0e0e0;
}

.pagination .btn-primary {
    background: var(--primary-color);
    color: white;
}

.no-data {
    background: white;
    padding: 80px 30px;
    border-radius: 12px;
    box-shadow: var(--shadow);
    text-align: center;
}

.no-data i {
    font-size: 5rem;
    color: var(--primary-color);
    margin-bottom: 25px;
    opacity: 0.7;
}

.no-data p {
    font-size: 1.2rem;
    color: var(--text-light);
}

@media (max-width: 992px) {
    .grid-4 {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 768px) {
    .grid-4 {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .teacher-image {
        height: 180px;
    }
}

@media (max-width: 480px) {
    .grid-4 {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include '../includes/footer.php'; ?>