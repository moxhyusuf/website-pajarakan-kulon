@extends('layout.app')

@section('title', 'Berita')

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

    /* ================= HERO HEADER ================= */
    .page-title {
        background: linear-gradient(135deg, #6b8cbe 0%, #8a9fd4 100%);
        padding: 80px 0 60px;
        margin-bottom: 80px;
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
        font-size: 56px;
        font-weight: 900;
        color: #fff;
        margin-top: 20px;
        letter-spacing: -2px;
        text-shadow: 0 4px 20px rgba(0, 0, 0, .15);
    }

    .breadcrumbs ol {
        display: flex;
        gap: 12px;
        list-style: none;
        padding: 0;
    }

    .breadcrumbs li {
        color: rgba(255, 255, 255, .9);
        font-size: 15px;
        font-weight: 500;
    }

    .breadcrumbs a {
        color: #fff;
        text-decoration: none;
        padding: 6px 14px;
        border-radius: 8px;
        background: rgba(255, 255, 255, .15);
        transition: .3s;
    }

    .breadcrumbs a:hover {
        background: rgba(255, 255, 255, .25);
    }

    .breadcrumbs li::after {
        content: '/';
        margin-left: 12px;
        opacity: .6;
    }

    .breadcrumbs li:last-child::after {
        display: none;
    }

    /* ================= BLOG GRID ================= */
    .blog-posts {
        margin-bottom: 60px;
    }

    .blog-card {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        border: 1px solid #e2e8f0;
        transition: .4s cubic-bezier(.4, 0, .2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(107, 140, 190, .2);
        border-color: var(--primary-light);
    }

    /* ================= IMAGE CONTAINER ================= */
    .post-img {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #d4e4f7, #e8f0fa);
        padding-top: 56%;
    }

    .post-img img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .6s ease;
    }

    .blog-card:hover .post-img img {
        transform: scale(1.1);
    }

    .post-img::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(42, 53, 71, .7), transparent 60%);
        opacity: 0;
        transition: .4s;
    }

    .blog-card:hover .post-img::after {
        opacity: 1;
    }

    /* ================= CARD CONTENT ================= */
    .blog-card-body {
        padding: 22px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .meta-top ul {
        display: flex;
        gap: 8px;
        list-style: none;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .meta-top li {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: var(--text-light);
        background: var(--bg);
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 500;
        white-space: nowrap;
    }

    .meta-top i {
        color: var(--primary);
    }

    .blog-card .title {
        font-size: 19px;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 10px;
    }

    .blog-card .title a {
        color: var(--dark);
        text-decoration: none;
        transition: .3s;
    }

    .blog-card .title a:hover {
        color: var(--primary);
    }

    .blog-card .content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-card .content p {
        font-size: 14px;
        line-height: 1.6;
        color: var(--text);
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .read-more {
        margin-top: auto;
    }

    .read-more a {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 24px;
        background: linear-gradient(135deg, #6b8cbe, #8a9fd4);
        color: #fff;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 13px;
        box-shadow: 0 8px 20px rgba(107, 140, 190, .3);
        transition: .3s;
        position: relative;
        overflow: hidden;
    }

    .read-more a::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #8a9fd4, #9dafd9);
        opacity: 0;
        transition: .3s;
    }

    .read-more a:hover::before {
        opacity: 1;
    }

    .read-more a:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 28px rgba(107, 140, 190, .4);
    }

    .read-more a span,
    .read-more a i {
        position: relative;
        z-index: 1;
    }

    .read-more a:hover i {
        transform: translateX(4px);
    }

    /* ================= SIDEBAR ================= */
    .sidebar {
        position: sticky;
        top: 120px;
    }

    .widget-item {
        background: var(--white);
        border-radius: 24px;
        padding: 36px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        border: 1px solid #e2e8f0;
        transition: .3s;
    }

    .widget-item:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, .1);
        border-color: var(--primary-light);
    }

    .widget-title {
        font-size: 24px;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 28px;
        position: relative;
        padding-bottom: 16px;
    }

    .widget-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #6b8cbe, #8a9fd4);
        border-radius: 2px;
    }

    /* ================= SEARCH ================= */
    .search-widget form {
        display: flex;
        gap: 10px;
    }

    .search-widget input {
        flex: 1;
        padding: 14px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        font-size: 14px;
        transition: .3s;
        background: var(--bg);
    }

    .search-widget input:focus {
        outline: none;
        border-color: var(--primary);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(107, 140, 190, .1);
    }

    .search-widget button {
        padding: 14px 24px;
        background: linear-gradient(135deg, #6b8cbe, #8a9fd4);
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: .3s;
        box-shadow: 0 4px 12px rgba(107, 140, 190, .3);
    }

    .search-widget button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(107, 140, 190, .4);
    }

    /* ================= RECENT POSTS ================= */
    .recent-post-item {
        display: flex;
        gap: 16px;
        padding: 16px;
        margin: 0 -16px 16px;
        border-radius: 16px;
        text-decoration: none;
        transition: .3s;
        border: 1px solid transparent;
    }

    .recent-post-item:last-child {
        margin-bottom: 0;
    }

    .recent-post-item:hover {
        background: var(--bg);
        transform: translateX(6px);
        border-color: #e2e8f0;
    }

    .recent-post-item img {
        width: 85px;
        height: 85px;
        object-fit: cover;
        border-radius: 14px;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        transition: .3s;
    }

    .recent-post-item:hover img {
        box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
        transform: scale(1.05);
    }

    .recent-post-item h4 {
        font-size: 15px;
        font-weight: 600;
        color: var(--dark);
        line-height: 1.5;
        margin-bottom: 8px;
        transition: .3s;
    }

    .recent-post-item:hover h4 {
        color: var(--primary);
    }

    .recent-post-item time {
        font-size: 12px;
        color: var(--text-light);
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
    }

    /* ================= PAGINATION ================= */
    .pagination {
        gap: 8px;
        margin-top: 60px;
    }

    .page-link {
        padding: 12px 18px;
        border: 2px solid #e2e8f0;
        border-radius: 12px !important;
        color: var(--text);
        font-weight: 600;
        transition: .3s;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #6b8cbe, #8a9fd4);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 4px 12px rgba(107, 140, 190, .3);
    }

    .page-link:hover {
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-2px);
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 991px) {
        .sidebar {
            position: static;
            margin-top: 60px;
        }

        .page-title h1 {
            font-size: 42px;
        }

        .page-title {
            padding: 120px 0 80px;
        }
    }

    @media (max-width: 767px) {
        .page-title h1 {
            font-size: 32px;
        }

        .page-title {
            padding: 100px 0 60px;
            margin-bottom: 50px;
        }

        .blog-card-body {
            padding: 20px;
        }

        .widget-item {
            padding: 28px;
        }

        .meta-top ul {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    /* ================= ANIMATIONS ================= */
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

    .blog-card {
        animation: fadeInUp .6s ease backwards;
    }

    .blog-card:nth-child(1) {
        animation-delay: .05s;
    }

    .blog-card:nth-child(2) {
        animation-delay: .1s;
    }

    .blog-card:nth-child(3) {
        animation-delay: .15s;
    }

    .blog-card:nth-child(4) {
        animation-delay: .2s;
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

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Berita</li>
                </ol>
            </nav>
            <h1>Berita Terkini</h1>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
        <div class="row">

            <!-- BLOG CONTENT -->
            <div class="col-lg-8">
                <section id="blog-posts" class="blog-posts section">

                    <div class="row gy-4">

                        @foreach ($item as $berita)
                        <div class="col-lg-6">
                            <article class="blog-card">

                                <!-- IMAGE -->
                                <a href="{{ route('berita.detail', $berita->id_berita) }}"
                                    class="post-img">
                                    <img src="{{ asset('storage/'.$berita->image) }}"
                                        alt="{{ $berita->judul }}">
                                </a>

                                <!-- CARD BODY -->
                                <div class="blog-card-body">
                                    <!-- META -->
                                    <div class="meta-top">
                                        <ul>
                                            <li>
                                                <i class="bi bi-person-circle"></i> {{ $berita->nmpenulis }}
                                            </li>
                                            <li>
                                                <i class="bi bi-calendar-event"></i>
                                                {{ \Carbon\Carbon::parse($berita->tgl_berita)->format('d M Y') }}
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- TITLE -->
                                    <h2 class="title">
                                        <a href="{{ route('berita.detail', $berita->id_berita) }}">
                                            {{ $berita->judul }}
                                        </a>
                                    </h2>

                                    <!-- CONTENT -->
                                    <div class="content">
                                        <p>
                                            {{ Str::limit(strip_tags($berita->narasiberita), 150) }}
                                        </p>

                                        <div class="read-more">
                                            <a href="{{ route('berita.detail', $berita->id_berita) }}">
                                                <span>Baca Selengkapnya</span>
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </article>
                        </div>
                        @endforeach

                    </div>

                    <!-- PAGINATION -->
                    <div class="d-flex justify-content-center">
                        {{ $item->links('pagination::bootstrap-5') }}
                    </div>

                </section>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4 sidebar">
                <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                    <!-- SEARCH -->
                    <div class="search-widget widget-item">
                        <h3 class="widget-title">Pencarian</h3>
                        <form action="{{ route('berita') }}" method="GET">
                            <input type="text" name="q"
                                placeholder="Cari berita..."
                                value="{{ request('q') }}">
                            <button type="submit" title="Search">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- RECENT POSTS -->
                    <div class="recent-posts-widget widget-item">
                        <h3 class="widget-title">Berita Terbaru</h3>

                        @foreach($recentPosts as $post)
                        <a href="{{ route('berita.detail', $post->id_berita) }}"
                            class="recent-post-item">

                            <img src="{{ asset('storage/'.$post->image) }}"
                                alt="{{ $post->judul }}">

                            <div>
                                <h4>{{ Str::limit($post->judul, 50) }}</h4>
                                <time>
                                    <i class="bi bi-calendar3"></i>
                                    {{ \Carbon\Carbon::parse($post->tgl_berita)->format('d M Y') }}
                                </time>
                            </div>

                        </a>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>

</main>
@endsection