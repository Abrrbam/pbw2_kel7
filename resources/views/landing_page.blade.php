<x-layout-layouts>
  <x-slot:title>Telkozy | Aplikasi Web Cari Kost sekitar Telkom University</x-slot:title>
    {{-- Header-landing --}}
    <section class="home" id="home" style="background-color: #fff1f2;">
      <div class="home-text">
        <h1>Aplikasi Web Pencari Kost sekitar Telkom University</h1>
        <h2>Mau Cari Kost Apa? Kost <span class="auto-type"></span></h2>
      </div>
      <div class="home-img">
        <img src="{{ asset('img/rumah-1.jpg') }}" alt="Test-1" class="rumah-1 img-fluid" />
      </div>
    </section>
  
    <x-cards-kost>
    </x-cards-kost>
  
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
  
</x-layout-layouts>


  