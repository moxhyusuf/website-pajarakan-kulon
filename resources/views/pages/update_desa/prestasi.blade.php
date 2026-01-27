@extends('layout.app')

@section('title', 'Kesenian Desa')

@section('content')

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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* ================= PAGE TITLE ================= */
    .page-title {
        background: linear-gradient(135deg, #6b8cbe 0%, #8a9fd4 100%);
        padding: 120px 0 80px;
        margin-bottom: 60px;
        position: relative;
        overflow: hidden;
    }

    .page-title::before,
    .page-title::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255, 255, 255, .12), transparent 70%);
    }

    .page-title::before {
        width: 600px;
        height: 600px;
        top: -300px;
        right: -100px;
        animation: float 25s ease-in-out infinite;
    }

    .page-title::after {
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

    .page-title .container {
        position: relative;
        z-index: 2;
    }

    .page-title h1 {
        color: #fff;
        font-size: 52px;
        font-weight: 800;
        margin-top: 20px;
        letter-spacing: -1.5px;
        text-shadow: 0 4px 20px rgba(0, 0, 0, .15);
    }

    .page-title .breadcrumbs ol {
        display: flex;
        gap: 12px;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .page-title .breadcrumbs ol li {
        color: rgba(255, 255, 255, .95);
        font-size: 15px;
        font-weight: 500;
    }

    .page-title .breadcrumbs ol li a {
        color: #fff;
        text-decoration: none;
        padding: 6px 14px;
        border-radius: 8px;
        background: rgba(255, 255, 255, .15);
        transition: .3s;
    }

    .page-title .breadcrumbs ol li a:hover {
        background: rgba(255, 255, 255, .25);
    }

    .page-title .breadcrumbs ol li::after {
        content: '/';
        margin-left: 12px;
        opacity: .6;
    }

    .page-title .breadcrumbs ol li:last-child::after {
        display: none;
    }

    /* ================= SECTION HEADER ================= */
    #prestasi {
        background: var(--bg);
        padding: 30px 0 80px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
        padding-top: 0;
    }

    .section-header h2 {
        font-size: 42px;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }

    .section-header h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #6b8cbe, #8a9fd4);
        border-radius: 2px;
    }

    .section-header p {
        font-size: 16px;
        color: #6c757d;
        max-width: 600px;
        margin: 25px auto 0;
        line-height: 1.6;
    }

    /* ================= CARD PRESTASI ================= */
    .prestasi-card {
        background: var(--white);
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: all .4s cubic-bezier(.4, 0, .2, 1);
        position: relative;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
    }

    .prestasi-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #6b8cbe, #8a9fd4);
        transform: scaleX(0);
        transition: transform .4s ease;
    }

    .prestasi-card:hover::before {
        transform: scaleX(1);
    }

    .prestasi-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(107, 140, 190, .2);
        border-color: var(--primary-light);
    }

    /* ================= IMAGE WRAPPER ================= */
    .prestasi-img-wrapper {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: linear-gradient(135deg, #d4e4f7, #e8f0fa);
        flex-shrink: 0;
        position: relative;
    }

    .prestasi-img-wrapper::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(42, 53, 71, .7), transparent 60%);
        opacity: 0;
        transition: opacity .4s ease;
    }

    .prestasi-card:hover .prestasi-img-wrapper::after {
        opacity: 1;
    }

    .prestasi-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform .6s cubic-bezier(.4, 0, .2, 1);
    }

    .prestasi-card:hover .prestasi-img-wrapper img {
        transform: scale(1.12);
    }

    /* ================= CARD CONTENT ================= */
    .prestasi-card .card-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .prestasi-card h5 {
        font-size: 20px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 10px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 50px;
    }

    .prestasi-card .date-info {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--primary);
        font-weight: 600;
        margin-bottom: 12px;
        padding: 2px 12px;
        background: rgba(107, 140, 190, .08);
        border-radius: 10px;
        width: fit-content;
    }

    .prestasi-card .date-info i {
        font-size: 14px;
    }

    .prestasi-card .description {
        font-size: 14px;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    /* ================= BUTTON ================= */
    .btn-detail {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        background: linear-gradient(135deg, #6b8cbe, #8a9fd4);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all .3s ease;
        align-self: flex-start;
        margin-top: auto;
        box-shadow: 0 8px 20px rgba(107, 140, 190, .3);
        position: relative;
        overflow: hidden;
    }

    .btn-detail::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #8a9fd4, #9dafd9);
        opacity: 0;
        transition: .3s;
    }

    .btn-detail:hover::before {
        opacity: 1;
    }

    .btn-detail:hover {
        color: #fff;
        transform: translateX(4px);
        box-shadow: 0 10px 30px rgba(107, 140, 190, .4);
    }

    .btn-detail span,
    .btn-detail i {
        position: relative;
        z-index: 1;
    }

    .btn-detail i {
        font-size: 16px;
        transition: transform .3s ease;
    }

    .btn-detail:hover i {
        transform: translateX(4px);
    }

    /* ================= EMPTY STATE ================= */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-state i {
        font-size: 80px;
        color: #cbd5e1;
        margin-bottom: 20px;
        display: block;
    }

    .empty-state p {
        font-size: 18px;
        color: #94a3b8;
        font-style: italic;
    }

    /* ================= BADGE (optional) ================= */
    .prestasi-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, .95);
        color: var(--primary);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 991px) {
        .page-title {
            padding: 100px 0 70px;
        }

        .page-title h1 {
            font-size: 40px;
        }

        .section-header h2 {
            font-size: 36px;
        }

        #prestasi {
            padding: 25px 0 60px;
        }
    }

    @media (max-width: 767px) {
        .page-title {
            padding: 80px 0 60px;
            margin-bottom: 40px;
        }

        .prestasi-card .card-body {
            padding: 24px;
        }

        .page-title h1 {
            font-size: 32px;
        }

        .section-header h2 {
            font-size: 28px;
        }

        #prestasi {
            padding: 20px 0 60px;
        }
    }

    /* ================= ANIMATION ================= */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .prestasi-card {
        animation: fadeInUp .6s ease-out backwards;
    }

    .prestasi-card:nth-child(1) {
        animation-delay: .05s;
    }

    .prestasi-card:nth-child(2) {
        animation-delay: .1s;
    }

    .prestasi-card:nth-child(3) {
        animation-delay: .15s;
    }

    html {
        scroll-behavior: smooth;
    }

    ::selection {
        background: var(--primary);
        color: #fff;
    }
