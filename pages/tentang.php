<?php
require_once '../config.php';
$pageTitle = "Tentang Kami";
include '../includes/header.php';
?>

<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <h1>Tentang Kami</h1>
        <p>Mengenal lebih dekat Sekolah Insan Teladan</p>
    </div>
</div>

<!-- Content -->
<section class="section">
    <div class="container">
        <!-- Sejarah -->
        <div class="content-block">
            <h2 class="section-subtitle">Sejarah Sekolah</h2>
            <p>
                Sekolah Insan Teladan adalah sekolah swasta umum berbasis biaya yang didirikan pada tanggal 3 Agustus 2004. 
                Sekolah ini didirikan untuk menjadi sekolah model dalam Pendidikan Nilai-nilai Kemanusiaan (PNK), yang merupakan 
                program Pendidikan berkarakter yang dikembangkan di Indonesia.
            </p>
            <p>
                Pendidikan Nilai-nilai Kemanusiaan memiliki lima nila inti yang menjadi karakteristik manusia, yaitu Kebenanan, 
                Kebajikan, Kasih Sayang, Kedamaian dan Tanpa Kekerasan. Nilai-nilai ini yang dianut serta seluruh sekolah dimulai 
                dari pendik, penangg kependingan (stakeholders), guru, siswa dan seluruh orang tua (wali murid).
            </p>
        </div>

        <!-- Visi Misi -->
        <div class="content-block">
            <h2 class="section-subtitle">Visi & Misi</h2>
            
            <div class="visi-misi-container">
                <div class="visi-box">
                    <div class="vm-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>VISI</h3>
                    <p>
                        "Menumbuhkan Kembangkan Generasi Penerus Bangsa Yang Cerdas, Peduli, 
                        Berkarakter Baik Berdasarkan Nilai-Nilai Kemanusiaan Dan Menjadi Manusia Seutuhnya"
                    </p>
                </div>
                
                <div class="misi-box">
                    <div class="vm-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>MISI</h3>
                    <ul class="misi-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Mendirikan dan menyelenggarakan sekolah dalam berbagai jenjang pendidikan yang berbasis pada 
                            nilai-nilai kemanusiaan (kebenaran, kebajikan, kedamaian, cinta kasih dan tanpa kekerasan).</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Mensosialisasikan program pendidikan nilai-nilai kemanusiaan kepada masyarakat luas secara nasional melalui sekolah.</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Menjadikan sekolah sebagai sekolah model yang melaksanakan dan menerapkan pendidikan nilai-nilai 
                            kemanusiaan/pendidikan berkarakter.</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Menyelenggarakan pendidikan yang mengkombinasikan pengembangan budi pekerti dalam proses 
                            kegiatan belajar mengajar disekolah.</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Memberikan kesempatan memperoleh pendidikan bermutu, tanpa biaya dari Orang tua peserta didik 
                            terutama bagi masyarakat kurang mampu.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filosofi -->
        <div class="content-block">
            <h2 class="section-subtitle">Filosofi Pendidikan</h2>
            <p>
                Orang tua adalah salah satu faktor yang penting dalam kesuksesan program PNK di Sekolah Insan Teladan. 
                Sekolah dan orang tua bekerja sama agar proses pembelajaran anak-anak berlajan lancar baik di sekolah 
                maupun di rumah.
            </p>
            <p>
                Kegiasama yang dilakukan sekolah dengan orang tua dan misi sekolah yaitu "Menumbuhkembangkan Generasi 
                Penerus Bangsa Yang Cerdas, Peduli, Berkarakter Baik Berdasarkan Nilai-Nilai Kemanusiaan dan Menjadi 
                Manusia Seutuhnya".
            </p>
        </div>

        <!-- Keunggulan -->
        <div class="content-block">
            <h2 class="section-subtitle">Keunggulan Kami</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <h4>Kurikulum Nasional</h4>
                    <p>Menerapkan kurikulum nasional (KTSP) yang diperkaya dengan pendidikan karakter</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h4>Guru Berkualitas</h4>
                    <p>Tenaga pengajar profesional dan berpengalaman di bidangnya</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Pendidikan Karakter</h4>
                    <p>Fokus pada pembentukan nilai-nilai kemanusiaan dalam setiap aspek pembelajaran</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h4>Lingkungan Kondusif</h4>
                    <p>Suasana belajar yang nyaman dan mendukung perkembangan optimal anak</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.content-block {
    margin-bottom: 60px;
}

.section-subtitle {
    font-size: 2rem;
    color: var(--primary-color);
    margin-bottom: 25px;
    font-weight: 700;
}

.content-block p {
    line-height: 1.8;
    color: var(--text-light);
    margin-bottom: 20px;
    font-size: 1.05rem;
}

.visi-misi-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-top: 30px;
}

.visi-box, .misi-box {
    background: white;
    padding: 40px;
    border-radius: 12px;
    box-shadow: var(--shadow);
}

.vm-icon {
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

.visi-box h3, .misi-box h3 {
    text-align: center;
    font-size: 1.5rem;
    color: var(--primary-color);
    margin-bottom: 20px;
}

.visi-box p {
    text-align: center;
    font-style: italic;
    color: var(--text-dark);
    line-height: 1.8;
}

.misi-list {
    list-style: none;
}

.misi-list li {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    align-items: flex-start;
}

.misi-list i {
    color: var(--primary-color);
    font-size: 1.2rem;
    margin-top: 3px;
    flex-shrink: 0;
}

.misi-list span {
    line-height: 1.7;
    color: var(--text-light);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-top: 30px;
}

.feature-item {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: var(--shadow);
    text-align: center;
    transition: var(--transition);
}

.feature-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
}

.feature-icon-box {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
    color: white;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 20px;
}

.feature-item h4 {
    font-size: 1.2rem;
    color: var(--text-dark);
    margin-bottom: 12px;
}

.feature-item p {
    color: var(--text-light);
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .visi-misi-container,
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .section-subtitle {
        font-size: 1.6rem;
    }
}
</style>

<?php include '../includes/footer.php'; ?>