@extends('layout.app')

@section('title', 'Beranda Desa Pajarakan')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    /* ================= HERO SECTION ================= */
    #hero {
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }

    /* Background Carousel */
    #heroBackground {
        position: absolute;
        inset: 0;
        z-index: 1;
    }

    #heroBackground .carousel-inner,
    #heroBackground .carousel-item,
    #heroBackground .bg-slide {
        width: 100%;
        height: 100vh;
    }

    .bg-slide {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        transition: transform 8s ease;
    }

    #heroBackground .carousel-item.active .bg-slide {
        animation: kenBurns 8s ease-out forwards;
    }

    @keyframes kenBurns {
        from {
            transform: scale(1);
        }

        to {
            transform: scale(1.1);
        }
    }

    /* Overlay Gradient - Updated to Blue */
    /* Overlay - Dark but not too black */
    #hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(30, 30, 30, 0.5);
        z-index: 2;
    }

    /* Hero Content - Centered */
    .hero-content {
        position: relative;
        z-index: 3;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        padding: 0 20px;
    }

    .hero-text-wrapper {
        max-width: 900px;
        margin: 0 auto;
    }

    /* Hero Typography - Updated */
    .hero-subtitle {
        font-size: 0.95rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #93c5fd;
        margin-bottom: 20px;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s ease;
    }

    .hero-subtitle.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Hero Judul 1 - Larger with Gold Color */
    #heroJudul1 {
        font-size: 3.5rem;
        font-weight: 700;
        letter-spacing: 1px;
        line-height: 1.3;
        margin-bottom: 10px;
        color: #fbbf24;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease 0.2s;
    }

    #heroJudul1.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Hero Judul 2 - Smaller, White, Professional */
    #heroJudul2 {
        font-size: 3.5rem;
        font-weight: 800;
        letter-spacing: 0.5px;
        line-height: 1.3;
        margin-bottom: 25px;
        color: #ffffff;
        text-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease 0.4s;
    }

    #heroJudul2.show {
        opacity: 1;
        transform: translateY(0);
    }

    #heroSubtitle {
        font-size: 1.15rem;
        font-weight: 400;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 35px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s ease 0.6s;
    }

    #heroSubtitle.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Hero Buttons - Updated to Blue */
    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.8s ease 0.8s;
    }

    .hero-buttons.show {
        opacity: 1;
        transform: translateY(0);
    }

    .btn-hero-primary {
        padding: 15px 40px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(59, 130, 246, 0.6);
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
    }

    .btn-hero-outline {
        padding: 15px 40px;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.8);
        color: #fff;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-hero-outline:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: #fff;
        transform: translateY(-3px);
        color: #fff;
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        animation: bounce 2s infinite;
    }

    .scroll-indicator i {
        font-size: 2rem;
        color: #fff;
        opacity: 0.8;
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateX(-50%) translateY(0);
        }

        40% {
            transform: translateX(-50%) translateY(-10px);
        }

        60% {
            transform: translateX(-50%) translateY(-5px);
        }
    }

    /* ================= SECTION STYLES ================= */
    .section {
        padding: 80px 0;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-subtitle {
        color: #3b82f6;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 15px;
    }

    .section-description {
        color: #64748b;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* ================= SEJARAH SECTION ================= */
    #sejarah {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    }

    .sejarah-card {
        background: #fff;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(59, 130, 246, 0.15);
        height: 100%;
    }

    .sejarah-card h3 {
        font-size: 2rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .sejarah-card h3 span {
        color: #3b82f6;
    }

    .sejarah-content {
        margin-top: 30px;
    }

    .sejarah-quote {
        font-size: 1.5rem;
        font-weight: 700;
        color: #3b82f6;
        margin-bottom: 20px;
        position: relative;
        padding-left: 30px;
    }

    .sejarah-quote::before {
        content: '"';
        position: absolute;
        left: 0;
        top: -10px;
        font-size: 4rem;
        color: #bfdbfe;
        opacity: 0.5;
    }

    .sejarah-text {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #4b5563;
        text-align: justify;
        margin-bottom: 25px;
    }

    .read-more-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #3b82f6;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .read-more-link:hover {
        gap: 12px;
        color: #2563eb;
    }

    .sejarah-img-wrapper {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .sejarah-img-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.3), transparent);
        z-index: 1;
    }

    .sejarah-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .sejarah-img-wrapper:hover img {
        transform: scale(1.05);
    }

    /* ================= KEPALA DESA SECTION ================= */
    #kades {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        position: relative;
        overflow: hidden;
    }

    /* Decorative Background Elements */
    #kades::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.08), transparent);
        border-radius: 50%;
    }

    #kades::after {
        content: '';
        position: absolute;
        bottom: -150px;
        left: -150px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(37, 99, 235, 0.05), transparent);
        border-radius: 50%;
    }

    .kades-card {
        background: #fff;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        position: relative;
        z-index: 2;
    }

    /* ================= FOTO KEPALA DESA - TRULY RESPONSIVE ================= */
    .kades-img-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        /* KUNCI: width & height FIXED sesuai ukuran yang diinginkan */
        width: 280px !important;
        /* Lebar fixed */
        height: 350px !important;
        /* Tinggi fixed */
        margin: 0 auto;
        /* Glass Effect Border */
        border: 3px solid rgba(255, 255, 255, 0.5);
        /* Premium Shadow */
        box-shadow:
            0 20px 50px rgba(59, 130, 246, 0.25),
            0 10px 25px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .kades-img-wrapper:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow:
            0 30px 70px rgba(59, 130, 246, 0.35),
            0 15px 35px rgba(0, 0, 0, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    /* Gradient Overlay - Subtle */
    .kades-img-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg,
                rgba(59, 130, 246, 0.1) 0%,
                transparent 30%,
                transparent 70%,
                rgba(0, 0, 0, 0.3) 100%);
        z-index: 2;
        pointer-events: none;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .kades-img-wrapper:hover::before {
        opacity: 0.5;
    }

    /* Decorative Corner Frames */
    .kades-img-wrapper::after {
        content: '';
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 12px;
        z-index: 3;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .kades-img-wrapper:hover::after {
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        border-color: rgba(255, 255, 255, 0.6);
    }

    /* Image Styling - INI YANG PENTING */
    .kades-img-wrapper img {
        width: 100% !important;
        height: 100% !important;
        max-width: 280px !important;
        /* Sama dengan wrapper */
        max-height: 350px !important;
        /* Sama dengan wrapper */
        object-fit: cover;
        /* Crop jika gambar terlalu besar */
        object-position: center top;
        /* Fokus ke wajah (atas-tengah) */
        display: block;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
        filter: brightness(1.05) contrast(1.05);
    }

    .kades-img-wrapper:hover img {
        transform: scale(1.08);
        filter: brightness(1.1) contrast(1.1);
    }

    /* Mini Badge on Photo */
    .kades-img-wrapper .photo-label {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 8px 16px;
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        z-index: 4;
        display: flex;
        align-items: center;
        gap: 6px;
        transform: scale(0.9);
        transition: transform 0.3s ease;
    }

    .kades-img-wrapper:hover .photo-label {
        transform: scale(1);
    }

    .photo-label i {
        color: #3b82f6;
        font-size: 1rem;
    }

    .photo-label span {
        color: #1f2937;
        font-weight: 700;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }

    /* Shine Effect */
    .kades-img-wrapper .shine {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg,
                transparent 30%,
                rgba(255, 255, 255, 0.3) 50%,
                transparent 70%);
        transform: rotate(45deg);
        z-index: 5;
        pointer-events: none;
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% {
            left: -200%;
        }

        50%,
        100% {
            left: 200%;
        }
    }

    /* ================= CONTENT STYLING - ENHANCED ================= */
    .kades-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: #fff;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        box-shadow:
            0 4px 15px rgba(59, 130, 246, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .kades-badge::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .kades-badge:hover::before {
        width: 300px;
        height: 300px;
    }

    .kades-badge i {
        font-size: 1rem;
    }

    .kades-name {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 15px;
        line-height: 1.2;
        position: relative;
        display: inline-block;
    }

    .kades-name::before {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #60a5fa);
        border-radius: 2px;
        transition: width 0.6s ease;
    }

    .kades-name:hover::before {
        width: 120px;
    }

    .kades-profile {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #4b5563;
        margin-bottom: 35px;
        text-align: justify;
        position: relative;
        padding-left: 20px;
        border-left: 3px solid #e5e7eb;
    }

    /* Sambutan Box - Premium Design */
    .sambutan-box {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-radius: 20px;
        padding: 40px;
        border: 2px solid rgba(59, 130, 246, 0.2);
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.1);
    }

    .sambutan-box::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.1), transparent);
        border-radius: 50%;
    }

    .sambutan-box::after {
        content: '"';
        position: absolute;
        top: 10px;
        right: 30px;
        font-size: 100px;
        color: rgba(59, 130, 246, 0.08);
        font-family: Georgia, serif;
        line-height: 1;
    }

    .sambutan-box h5 {
        font-weight: 800;
        color: #1e3a8a;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.3rem;
        position: relative;
        z-index: 1;
    }

    .sambutan-box h5 i {
        color: #3b82f6;
        font-size: 1.5rem;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    .sambutan-text {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #374151;
        text-align: justify;
        position: relative;
        z-index: 1;
    }

    /* ================= RESPONSIVE ================= */
    /* ================= KEPALA DESA SECTION ================= */
    #kades {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        position: relative;
        overflow: hidden;
    }

    /* Decorative Background Elements */
    #kades::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.08), transparent);
        border-radius: 50%;
    }

    #kades::after {
        content: '';
        position: absolute;
        bottom: -150px;
        left: -150px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(37, 99, 235, 0.05), transparent);
        border-radius: 50%;
    }

    .kades-card {
        background: #fff;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        position: relative;
        z-index: 2;
    }

    /* ================= FOTO KEPALA DESA - UKURAN IDEAL ================= */
    .kades-img-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        /* Ukuran lebih besar & proporsional */
        width: 380px !important;
        /* Lebih besar */
        height: 480px !important;
        /* Lebih tinggi */
        margin: 0 auto;
        /* Glass Effect Border */
        border: 3px solid rgba(255, 255, 255, 0.5);
        /* Premium Shadow */
        box-shadow:
            0 20px 50px rgba(59, 130, 246, 0.25),
            0 10px 25px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .kades-img-wrapper:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow:
            0 30px 70px rgba(59, 130, 246, 0.35),
            0 15px 35px rgba(0, 0, 0, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.6);
    }

    /* Gradient Overlay - Subtle */
    .kades-img-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg,
                rgba(59, 130, 246, 0.1) 0%,
                transparent 30%,
                transparent 70%,
                rgba(0, 0, 0, 0.3) 100%);
        z-index: 2;
        pointer-events: none;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .kades-img-wrapper:hover::before {
        opacity: 0.5;
    }

    /* Decorative Corner Frames */
    .kades-img-wrapper::after {
        content: '';
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 12px;
        z-index: 3;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .kades-img-wrapper:hover::after {
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        border-color: rgba(255, 255, 255, 0.6);
    }

    /* Image Styling */
    .kades-img-wrapper img {
        width: 100% !important;
        height: 100% !important;
        max-width: 380px !important;
        /* Sama dengan wrapper */
        max-height: 480px !important;
        /* Sama dengan wrapper */
        object-fit: cover;
        object-position: center top;
        display: block;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
        filter: brightness(1.05) contrast(1.05);
    }

    .kades-img-wrapper:hover img {
        transform: scale(1.08);
        filter: brightness(1.1) contrast(1.1);
    }

    /* Mini Badge on Photo */
    .kades-img-wrapper .photo-label {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 8px 16px;
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        z-index: 4;
        display: flex;
        align-items: center;
        gap: 6px;
        transform: scale(0.9);
        transition: transform 0.3s ease;
    }

    .kades-img-wrapper:hover .photo-label {
        transform: scale(1);
    }

    .photo-label i {
        color: #3b82f6;
        font-size: 1rem;
    }

    .photo-label span {
        color: #1f2937;
        font-weight: 700;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }

    /* Shine Effect */
    .kades-img-wrapper .shine {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg,
                transparent 30%,
                rgba(255, 255, 255, 0.3) 50%,
                transparent 70%);
        transform: rotate(45deg);
        z-index: 5;
        pointer-events: none;
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% {
            left: -200%;
        }

        50%,
        100% {
            left: 200%;
        }
    }

    /* ================= CONTENT STYLING - ENHANCED ================= */
    .kades-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: #fff;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        box-shadow:
            0 4px 15px rgba(59, 130, 246, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        position: relative;
        overflow: hidden;
    }

    .kades-badge::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .kades-badge:hover::before {
        width: 300px;
        height: 300px;
    }

    .kades-badge i {
        font-size: 1rem;
    }

    .kades-name {
        font-size: 2.5rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 15px;
        line-height: 1.2;
        position: relative;
        display: inline-block;
    }

    .kades-name::before {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #60a5fa);
        border-radius: 2px;
        transition: width 0.6s ease;
    }

    .kades-name:hover::before {
        width: 120px;
    }

    .kades-profile {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #4b5563;
        margin-bottom: 35px;
        text-align: justify;
        position: relative;
        padding-left: 20px;
        border-left: 3px solid #e5e7eb;
    }

    /* Sambutan Box - Premium Design */
    .sambutan-box {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border-radius: 20px;
        padding: 40px;
        border: 2px solid rgba(59, 130, 246, 0.2);
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.1);
    }

    .sambutan-box::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.1), transparent);
        border-radius: 50%;
    }

    .sambutan-box::after {
        content: '"';
        position: absolute;
        top: 10px;
        right: 30px;
        font-size: 100px;
        color: rgba(59, 130, 246, 0.08);
        font-family: Georgia, serif;
        line-height: 1;
    }

    .sambutan-box h5 {
        font-weight: 800;
        color: #1e3a8a;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.3rem;
        position: relative;
        z-index: 1;
    }

    .sambutan-box h5 i {
        color: #3b82f6;
        font-size: 1.5rem;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    .sambutan-text {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #374151;
        text-align: justify;
        position: relative;
        z-index: 1;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 991px) {
        .kades-img-wrapper {
            width: 340px !important;
            height: 430px !important;
            margin: 0 auto 40px;
        }

        .kades-img-wrapper img {
            max-width: 340px !important;
            max-height: 430px !important;
        }
    }

    @media (max-width: 768px) {
        .kades-img-wrapper {
            width: 300px !important;
            height: 380px !important;
        }

        .kades-img-wrapper img {
            max-width: 300px !important;
            max-height: 380px !important;
        }

        .kades-card {
            padding: 35px;
        }

        .kades-name {
            font-size: 2rem;
        }

        .sambutan-box {
            padding: 30px;
        }
    }

    @media (max-width: 576px) {
        .kades-img-wrapper {
            width: 260px !important;
            height: 340px !important;
        }

        .kades-img-wrapper img {
            max-width: 260px !important;
            max-height: 340px !important;
        }

        .kades-card {
            padding: 25px;
        }

        .kades-name {
            font-size: 1.7rem;
        }

        .sambutan-box {
            padding: 25px;
        }

        .sambutan-box h5 {
            font-size: 1.1rem;
        }
    }

    .sambutan-box {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border-radius: 16px;
        padding: 30px;
        border-left: 5px solid #3b82f6;
    }

    .sambutan-box h5 {
        font-weight: 800;
        color: #1e3a8a;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sambutan-box h5 i {
        color: #3b82f6;
    }

    .sambutan-text {
        font-size: 1.05rem;
        line-height: 1.9;
        color: #4b5563;
        text-align: justify;
    }

    /* ================= BERITA SECTION ================= */
    #berita {
        background: #fff;
    }

    .berita-header {
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        padding: 25px 35px;
        border-radius: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
    }

    .berita-header h4 {
        margin: 0;
        font-weight: 800;
        color: #1e3a8a;
    }

    .berita-main-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .berita-main-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
    }

    .berita-main-img {
        position: relative;
        height: 350px;
        overflow: hidden;
    }

    .berita-main-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .berita-main-card:hover .berita-main-img img {
        transform: scale(1.1);
    }

    .berita-main-body {
        padding: 35px;
    }

    .berita-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #3b82f6;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .berita-main-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .berita-main-excerpt {
        font-size: 1rem;
        line-height: 1.7;
        color: #64748b;
        margin-bottom: 25px;
    }

    .btn-read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 28px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: #fff;
        border: none;
        border-radius: 30px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-read-more:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        color: #fff;
    }

    /* Berita Side */
    .berita-side-item {
        background: #fff;
        border-radius: 12px;
        padding: 15px;
        display: flex;
        gap: 15px;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .berita-side-item:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.15);
    }

    .berita-side-img {
        width: 100px;
        height: 75px;
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .berita-side-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .berita-side-content h6 {
        font-size: 0.95rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .berita-side-date {
        color: #3b82f6;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        #heroJudul1 {
            font-size: 2.5rem;
        }

        #heroJudul2 {
            font-size: 1.8rem;
        }

        #heroSubtitle {
            font-size: 1rem;
        }

        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-hero-primary,
        .btn-hero-outline {
            width: 100%;
            max-width: 300px;
        }

        .sejarah-card,
        .kades-card {
            padding: 30px;
        }

        .berita-main-img {
            height: 250px;
        }
    }