</style>

<main class="main">

    {{-- HEADER --}}
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Kesenian Desa</li>
                </ol>
            </nav>
            <h1>Kesenian Desa</h1>
        </div>
    </div>

</main>

<section id="prestasi">

    <div class="container">

        {{-- SECTION HEADER --}}
        <div class="section-header" data-aos="fade-up">
            <h2>Kesenian & Penghargaan Desa</h2>
            <p>
                Dokumentasi berbagai Kesenian dan pencapaian yang telah diraih untuk kemajuan dan kebanggaan masyarakat desa.
            </p>
        </div>

        {{-- CARDS GRID --}}
        <div class="row g-4">

            @forelse ($prestasi as $item)

            <div class="col-lg-4 col-md-6"
                data-aos="zoom-in"
                data-aos-delay="{{ $loop->iteration * 100 }}">

                <div class="prestasi-card">

                    {{-- FOTO --}}
                    <div class="prestasi-img-wrapper">
                        <img src="{{ asset('storage/'.$item->foto_utama) }}"
                            alt="{{ $item->judul }}"
                            loading="lazy">
                    </div>

                    {{-- KONTEN --}}
                    <div class="card-body">

                        <h5>{{ $item->judul_prestasi }}</h5>

                        <div class="date-info">
                            <i class="bi bi-calendar-event"></i>
                            {{ $item->tanggal_prestasi }}
                        </div>

                        <p class="description">
                            {{ $item->deskripsi }}
                        </p>

                        <a href="{{ route('prestasi.show', $item->id) }}"
                            class="btn-detail">
                            <span>Lihat Detail</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>
            </div>

            @empty

            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-trophy"></i>
                    <p>Belum ada data Kesenian yang tersedia</p>
                </div>
            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection