@extends('layout.app')

@section('title', $berita->judul)

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
        padding: 80px 0 50px;
        margin-bottom: 60px;
        position: relative;
        overflow: hidden;
    }

    .page-title::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 255, 255, .12), transparent 70%);
        border-radius: 50%;
        animation: float 20s ease-in-out infinite;
    }

    .page-title::after {
        content: '';
        position: absolute;
        bottom: -40%;
        left: -5%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 255, 255, .08), transparent 70%);
        border-radius: 50%;
        animation: float 15s ease-in-out infinite reverse;
    }

    @keyframes float {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(40px, -40px);
        }
    }

    .page-title .container {
        position: relative;
        z-index: 2;
    }

    .page-title .breadcrumbs {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
    }

    .page-title .breadcrumbs a,
    .page-title .breadcrumbs span {
        color: rgba(255, 255, 255, .95);
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    .page-title .breadcrumbs a {
        padding: 6px 12px;
        border-radius: 8px;
        background: rgba(255, 255, 255, .1);
        transition: .3s;
    }

    .page-title .breadcrumbs a:hover {
        background: rgba(255, 255, 255, .2);
    }

    .page-title .breadcrumbs .separator {
        color: rgba(255, 255, 255, .5);
    }

    /* ================= DETAIL BERITA ================= */
    .berita-detail-section {
        background: var(--bg);
        padding: 0 0 80px;
    }

    .berita-detail {
        background: var(--white);
        border-radius: 24px;
        padding: 48px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .06);
        transition: .3s;
    }

    .berita-detail:hover {
        box-shadow: 0 8px 32px rgba(0, 0, 0, .1);
    }

    .berita-detail-img {
        margin-bottom: 40px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, .12);
        position: relative;
    }

    .berita-detail-img::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(42, 53, 71, .3), transparent 50%);
        opacity: 0;
        transition: .4s;
        z-index: 1;
    }

    .berita-detail:hover .berita-detail-img::before {
        opacity: 1;
    }

    .berita-detail-img img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }

    .berita-detail:hover .berita-detail-img img {
        transform: scale(1.05);
    }

    .berita-detail-title {
        font-size: 2.5rem;
        font-weight: 900;
        line-height: 1.3;
        color: var(--dark);
        margin-bottom: 24px;
        letter-spacing: -1px;
    }

    .berita-detail-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        padding: 18px 24px;
        background: linear-gradient(135deg, rgba(107, 140, 190, .05), rgba(138, 159, 212, .05));
        border-radius: 16px;
        margin-bottom: 40px;
        border-left: 4px solid var(--primary);
    }

    .berita-detail-meta span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: var(--text);
        font-weight: 600;
    }

    .berita-detail-meta i {
        color: var(--primary);
        font-size: 16px;
    }

    .berita-detail-content {
        font-size: 17px;
        line-height: 1.9;
        color: #374151;
    }

    .berita-detail-content p {
        margin-bottom: 20px;
    }

    .berita-back-btn {
        margin-top: 50px;
        padding-top: 40px;
        border-top: 2px solid #e2e8f0;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #6b8cbe, #8a9fd4);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: all .3s ease;
        box-shadow: 0 8px 24px rgba(107, 140, 190, .3);
        position: relative;
        overflow: hidden;
    }

    .btn-back::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #8a9fd4, #9dafd9);
        opacity: 0;
        transition: .3s;
    }

    .btn-back:hover::before {
        opacity: 1;
    }

    .btn-back:hover {
        color: #fff;
        transform: translateX(-6px);
        box-shadow: 0 12px 32px rgba(107, 140, 190, .4);
    }

    .btn-back span,
    .btn-back i {
        position: relative;
        z-index: 1;
    }

    .btn-back i {
        transition: transform .3s ease;
    }

    .btn-back:hover i {
        transform: translateX(-4px);
    }

    /* ================= SIDEBAR ================= */
    .sidebar-box {
        background: var(--white);
        padding: 32px;
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        margin-bottom: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .06);
        position: sticky;
        top: 120px;
        transition: .3s;
    }

    .sidebar-box:hover {
        box-shadow: 0 8px 32px rgba(0, 0, 0, .1);
        border-color: var(--primary-light);
    }

    .sidebar-box h5 {
        font-weight: 800;
        font-size: 22px;
        color: var(--dark);
        margin-bottom: 28px;
        padding-bottom: 16px;
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sidebar-box h5::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #6b8cbe, #8a9fd4);
        border-radius: 2px;
    }

    .sidebar-box h5 i {
        color: var(--primary);
    }

    .sidebar-berita {
        display: flex;
        gap: 16px;
        margin-bottom: 20px;
        padding: 16px;
        margin-left: -16px;
        margin-right: -16px;
        border-radius: 16px;
        text-decoration: none;
        color: inherit;
        transition: all .3s ease;
        border: 1px solid transparent;
    }

    .sidebar-berita:last-child {
        margin-bottom: 0;
    }

    .sidebar-berita:hover {
        transform: translateX(8px);
        background: var(--bg);
        border-color: #e2e8f0;
    }

    .sidebar-berita-img {
        width: 90px;
        height: 90px;
        border-radius: 14px;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
    }

    .sidebar-berita-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .sidebar-berita:hover .sidebar-berita-img img {
        transform: scale(1.1);
    }

    .sidebar-berita-content h6 {
        font-size: 15px;
        font-weight: 700;
        line-height: 1.5;
        color: var(--dark);
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: .3s;
    }

    .sidebar-berita:hover h6 {
        color: var(--primary);
    }

    .sidebar-berita-content small {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--text-light);
        font-weight: 600;
    }

    .sidebar-berita-content small i {
        font-size: 11px;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 991px) {
        .page-title {
            padding: 60px 0 40px;
        }

        .berita-detail {
            padding: 36px;
        }

        .berita-detail-title {
            font-size: 2rem;
        }

        .berita-detail-img img {
            height: 380px;
        }

        .sidebar-box {
            position: static;
            margin-top: 50px;
        }
    }

    @media (max-width: 767px) {
        .page-title {
            padding: 50px 0 35px;
            margin-bottom: 40px;
        }

        .berita-detail {
            padding: 28px;
            border-radius: 20px;
        }

        .berita-detail-title {
            font-size: 1.7rem;
        }

        .berita-detail-img img {
            height: 280px;
        }

        .berita-detail-meta {
            gap: 12px;
            padding: 16px 20px;
        }

        .berita-detail-content {
            font-size: 15px;
        }

        .sidebar-box {
            padding: 24px;
        }

        .sidebar-berita-img {
            width: 75px;
            height: 75px;
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

    .berita-detail {
        animation: fadeInUp .7s ease-out;
    }

    .sidebar-box {
        animation: fadeInUp .9s ease-out;
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

    {{-- HEADER WITH BREADCRUMB --}}
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="separator">/</span>
                <a href="{{ route('berita') }}">Berita</a>
                <span class="separator">/</span>
                <span>{{ Str::limit($berita->judul, 50) }}</span>
            </nav>
        </div>
    </div>

    <section class="berita-detail-section">
        <div class="container">
            <div class="row">

                {{-- KONTEN UTAMA --}}
                <div class="col-lg-8">

                    <article class="berita-detail" data-aos="fade-up">

                        {{-- Gambar Utama --}}
                        @if($berita->image)
                        <div class="berita-detail-img">
                            <img src="{{ asset('storage/'.$berita->image) }}"
                                alt="{{ $berita->judul }}"
                                loading="lazy">
                        </div>
                        @endif

                        {{-- Judul --}}
                        <h1 class="berita-detail-title">
                            {{ $berita->judul }}
                        </h1>

                        {{-- Meta Info --}}
                        <div class="berita-detail-meta">
                            <span>
                                <i class="bi bi-person-circle"></i>
                                {{ $berita->nmpenulis }}
                            </span>
                            <span>
                                <i class="bi bi-calendar-event"></i>
                                {{ \Carbon\Carbon::parse($berita->tgl_berita)->format('d M Y') }}
                            </span>
                        </div>

                        {{-- Konten Berita --}}
                        <div class="berita-detail-content">
                            {!! nl2br(e($berita->narasiberita)) !!}
                        </div>

                        {{-- Tombol Kembali --}}
                        <div class="berita-back-btn">
                            <a href="{{ route('berita') }}" class="btn-back">
                                <i class="bi bi-arrow-left"></i>
                                <span>Kembali ke Daftar Berita</span>
                            </a>
                        </div>

                    </article>

                </div>

                {{-- SIDEBAR --}}
                <div class="col-lg-4">

                    <div class="sidebar-box" data-aos="fade-up" data-aos-delay="100">
                        <h5>
                            <i class="bi bi-newspaper"></i>
                            Berita Terbaru
                        </h5>

                        @forelse($beritaTerbaru ?? [] as $item)
                        <a href="{{ route('berita.detail', $item->id_berita) }}"
                            class="sidebar-berita">

                            <div class="sidebar-berita-img">
                                <img src="{{ asset('storage/'.$item->image) }}"
                                    alt="{{ $item->judul }}"
                                    loading="lazy">
                            </div>

                            <div class="sidebar-berita-content">
                                <h6>{{ Str::limit($item->judul, 60) }}</h6>
                                <small>
                                    <i class="bi bi-calendar3"></i>
                                    {{ \Carbon\Carbon::parse($item->tgl_berita)->format('d M Y') }}
                                </small>
                            </div>

                        </a>
                        @empty
                        <p class="text-muted text-center small">
                            <em>Belum ada berita lainnya</em>
                        </p>
                        @endforelse

                    </div>

                </div>

            </div>
        </div>
    </section>

</main>

@endsection