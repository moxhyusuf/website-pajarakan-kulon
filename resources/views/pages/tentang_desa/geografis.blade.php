@extends('layout.app')

@section('title', 'geografis')
@section('content')

<!-- Section SEJARAH DESA LAWEYAN -->
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">beranda</a></li>
                    <li class="current">geografis</li>
                </ol>
            </nav>

        </div>
    </div><!-- End Page Title -->



</main>

<section id="geografis" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>🌍 Geografis Desa</h2>
    </div>
    <!-- End Section Title -->

    <div class="container">

        <!-- Deskripsi + Peta -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card shadow p-4 h-100">
                    <p>
                        Pajarakan Kulon merupakan salah satu desa di wilayah Kecamatan Pajarakan, Kabupaten Probolinggo. Desa ini memiliki luas sekitar
                        <strong>±160 Ha</strong>, terdiri dari <span class="text-success fw-bold">95 Ha lahan sawah 🌾</span>
                        dan <span class="text-warning fw-bold">65 Ha lahan permukiman serta tegalan 🌳</span>.
                        Lahan sawah di Pajarakan Kulon menjadi potensi utama desa, dengan hasil pertanian seperti padi dan palawija yang menjadi sumber penghidupan mayoritas warganya.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Peta Google Maps -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1276187533904!2d113.38044267358012!3d-7.776290177144907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7000ab2741ccd%3A0xd8adf4d07d582082!2sKantor%20Desa%20Pajarakan%20Kulon!5e0!3m2!1sid!2sid!4v1765072472625!5m2!1sid!2sid"
                    width="100%" height="300" style="border:0;"
                    allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>

        <!-- Batas Wilayah -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Utara</h5>
                    <p>Desa Sukokerto, Kecamatan Pajarakan</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Timur</h5>
                    <p>Desa Sukomulyo, Kecamatan Pajarakan</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Selatan</h5>
                    <p>Desa Karangbong, Kecamatan Pajarakan</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 bg-primary-subtle">
                    <h5>🧭 Sebelah Barat</h5>
                    <p>Desa Tanjung, Kecamatan Pajarakan</p>
                </div>
            </div>
        </div>

    </div>

</section>


@endsection