<?php
/**
 * File Konfigurasi Database
 * Sekolah Insan Teladan
 * 
 * File ini berisi konfigurasi koneksi database
 * Edit sesuai dengan setting server Anda
 */

// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Konfigurasi Database
define('DB_HOST', 'localhost');      // Host database (biasanya localhost)
define('DB_USER', 'root');           // Username database
define('DB_PASS', '');               // Password database (kosongkan jika tidak ada)
define('DB_NAME', 'school_db');      // Nama database

// Konfigurasi Website
define('SITE_NAME', 'Sekolah Insan Teladan');
define('SITE_URL', 'http://localhost/school-website');  // Sesuaikan dengan URL website Anda
define('ADMIN_EMAIL', 'admin@insanteladan.sch.id');

// Konfigurasi Upload
define('UPLOAD_DIR', __DIR__ . '/images/uploads/');
define('MAX_FILE_SIZE', 5242880);  // 5MB dalam bytes
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);

// Koneksi Database menggunakan PDO
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    // Jangan tampilkan error detail di production
    die("Koneksi database gagal. Silakan hubungi administrator.");
    // Untuk development, uncomment baris berikut:
    // die("Koneksi database gagal: " . $e->getMessage());
}

/**
 * Fungsi Helper untuk keamanan
 */

// Escape HTML untuk mencegah XSS
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// Redirect helper
function redirect($url) {
    header("Location: " . $url);
    exit();
}

// Check if user is logged in as admin
function isAdmin() {
    return isset($_SESSION['admin_id']) && isset($_SESSION['admin_username']);
}

// Require admin access
function requireAdmin() {
    if (!isAdmin()) {
        redirect(SITE_URL . '/admin/login.php');
    }
}

// Format tanggal Indonesia
function formatTanggal($date) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $timestamp = strtotime($date);
    $hari = date('d', $timestamp);
    $bulanNum = date('n', $timestamp);
    $tahun = date('Y', $timestamp);
    
    return $hari . ' ' . $bulan[$bulanNum] . ' ' . $tahun;
}

// Upload file gambar
function uploadImage($file, $subfolder = '') {
    // Cek apakah ada file yang diupload
    if (!isset($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }
    
    // Cek error upload
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Error saat mengupload file');
    }
    
    // Cek ukuran file
    if ($file['size'] > MAX_FILE_SIZE) {
        throw new Exception('Ukuran file terlalu besar. Maksimal 5MB');
    }
    
    // Cek ekstensi file
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, ALLOWED_EXTENSIONS)) {
        throw new Exception('Format file tidak diizinkan. Gunakan: ' . implode(', ', ALLOWED_EXTENSIONS));
    }
    
    // Cek apakah benar-benar gambar
    $imageInfo = getimagesize($file['tmp_name']);
    if ($imageInfo === false) {
        throw new Exception('File bukan gambar yang valid');
    }
    
    // Generate nama file unik
    $newFilename = uniqid() . '_' . time() . '.' . $extension;
    
    // Tentukan path upload
    $uploadPath = UPLOAD_DIR . ($subfolder ? $subfolder . '/' : '');
    
    // Buat folder jika belum ada
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }
    
    $destination = $uploadPath . $newFilename;
    
    // Upload file
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new Exception('Gagal menyimpan file');
    }
    
    // Return path relatif untuk disimpan di database
    return ($subfolder ? $subfolder . '/' : '') . $newFilename;
}

// Delete image file
function deleteImage($filename) {
    if (empty($filename)) {
        return false;
    }
    
    $filepath = UPLOAD_DIR . $filename;
    
    if (file_exists($filepath)) {
        return unlink($filepath);
    }
    
    return false;
}

// Truncate text
function truncateText($text, $length = 150) {
    if (strlen($text) <= $length) {
        return $text;
    }
    
    return substr($text, 0, $length) . '...';
}

// Generate slug from string
function generateSlug($string) {
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    return $string;
}

// Sanitize input
function sanitize($input) {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

// Get client IP address
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/**
 * Fungsi untuk mendapatkan base URL
 */
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $script = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
    return $protocol . "://" . $host . $script;
}

// Set timezone
date_default_timezone_set('Asia/Jakarta');

?>