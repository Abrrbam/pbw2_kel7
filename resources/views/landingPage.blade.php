<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Telkozy | Aplikasi Pencari Kost Sekitar Telkom University</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Custom style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/style.css') }}" />
    <!-- Icon -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
  </head>
  <body>
    <header class="header-la-page">
      <nav>
          <div>
            <a href="{{ url('landing_page.html') }}">
              <img src="{{ asset('src/img/logo.png') }}" class="logo" alt="Telkozy" />
            </a>
            </div>
          <h1 class="telkozy">Telkozy</h1>
          </div>
        </div>
          <a href="{{ url('/login') }}" class="login-btn">Login</a>
          <a href="{{ url('/home') }}" class="login-btn">Guest</a>
      </nav>
    </header>

    <section class="home" id="home" style="background-color: #fff1f2;">
      <div class="home-text">
        <h1>Aplikasi Web Pencari Kost sekitar Telkom University</h1>
        <h2>Mau Cari Kost Apa? Kost <span class="auto-type"></span></h2>
      </div>
      <div class="home-img">
        <img src="{{ asset('src/img/rumah-1.jpg') }}" alt="Test-1" class="rumah-1 img-fluid" />
      </div>
    </section>

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

    <!-- Script Auto-Typed JS -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
      var typed = new Typed(".auto-type", {
        strings: ["Putra", "Putri", "Umum", "Murah"],
        loop: true,
        typeSpeed: 150,
        backSpeed: 150,
      });
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('main.js') }}"></script>
  </body>
</html>
