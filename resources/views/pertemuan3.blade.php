<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBW CSS</title>
    <link rel="stylesheet" href="css/Exercise.css">
</head>
<body>
    <div class="sidebar">
        <div class="admin-section">
            <img src="image/pertemuan-3/logo_user.jpg" alt="Admin Avatar" class="avatar">
            <div class="admin-info">
                <h3>Admin</h3>
                <p>admin@mail.com</p>
            </div>
        </div>

        <nav class="menu">
            <a href="#" class="menu-item">
                <span class="icon">📅</span> Helperlog
            </a>
            <a href="#" class="menu-item">
                <span class="icon">🔍</span> Helperfind
            </a>
        </nav>

        <button class="logout-btn">
            ⏻ Log Out
        </button>
    </div>

    <div class="content">
        <a href="#" class="back-btn">← Detail Ajuan Pesanan</a>

        <div class="card">
            <h2>Proses Pengajuan Pesanan</h2>
            <div class="progress">
                <div class="step completed">
                    <span class="icon">✔</span>
                    <p>Ajuan Dibuat</p>
                </div>
                <div class="line completed"></div>
                <div class="step active">
                    <span class="icon">⏳</span>
                    <p>Proses Review</p>
                </div>
                <div class="line"></div>
                <div class="step">
                    <span class="icon">✔</span>
                    <p>Disetujui</p>
                </div>
            </div>

            <div class="info-container">
                <span class="info-label">ID Kontrak</span><span class="info-value">: 12726387468234</span>
                <span class="info-label">Tanggal Pengajuan</span><span class="info-value">: 5 Juli 2024 12:57 WIB</span>
                <span class="info-label">Nama Pengaju</span><span class="info-value">: Bayu Liano</span>
                <span class="info-label">Nama PRT</span><span class="info-value">: Intan Permata</span>
                <span class="info-label">Pekerjaan</span><span class="info-value">: Baby Sitter</span>
                <span class="info-label">Lama Kontrak</span><span class="info-value">: 12 bulan</span>
                <span class="info-label">Nominal</span><span class="info-value">: Rp 2.500.000,-</span>
            </div>

            <div class="actions">
                <button class="approve">Setuju</button>
                <button class="reject">Tolak</button>
            </div>
        </div>
    </div>
</body>
</html>
