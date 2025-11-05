<?php
require_once '../config.php';
$pageTitle = "Kurikulum SD";
include '../includes/header.php';
?>

<div class="page-header">
    <div class="page-header-content">
        <h1>Kurikulum SD</h1>
        <p>Program pendidikan untuk Sekolah Dasar</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <p>Adapun muatan kurikulum SD Insan Teladan seperti ketentuan tersebut tersusun dalam tabel berikut:</p>
        
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Komponen</th>
                        <th colspan="3">Kelas dan Alokasi Waktu</th>
                    </tr>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>I</th>
                        <th>II</th>
                        <th>III</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4"><strong>Pembelajaran Tematik</strong></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Agama</td>
                        <td>3</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Pendidikan Kewarganegaraan</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td>6</td>
                        <td>6</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>Matematika</td>
                        <td>6</td>
                        <td>6</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>6</td>
                        <td>6</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>Ilmu Pengetahuan Sosial</td>
                        <td>3</td>
                        <td>3</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Seni Budaya dan Keterampilan</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                        <td>2</td>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>