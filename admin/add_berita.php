<?php
require_once '../config.php';
requireAdmin();

$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = sanitize($_POST['judul'] ?? '');
    $konten = $_POST['konten'] ?? ''; // Don't sanitize content too much
    $penulis = sanitize($_POST['penulis'] ?? $_SESSION['admin_username']);
    $tanggal_post = $_POST['tanggal_post'] ?? date('Y-m-d');
    
    // Validation
    if (empty($judul) || empty($konten)) {
        $error = 'Judul dan konten berita wajib diisi';
    } else {
        try {
            // Handle image upload
            $gambar = null;
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $gambar = uploadImage($_FILES['gambar'], 'berita');
            }
            
            // Insert to database
            $stmt = $pdo->prepare("INSERT INTO berita (judul, konten, gambar, penulis, tanggal_post) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$judul, $konten, $gambar, $penulis, $tanggal_post]);
            
            $success = 'Berita berhasil ditambahkan!';
            
            // Reset form
            $_POST = array();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}

$pageTitle = "Tambah Berita";
require_once 'admin_header.php';
?>

<div class="admin-content">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">Tambah Berita Baru</h2>
            <a href="<?php echo SITE_URL; ?>/admin/dashboard.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        
        <?php if ($error): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <span><?php echo $error; ?></span>
            </div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span><?php echo $success; ?></span>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="" enctype="multipart/form-data" class="admin-form">
            <div class="form-row">
                <div class="form-group full-width">
                    <label class="form-label" for="judul">Judul Berita *</label>
                    <input type="text" 
                           id="judul" 
                           name="judul" 
                           class="form-control" 
                           placeholder="Masukkan judul berita yang menarik..."
                           value="<?php echo isset($_POST['judul']) ? h($_POST['judul']) : ''; ?>"
                           required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="penulis">Penulis *</label>
                    <input type="text" 
                           id="penulis" 
                           name="penulis" 
                           class="form-control" 
                           placeholder="Nama penulis"
                           value="<?php echo isset($_POST['penulis']) ? h($_POST['penulis']) : h($_SESSION['admin_username']); ?>"
                           required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="tanggal_post">Tanggal Posting *</label>
                    <input type="date" 
                           id="tanggal_post" 
                           name="tanggal_post" 
                           class="form-control"
                           value="<?php echo isset($_POST['tanggal_post']) ? $_POST['tanggal_post'] : date('Y-m-d'); ?>"
                           required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group full-width">
                    <label class="form-label" for="konten">Konten Berita *</label>
                    <textarea id="konten" 
                              name="konten" 
                              class="form-control" 
                              rows="15"
                              placeholder="Tulis konten berita lengkap di sini..."
                              required><?php echo isset($_POST['konten']) ? h($_POST['konten']) : ''; ?></textarea>
                    <small class="form-text">Tulis konten berita dengan detail dan informatif</small>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group full-width">
                    <label class="form-label" for="gambar">Gambar Berita</label>
                    <input type="file" 
                           id="gambar" 
                           name="gambar" 
                           class="form-control" 
                           accept="image/*">
                    <small class="form-text">Format: JPG, PNG, GIF. Maksimal 5MB. Ukuran rekomendasi: 1200x600px</small>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Publikasikan Berita
                </button>
                <a href="<?php echo SITE_URL; ?>/admin/dashboard.php" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .admin-form {
        padding: 20px 0;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }
    
    .form-group.full-width {
        grid-column: 1 / -1;
    }
    
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #212121;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        font-size: 1rem;
        border: 2px solid #E0E0E0;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-family: inherit;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #2E7D32;
        box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.1);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 200px;
        line-height: 1.6;
    }
    
    .form-text {
        font-size: 0.85rem;
        color: #757575;
        margin-top: 5px;
        display: block;
    }
    
    .form-actions {
        display: flex;
        gap: 15px;
        padding-top: 20px;
        border-top: 2px solid #f5f5f5;
    }
    
    .btn-secondary {
        background: #757575;
        color: white;
    }
    
    .btn-secondary:hover {
        background: #616161;
    }
    
    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .alert-error {
        background: #FFEBEE;
        color: #C62828;
        border-left: 4px solid #F44336;
    }
    
    .alert-success {
        background: #E8F5E9;
        color: #2E7D32;
        border-left: 4px solid #4CAF50;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .form-actions .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<?php require_once 'admin_footer.php'; ?>