</style>

{{-- ================= HERO SECTION ================= --}}
@php
$heroAktif = $heroSlides->first();
@endphp

<section id="hero">
    <!-- Background Slider -->
    <div id="heroBackground"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
        data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach ($heroSlides as $key => $slide)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}"
                data-judul1="{{ $slide->judul_1 }}"
                data-judul2="{{ $slide->judul_2 }}"
                data-subtitle="{{ $slide->subtitle }}">
                <div class="bg-slide" style="background-image:url('{{ asset('storage/'.$slide->gambar) }}')"></div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Hero Content - Centered -->
    <div class="hero-content">
        <div class="hero-text-wrapper">
            @if($heroAktif)
            <h1 id="heroJudul1" class="show">{{ $heroAktif->judul_1 }}</h1>
            <h1 id="heroJudul2" class="show">{{ $heroAktif->judul_2 }}</h1>
            <p id="heroSubtitle" class="show">{{ $heroAktif->subtitle }}</p>
            @endif

            <div class="hero-buttons show">
                <a href="#sejarah" class="btn-hero-primary">
                    Jelajahi Desa
                    <i class="bi bi-arrow-right"></i>
                </a>
                <a href="https://youtu.be/P7Vt3pb8fYI?si=LkfVCq3ZsF0s4l0z" target="_blank" class="btn-hero-outline">
                    <i class="bi bi-info-circle"></i>
                    Profil Desa
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ================= SEJARAH SECTION ================= --}}
<section id="sejarah" class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="sejarah-card">
                    <h3><span>Sejarah</span> Desa Pajarakan Kulon</h3>
                    <div class="sejarah-content">
                        <div class="sejarah-quote">Asal-Usul</div>
                        @if($sejarah)
                        <p class="sejarah-text">
                            {{ \Illuminate\Support\Str::limit(strip_tags($sejarah->sejarah), 350) }}
                        </p>
                        <a href="{{ route('sejarah') }}" class="read-more-link">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        @else
                        <p class="sejarah-text">Data sejarah belum tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                @if($sejarah && $sejarah->img)
                <div class="sejarah-img-wrapper">
                    <img src="{{ asset('storage/'.$sejarah->img) }}" alt="Sejarah Desa Pajarakan">
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ================= KEPALA DESA SECTION ================= --}}
<section id="kades" class="section">
    <div class="container">
        @if($kepdes)
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1000">
                <div class="kades-img-wrapper">
                    <img src="{{ asset('storage/'.$kepdes->foto) }}" alt="Kepala Desa Laweyan">
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-duration="1000">
                <div class="kades-card">
                    <span class="kades-badge">Kepala Desa</span>
                    <h2 class="kades-name">{{ $kepdes->nama }}</h2>
                    <p class="kades-profile">{!! nl2br(e($kepdes->profil)) !!}</p>

                    @if(!empty($kepdes->sambutan))
                    <div class="sambutan-box">
                        <h5>
                            <i class="bi bi-megaphone-fill"></i>
                            Sambutan Kepala Desa
                        </h5>
                        <p class="sambutan-text">{!! nl2br(e($kepdes->sambutan)) !!}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @else
        <p class="text-center text-muted">Data kepala desa belum tersedia.</p>
        @endif
    </div>
