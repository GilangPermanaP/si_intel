-- Database: school_db
-- Buat database terlebih dahulu dengan nama school_db

CREATE DATABASE IF NOT EXISTS school_db;
USE school_db;

-- Tabel Admin
CREATE TABLE IF NOT EXISTS admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert admin default (password: admin123)
INSERT INTO admin (username, password, email) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@insanteladan.sch.id');

-- Tabel Prestasi
CREATE TABLE IF NOT EXISTS prestasi (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(255) NOT NULL,
    kategori ENUM('akademik', 'non_akademik') NOT NULL,
    nama_siswa VARCHAR(100) NOT NULL,
    kelas VARCHAR(20) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255),
    tanggal DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample prestasi
INSERT INTO prestasi (judul, kategori, nama_siswa, kelas, deskripsi, tanggal) VALUES
('Juara 1 Olimpiade Matematika Tingkat Nasional', 'akademik', 'Ahmad Zaki', '6A', 'Meraih juara 1 dalam olimpiade matematika tingkat nasional dengan nilai sempurna', '2024-09-15'),
('Juara 2 Lomba Cerdas Cermat IPA', 'akademik', 'Siti Nurhaliza', '9B', 'Prestasi gemilang dalam lomba cerdas cermat IPA tingkat provinsi', '2024-10-01'),
('Juara 1 Lomba Futsal Antar Sekolah', 'non_akademik', 'Tim Futsal SMP', '7-9', 'Menjuarai turnamen futsal antar sekolah se-Kabupaten Bogor', '2024-08-20'),
('Juara 3 Festival Band Pelajar', 'non_akademik', 'Band Insan Teladan', '8-9', 'Penampilan terbaik dalam festival band tingkat regional', '2024-09-05');

