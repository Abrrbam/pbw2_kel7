<?php
session_start();

if (!isset($_SESSION['id_akun'])) {
  header("Location: login.php");
  exit();
}

require_once "koneksi.php";
$id_akun = $_SESSION['id_akun'];

// id_kost dibutuhkan untuk lihat detail kost
$sqlKost = "SELECT id_kost, nama_kost, nama_daerah, 
              kontak, tipe_kost, alamat, 
              deskripsi, harga, foto  
            FROM kost LIMIT 10";
$result = mysqli_query($conn, $sqlKost);
if (!$result) {
  die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | Telkozy</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">

  <!-- Custom style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('src/style.css') }}" />

  <style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: red;
      border-radius: 15px;
      color: black;
    }
  </style>

  <!-- Icon -->
  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <!-- Bootstrap JS + Popper -->
  <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom JS -->
  <script src="{{ asset('main.js') }}"></script>
</head>

<body>
  <header>
    <nav>
      <div>
        <a href="beranda.html">
          <img src="{{ asset('src/img/logo.png') }}" class="logo" alt="Telkozy" />
        </a>
      </div>
      <h1 class="telkozy">Telkozy</h1>
      <!-- Tombol Login -->
      <div class="nav__btns justify-content-end">
        <a href="profil_pencari.php"><span class="ph ph-user-circle" style="font-size: 80px;"></span></a>
      </div>
    </nav>
  </header>
  <section class="container-fluid">
    <div class="position-relative pb-5">
      <h2 class="title text-center">Mau nyari kost dimana?</h2>
      <form method="get" id="searchForm" class="d-flex justify-content-center align-items-center py-4 my-4" role="search">
        <input id="searchInput" class="shadow input-cari form-control me-2" type="search" placeholder="Masukkan nama atau lokasi kost" aria-label="Search" />
        <button class="btn tombol-cari" onclick="hasilCari()" name="cari" type="submit">Cari</button>
        <?php if (isset($_GET['cari'])) { ?>
          <i class="ph ph-funnel ms-2" style="font-size: 40px;"></i>
        <?php } ?>
      </form>
    </div>

    <div class="container-fluid mb-5" id="searchResults">
      <h4 class="title-2">Rekomendasi Kost</h4>
      <?php
      $rows = mysqli_num_rows($result);
      if ($rows > 0) { ?>
        <!-- Komponen Card + Carousel -->
        <div id="carouselExample" class="carousel slide">
          <!-- Slide Carousel -->
          <div class="carousel-inner">
            <?php
            $counter = 0;
            $activeClass = 'active';
            while ($data = mysqli_fetch_assoc($result)) {
              // Jika $counter adalah 0 atau kelipatan 4, buat item carousel baru
              if ($counter % 4 == 0) {
                if ($counter != 0) {
                  // Tutup div .card-wrapper dan .carousel-item
                  echo '</div></div>';
                }
                // Mulai item carousel baru
                echo '<div class="carousel-item ' . $activeClass . '"><div class="card-wrapper d-flex">';
                $activeClass = ''; // hanya untuk item pertama yang memiliki kelas 'active'
              }
            ?>
              <div class="card" style="width: 25%;">
                <img src="{{ asset('src/img/kost/' . $data['foto']) }}" style="height: 150px; object-fit: cover;" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $data['nama_kost']; ?></h5>
                  <p class="card-text"><?php echo $data['nama_daerah']; ?> | <span class="badge text-bg-danger"><?php echo $data['tipe_kost']; ?></span></p>

                  <button type="button" class="btn btn-primary">
                    <a href="info_kost.php?id_kost=<?php echo $data['id_kost'];  ?>">Lihat Detail</a>
                  </button>
                </div>
              </div>
            <?php
              $counter++;
            }
            // Tutup div terakhir jika masih terbuka
            if ($counter % 4 != 0) {
              echo '</div></div>';
            }
            ?>
          </div>
          <button class="carousel-control-prev" style="width: 2.75%;" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" style="width: 2.75%;" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      <?php
      }
      ?>
    
    
    <div class="container-fluid pt-5">
        <h4 class="title-2">Area Kost</h4>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card position-relative w-100 ">
              <img src="src/img/rumah-1.jpg" class="card-img w-100 h-100" alt="">
              <div class="card-img-overlay d-flex align-items-center justify-content-center">
                <h4 class=" card-title title-2 text-light">Sukapura</h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card w-100">
              <img src="src/img/rumah-1.jpg" class="card-img" alt="">
              <div class="card-img-overlay d-flex align-items-center justify-content-center">
                <h4 class=" card-title title-2 text-light">Sukabirus</h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card w-100">
              <img src="src/img/rumah-1.jpg" class="card-img" alt="...">
              <div class="card-img-overlay d-flex align-items-center justify-content-center">
                <h4 class=" card-title title-2 text-light">PGA</h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card w-100">
              <img src="src/img/rumah-1.jpg" class="card-img" alt="...">
              <div class="card-img-overlay d-flex align-items-center justify-content-center">
                <h4 class=" card-title title-2 text-light">Ciganitri</h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card w-100">
              <img src="src/img/rumah-1.jpg" class="card-img" alt="...">
              <div class="card-img-overlay d-flex align-items-center justify-content-center">
                <h4 class=" card-title title-2 text-light">PBB</h4>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card w-100">
              <img src="src/img/rumah-1.jpg" class="card-img" alt="...">
              <div class="card-img-overlay d-flex align-items-center justify-content-center">
                <h4 class=" card-title title-2 text-light">Mangga Dua</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <h3>Telkozy</h3>
      <p>Mitra terpercaya Anda dalam menemukan pilihan kos terbaik. Hubungi kami di platform media sosial untuk informasi lebih lanjut.</p>
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
