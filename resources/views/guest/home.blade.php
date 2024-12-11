<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | Telkozy</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('src/style.css') }}">

  <style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: red;
      border-radius: 15px;
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <div>
        <a href="{{ route('home') }}">
          <img src="{{ asset('src/img/logo.png') }}" class="logo" alt="Telkozy">
        </a>
      </div>
      <h1 class="telkozy">Telkozy</h1>
    </nav>
  </header>

  <section class="container-fluid">
    <h2 class="title text-center">Mau nyari kost dimana?</h2>
    <form method="get" id="searchForm" class="d-flex justify-content-center align-items-center py-4 my-4" role="search">
      <input id="searchInput" class="shadow input-cari form-control me-2" type="search" placeholder="Masukkan nama atau lokasi kost" aria-label="Search">
      <button class="btn tombol-cari" type="submit">Cari</button>
    </form>

    <div class="container-fluid mb-5" id="searchResults">
      <h4 class="title-2">Rekomendasi Kost</h4>
      @if($kosts->isNotEmpty())
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          @foreach($kosts->chunk(4) as $chunk)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <div class="card-wrapper d-flex">
              @foreach($chunk as $kost)
              <div class="card" style="width: 25%;">
                <img src="{{ asset('src/img/kost/' . $kost->foto) }}" style="height: 150px; object-fit: cover;" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $kost->nama_kost }}</h5>
                  <p class="card-text">{{ $kost->nama_daerah }} | <span class="badge text-bg-danger">{{ $kost->tipe_kost }}</span></p>
                  <a href="{{ url('info_kost/' . $kost->id_kost) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
      @endif
    </div>
  </section>

  <footer>
    <div class="footer-content">
      <h3>Telkozy</h3>
      <p>Mitra terpercaya Anda dalam menemukan pilihan kos terbaik.</p>
      <ul class="socials">
        <li><a href="#"><i class="ph ph-facebook-logo"></i></a></li>
        <li><a href="#"><i class="ph ph-twitter-logo"></i></a></li>
        <li><a href="#"><i class="ph ph-instagram-logo"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>© 2024 Telkozy. All rights reserved.</p>
    </div>
  </footer>

  <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