-- Tabel Berita
CREATE TABLE IF NOT EXISTS berita (
    id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(255) NOT NULL,
    konten TEXT NOT NULL,
    gambar VARCHAR(255),
    penulis VARCHAR(100) DEFAULT 'Admin',
    tanggal_post DATE NOT NULL,
    views INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample berita
INSERT INTO berita (judul, konten, tanggal_post) VALUES
('Pembukaan Tahun Ajaran Baru 2024/2025', 'Sekolah Insan Teladan dengan penuh sukacita membuka tahun ajaran baru 2024/2025. Kegiatan dimulai dengan upacara bendera yang dihadiri oleh seluruh siswa, guru, dan staff. Kepala sekolah menyampaikan sambutan dan harapan untuk tahun ajaran yang produktif. Tema tahun ini adalah "Membangun Generasi Cerdas dan Berkarakter". Kami mengajak seluruh warga sekolah untuk bersama-sama mewujudkan visi dan misi sekolah.', '2024-07-15'),
('Studi Banding ke Sekolah Unggulan Jakarta', 'Tim guru Insan Teladan melakukan studi banding ke beberapa sekolah unggulan di Jakarta. Kegiatan ini bertujuan untuk meningkatkan kualitas pembelajaran dan manajemen sekolah. Berbagai insight dan best practices didapatkan untuk diterapkan di sekolah kita. Harapannya, kualitas pendidikan di Insan Teladan dapat terus meningkat.', '2024-08-10'),
('Peringatan Hari Kemerdekaan RI ke-79', 'Seluruh warga Sekolah Insan Teladan memeriahkan peringatan HUT RI ke-79 dengan berbagai lomba dan kegiatan. Mulai dari lomba makan kerupuk, balap karung, tarik tambang, hingga lomba kreativitas. Antusiasme siswa sangat tinggi dan kegiatan berlangsung meriah. Kegiatan ditutup dengan pembagian hadiah untuk para pemenang lomba.', '2024-08-17'),
('Workshop Pembelajaran Kreatif untuk Guru', 'Sekolah mengadakan workshop pembelajaran kreatif yang diikuti oleh seluruh guru. Narasumber dari Universitas Pendidikan Indonesia membagikan berbagai metode pembelajaran inovatif. Workshop berlangsung selama 2 hari dengan materi yang sangat bermanfaat. Guru-guru antusias mengikuti dan berkomitmen menerapkan metode baru dalam pembelajaran.', '2024-09-22'),
('Pentas Seni dan Budaya Semester Ganjil', 'Kreativitas siswa tersalurkan dalam acara pentas seni dan budaya. Berbagai penampilan ditampilkan mulai dari tari tradisional, modern dance, musik, teater, dan puisi. Para orang tua hadir memberikan dukungan penuh. Acara berlangsung sukses dan mendapat apresiasi tinggi dari semua pihak.', '2024-10-05'),
('Kunjungan Industri Kelas 9 ke Pabrik Teknologi', 'Siswa kelas 9 melakukan kunjungan industri ke pabrik teknologi terkemuka. Mereka melihat langsung proses produksi dan penerapan teknologi modern. Kegiatan ini membuka wawasan siswa tentang dunia kerja dan industri. Banyak siswa yang terinspirasi untuk melanjutkan ke jurusan teknik.', '2024-10-12');

-- Tabel Tenaga Pendidik
CREATE TABLE IF NOT EXISTS tenaga_pendidik (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    nik VARCHAR(20) UNIQUE NOT NULL,
    posisi VARCHAR(100) NOT NULL,
    quotes TEXT,
    foto VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample tenaga pendidik
INSERT INTO tenaga_pendidik (nama, nik, posisi, quotes) VALUES
('Drs. Bambang Sutrisno, M.Pd', 'NIK001', 'Kepala Sekolah', 'Pendidikan adalah kunci membuka pintu masa depan yang cerah'),
('Siti Aminah, S.Pd', 'NIK002', 'Guru Matematika', 'Matematika bukan tentang angka, tapi tentang logika dan kreativitas'),
('Ahmad Hidayat, S.Pd', 'NIK003', 'Guru Bahasa Inggris', 'Language is the road map of a culture'),
('Dewi Lestari, S.Pd', 'NIK004', 'Guru IPA', 'Sains mengajarkan kita untuk selalu bertanya dan mencari jawaban'),
('Rudi Hartono, S.Pd', 'NIK005', 'Guru Olahraga', 'Tubuh yang sehat, pikiran yang kuat'),
('Fitri Handayani, S.Pd', 'NIK006', 'Guru Seni Budaya', 'Seni adalah ekspresi jiwa yang paling indah'),
('Yusuf Rahman, S.Pd', 'NIK007', 'Guru Agama', 'Akhlak mulia adalah pondasi pendidikan sejati'),
('Linda Susanti, S.Pd', 'NIK008', 'Guru Bahasa Indonesia', 'Bahasa adalah identitas bangsa yang harus dilestarikan');

-- Tabel Ekstrakurikuler
CREATE TABLE IF NOT EXISTS ekstrakurikuler (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    pembina VARCHAR(100),
    jadwal VARCHAR(100),
    gambar VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample ekstrakurikuler
INSERT INTO ekstrakurikuler (nama, deskripsi, pembina, jadwal) VALUES
('Pramuka', 'Kegiatan kepramukaan untuk membentuk karakter kepemimpinan dan kemandirian siswa', 'Rudi Hartono, S.Pd', 'Setiap Jumat, 14:00-16:00'),
('Marching Band', 'Latihan marching band untuk mengembangkan bakat seni musik dan kekompakan tim', 'Fitri Handayani, S.Pd', 'Selasa & Kamis, 15:00-17:00'),
('Futsal', 'Olahraga futsal untuk meningkatkan kesehatan dan sportivitas', 'Rudi Hartono, S.Pd', 'Senin & Rabu, 15:30-17:00');

-- Tabel Kontak/Pesan
CREATE TABLE IF NOT EXISTS pesan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telepon VARCHAR(20),
    pesan TEXT NOT NULL,
    status ENUM('baru', 'dibaca', 'diproses') DEFAULT 'baru',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Index untuk optimasi
CREATE INDEX idx_kategori ON prestasi(kategori);
CREATE INDEX idx_tanggal_post ON berita(tanggal_post);
CREATE INDEX idx_status ON pesan(status);