@extends('layout.app')

@section('title', 'Pengaduan Warga')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    :root {
        --primary: #6b8cbe;
        --primary-dark: #5a7aad;
        --primary-light: #7c9dd1;
        --accent: #8a9fd4;
        --secondary: #9dafd9;
        --dark: #2a3547;
        --text: #334155;
        --text-light: #64748b;
        --bg: #f8fafc;
        --white: #ffffff;
    }

    /* ================= HERO SECTION ================= */
    #curhat-hero {
        background: linear-gradient(135deg, #6b8cbe 0%, #8a9fd4 100%);
        padding: 100px 0 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    #curhat-hero::before,
    #curhat-hero::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255, 255, 255, .12), transparent 70%);
    }

    #curhat-hero::before {
        width: 600px;
        height: 600px;
        top: -300px;
        right: -100px;
        animation: float 25s ease-in-out infinite;
    }

    #curhat-hero::after {
        width: 400px;
        height: 400px;
        bottom: -200px;
        left: -100px;
        animation: float 20s ease-in-out infinite reverse;
    }

    @keyframes float {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(50px, -50px);
        }
    }

    #curhat-hero h1 {
        font-weight: 900;
        letter-spacing: -1px;
        color: #fff;
        position: relative;
        z-index: 1;
        text-shadow: 0 4px 20px rgba(0, 0, 0, .15);
        font-size: 3rem;
    }

    #curhat-hero p {
        max-width: 650px;
        margin: 20px auto 0;
        color: rgba(255, 255, 255, .95);
        position: relative;
        z-index: 1;
        font-size: 1.2rem;
        font-weight: 500;
    }

    /* ================= INFO CARDS ================= */
    .info-section {
        margin-top: -60px;
        position: relative;
        z-index: 10;
    }

    .info-card {
        background: var(--white);
        border-radius: 20px;
        padding: 32px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(107, 140, 190, 0.15);
        transition: all .4s ease;
        height: 100%;
        border: 1px solid #e2e8f0;
    }

    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(107, 140, 190, 0.25);
        border-color: var(--primary-light);
    }

    .info-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6b8cbe, #8a9fd4);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 8px 20px rgba(107, 140, 190, .3);
    }

    .info-icon i {
        font-size: 36px;
        color: #fff;
    }

    .info-card h6 {
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
        font-size: 18px;
    }

    .info-card p {
        font-size: 14px;
        color: var(--text-light);
        margin: 0;
    }

    /* ================= FORM SECTION ================= */
    .form-section {
        padding: 100px 0 80px;
    }

    .form-container {
        background: var(--white);
        border-radius: 28px;
        padding: 60px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        position: relative;
        border: 1px solid #e2e8f0;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #6b8cbe, #8a9fd4);
        border-radius: 28px 28px 0 0;
    }

    .form-header {
        text-align: center;
        margin-bottom: 50px;
        padding-bottom: 30px;
        border-bottom: 2px solid #e2e8f0;
    }

    .form-header h3 {
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 12px;
        font-size: 32px;
        letter-spacing: -0.5px;
    }

    .form-header p {
        color: var(--text-light);
        margin: 0;
        font-size: 16px;
    }

    /* ================= FORM INPUTS ================= */
    .form-label {
        font-weight: 700;
        color: var(--text);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
    }

    .form-label i {
        color: var(--primary);
        font-size: 16px;
    }

    .form-control,
    .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 14px;
        padding: 14px 20px;
        font-size: 15px;
        transition: all .3s ease;
        background: var(--bg);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(107, 140, 190, 0.1);
        background: var(--white);
    }

    .form-control::placeholder {
        color: #cbd5e1;
    }

    /* ================= FILE INPUT ================= */
    .file-input-wrapper {
        position: relative;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 40px;
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        background: linear-gradient(135deg, rgba(107, 140, 190, .05), rgba(138, 159, 212, .05));
        cursor: pointer;
        transition: all .3s ease;
    }

    .file-input-label:hover {
        border-color: var(--primary);
        background: linear-gradient(135deg, rgba(107, 140, 190, .1), rgba(138, 159, 212, .1));
    }

    .file-input-label i {
        font-size: 40px;
        color: var(--primary);
    }

    .file-input-label span {
        color: var(--text);
        font-weight: 600;
    }

    input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    /* ================= ALERTS ================= */
    .alert {
        border: none;
        border-radius: 16px;
        padding: 18px 24px;
        margin-bottom: 30px;
        border-left: 4px solid;
    }

    .alert-success {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        color: #065f46;
        border-color: #10b981;
    }

    .alert-danger {
        background: linear-gradient(135deg, #fee2e2, #fecaca);
        color: #991b1b;
        border-color: #ef4444;
    }

    /* ================= SUBMIT BUTTON ================= */
    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 16px 60px;
        background: linear-gradient(135deg, #6b8cbe, #8a9fd4);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 17px;
        transition: all .3s ease;
        box-shadow: 0 12px 30px rgba(107, 140, 190, 0.4);
        position: relative;
        overflow: hidden;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #8a9fd4, #9dafd9);
        opacity: 0;
        transition: .3s;
    }

    .btn-submit:hover::before {
        opacity: 1;
    }

    .btn-submit:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(107, 140, 190, 0.5);
    }

    .btn-submit span,
    .btn-submit i {
        position: relative;
        z-index: 1;
    }

    .btn-submit i {
        font-size: 20px;
    }

    /* ================= HELPER TEXT ================= */
    .form-text {
        font-size: 13px;
        color: #94a3b8;
        margin-top: 8px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        #curhat-hero {
            padding: 80px 0 60px;
        }

        #curhat-hero h1 {
            font-size: 2rem;
        }

        #curhat-hero p {
            font-size: 1rem;
        }

        .info-section {
            margin-top: -40px;
        }

        .info-card {
            padding: 24px;
        }

        .form-container {
            padding: 40px 24px;
        }

        .form-header h3 {
            font-size: 24px;
        }

        .btn-submit {
            width: 100%;
            padding: 16px 40px;
        }
    }

    html {
        scroll-behavior: smooth;
    }

    ::selection {
        background: var(--primary);
        color: #fff;
    }
