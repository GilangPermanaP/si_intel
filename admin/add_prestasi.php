<?php
require_once '../config.php';
requireAdmin();

$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = sanitize($_POST['judul'] ?? '');
    $kategori = sanitize($_POST['kategori'] ?? '');
    $nama_siswa = sanitize($_POST['nama_siswa'] ?? '');
    $kelas = sanitize($_POST['kelas'] ?? '');
    $deskripsi = sanitize($_POST['deskripsi'] ?? '');
    $tanggal = $_POST['tanggal'] ?? date('Y-m-d');
    
    // Validation
    if (empty($judul) || empty($kategori) || empty($nama_siswa) || empty($kelas)) {
        $error = 'Mohon lengkapi semua field yang wajib diisi';
    } else {
        try {
            // Handle image upload
            $gambar = null;
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $gambar = uploadImage($_FILES['gambar'], 'prestasi');
            }
            
            // Insert to database
            $stmt = $pdo->prepare("INSERT INTO prestasi (judul, kategori, nama_siswa, kelas, deskripsi, gambar, tanggal) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$judul, $kategori, $nama_siswa, $kelas, $deskripsi, $gambar, $tanggal]);
            
            $success = 'Prestasi berhasil ditambahkan!';
            
            // Reset form
            $_POST = array();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}

$pageTitle = "Tambah Prestasi";
require_once 'admin_header.php';
?>

<div class="admin-content">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">Tambah Prestasi Baru</h2>
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
                    <label class="form-label" for="judul">Judul Prestasi *</label>
                    <input type="text" 
                           id="judul" 
                           name="judul" 
                           class="form-control" 
                           placeholder="Contoh: Juara 1 Olimpiade Matematika"
                           value="<?php echo isset($_POST['judul']) ? h($_POST['judul']) : ''; ?>"
                           required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="kategori">Kategori *</label>
                    <select id="kategori" name="kategori" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        <option value="akademik" <?php echo (isset($_POST['kategori']) && $_POST['kategori'] === 'akademik') ? 'selected' : ''; ?>>Akademik</option>
                        <option value="non_akademik" <?php echo (isset($_POST['kategori']) && $_POST['kategori'] === 'non_akademik') ? 'selected' : ''; ?>>Non Akademik</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="tanggal">Tanggal *</label>
                    <input type="date" 
                           id="tanggal" 
                           name="tanggal" 
                           class="form-control"
                           value="<?php echo isset($_POST['tanggal']) ? $_POST['tanggal'] : date('Y-m-d'); ?>"
                           required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="nama_siswa">Nama Siswa *</label>
                    <input type="text" 
                           id="nama_siswa" 
                           name="nama_siswa" 
                           class="form-control" 
                           placeholder="Nama lengkap siswa"
                           value="<?php echo isset($_POST['nama_siswa']) ? h($_POST['nama_siswa']) : ''; ?>"
                           required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="kelas">Kelas *</label>
                    <input type="text" 
                           id="kelas" 
                           name="kelas" 
                           class="form-control" 
                           placeholder="Contoh: 6A, 9B"
                           value="<?php echo isset($_POST['kelas']) ? h($_POST['kelas']) : ''; ?>"
                           required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group full-width">
                    <label class="form-label" for="deskripsi">Deskripsi Prestasi</label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              class="form-control" 
                              rows="5"
                              placeholder="Jelaskan detail prestasi yang diraih..."><?php echo isset($_POST['deskripsi']) ? h($_POST['deskripsi']) : ''; ?></textarea>
                    <small class="form-text">Opsional: Penjelasan detail tentang prestasi</small>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group full-width">
                    <label class="form-label" for="gambar">Foto Prestasi</label>
                    <input type="file" 
                           id="gambar" 
                           name="gambar" 
                           class="form-control" 
                           accept="image/*">
                    <small class="form-text">Format: JPG, PNG, GIF. Maksimal 5MB</small>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Prestasi
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
        min-height: 120px;
    }
    
    select.form-control {
        cursor: pointer;
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
    }
</style>

<?php require_once 'admin_footer.php'; ?>