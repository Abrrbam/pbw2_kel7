<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{-- Bootstrap online--}}
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  {{-- Custom style --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    
</head>
<body class="font-roboto">
    {{ $slot }}

    <script src="node_modules\flowbite\dist\flowbite.min.js"></script>
</body>
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
</html>