</section>

{{-- ================= BERITA SECTION ================= --}}
<section id="berita" class="section">
    <div class="container">
        <div class="berita-header" data-aos="fade-up">
            <h4>Berita Terbaru</h4>
            <a href="{{ route('berita') }}" class="btn btn-dark">Lihat Semua</a>
        </div>

        <div class="row g-4">
            @if($berita->count() > 0)
            <!-- Main Berita -->
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="berita-main-card">
                    <div class="berita-main-img">
                        <img src="{{ asset('storage/'.$berita[0]->image) }}" alt="{{ $berita[0]->judul }}">
                    </div>
                    <div class="berita-main-body">
                        <div class="berita-date">
                            <i class="bi bi-calendar3"></i>
                            {{ \Carbon\Carbon::parse($berita[0]->tgl_berita)->format('d M Y') }}
                        </div>
                        <h3 class="berita-main-title">{{ $berita[0]->judul }}</h3>
                        <p class="berita-main-excerpt">
                            {{ Str::limit(strip_tags($berita[0]->isi), 180) }}
                        </p>
                        <a href="{{ route('berita.detail', $berita[0]->id_berita) }}" class="btn-read-more">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Side Berita -->
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-4">
                    @foreach($berita->skip(1)->take(3) as $index => $item)
                    <a href="{{ route('berita.detail', $item->id_berita) }}"
                        class="berita-side-item"
                        data-aos="fade-up"
                        data-aos-delay="{{ ($index + 2) * 100 }}">
                        <div class="berita-side-img">
                            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->judul }}">
                        </div>
                        <div class="berita-side-content">
                            <h6>{{ Str::limit($item->judul, 60) }}</h6>
                            <div class="berita-side-date">
                                {{ \Carbon\Carbon::parse($item->tgl_berita)->format('d M Y') }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ================= SCRIPTS ================= --}}
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('heroBackground');
        const j1 = document.getElementById('heroJudul1');
        const j2 = document.getElementById('heroJudul2');
        const sub = document.getElementById('heroSubtitle');
        const animated = [j1, j2, sub];

        // Saat slide mulai pindah
        carousel.addEventListener('slide.bs.carousel', () => {
            animated.forEach(el => {
                el.classList.remove('show');
            });
        });

        // Setelah slide aktif
        carousel.addEventListener('slid.bs.carousel', e => {
            const slide = e.relatedTarget;

            j1.textContent = slide.dataset.judul1 || '';
            j2.textContent = slide.dataset.judul2 || '';
            sub.textContent = slide.dataset.subtitle || '';

            setTimeout(() => {
                animated.forEach(el => {
                    el.classList.add('show');
                });
            }, 150);
        });
    });
</script>

@endsection