</style>

<!-- Hero Section -->
<section id="curhat-hero">
    <div class="container">
        <h1 data-aos="fade-down">PENGADUAN WARGA DESA PAJARAKAN</h1>
        <p data-aos="fade-up">
            Sampaikan laporan Anda agar desa dapat menangani dengan cepat dan tepat
        </p>
    </div>
</section>

<!-- Info Cards -->
<div class="container info-section">
    <div class="row g-4" data-aos="fade-up">
        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h6>Aman & Terpercaya</h6>
                <p>Data Anda dijamin kerahasiaannya</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <h6>Respon Cepat</h6>
                <p>Tim kami siap menanggapi laporan</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card">
                <div class="info-icon">
                    <i class="bi bi-chat-heart"></i>
                </div>
                <h6>Mudah & Praktis</h6>
                <p>Proses pelaporan yang sederhana</p>
            </div>
        </div>
    </div>
</div>

<!-- Form Section -->
<section class="form-section" style="background: var(--bg);">
    <div class="container" data-aos="fade-up" data-aos-delay="150">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="form-container">

                    <!-- Form Header -->
                    <div class="form-header">
                        <h3>Form Pengaduan Warga</h3>
                        <p>Isi formulir di bawah ini dengan lengkap dan jelas</p>
                    </div>

                    <!-- Alerts -->
                    @if(session('success'))
                    <div class="alert alert-success" data-aos="zoom-in">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger" data-aos="shake">
                        <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi kesalahan:</strong>
                        <ul class="mt-2 mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('ruang_curhat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <!-- Status Pelapor -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-person-badge"></i>
                                    Status Pelapor
                                </label>
                                <select class="form-select" name="status_pelapor" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Warga Desa">Warga Desa</option>
                                    <option value="Non Warga">Bukan Warga Desa</option>
                                </select>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-person"></i>
                                    Nama Lengkap
                                </label>
                                <input type="text"
                                    class="form-control"
                                    name="nama_lengkap"
                                    placeholder="Masukkan nama lengkap Anda"
                                    required>
                            </div>

                            <!-- Nomor HP -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-telephone"></i>
                                    Nomor HP
                                </label>
                                <input type="text"
                                    class="form-control"
                                    name="nomor_hp"
                                    placeholder="Contoh: 08123456789"
                                    required>
                                <small class="form-text">Nomor yang dapat dihubungi</small>
                            </div>

                            <!-- Alamat -->
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-geo-alt"></i>
                                    Alamat
                                </label>
                                <textarea class="form-control"
                                    name="alamat"
                                    rows="3"
                                    placeholder="Masukkan alamat lengkap Anda"></textarea>
                            </div>

                            <!-- Isi Pengaduan -->
                            <div class="col-12 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-chat-square-text"></i>
                                    Isi Pengaduan
                                </label>
                                <textarea class="form-control"
                                    name="isi_pengaduan"
                                    rows="6"
                                    placeholder="Jelaskan pengaduan Anda dengan detail..."
                                    required></textarea>
                                <small class="form-text">Jelaskan masalah yang ingin Anda laporkan secara detail</small>
                            </div>

                            <!-- Foto Pendukung -->
                            <div class="col-12 mb-4">
                                <label class="form-label">
                                    <i class="bi bi-camera"></i>
                                    Foto Pendukung (Opsional)
                                </label>
                                <div class="file-input-wrapper">
                                    <label class="file-input-label">
                                        <i class="bi bi-cloud-upload"></i>
                                        <div>
                                            <span class="d-block">Klik untuk upload foto</span>
                                            <small class="text-muted d-block mt-1">Format: JPG, PNG (Max 2MB)</small>
                                        </div>
                                    </label>
                                    <input type="file"
                                        class="form-control"
                                        name="foto_pendukung"
                                        accept="image/*">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn-submit">
                                    <i class="bi bi-send-fill"></i>
                                    <span>Kirim Pengaduan</span>
                                </button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // File input preview
    document.querySelector('input[type="file"]').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if (fileName) {
            const label = document.querySelector('.file-input-label span');
            label.textContent = fileName;
        }
    });
</script>

@endsection