@extends('layouts.layout')


// Penjelasan
/**Beranda-pemkos isinya:
 * 1. Beranda kosong dengan tombol tambah ditengah dan ada modal untuk tambah info kost
 * 2. Info kost, Read
 * 3. Profil Pemkos
 * 4. Halaman Update(pas buka Info kost) dan hapus
 */


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Pemilik Kost | Telkozy</title>
    <!-- Custom style -->
    <link rel="stylesheet" type="text/css" href="src/style.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Icon -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Bootstrap JS + Popper -->
    <!-- <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script> -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="main.js"></script>
</head>

<body>

    <header style="background-color: #fff1f2;">
        <nav>
            <div>
                <a href="beranda_pemkos.php">
                    <img src="src/img/logo.png" class="logo" alt="Telkozy" />
                </a>
            </div>
            <h1 class="telkozy">Telkozy</h1>
            <div class="nav__btns justify-content-end">
                <!-- Hilangkan style link -->
                <a href="profil_pemilik.php" style="color: inherit;"><span class="ph ph-user-circle" style="font-size: 80px;"></span></a>
            </div>
        </nav>
    </header>
    
    <section class="container-fluid">
        <?php
        // Jika ada data
        if (mysqli_num_rows($result) > 0) {
        ?>
            <!-- <h3 class="title" id="successAddKost">Yeay, kost kamu berhasil diupload!</h3> -->
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php
                // Ulangi card info-kost saat lebih dari satu info-kost
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col">
                        <div class="card w-100">
                            <img src="src/img/kost/<?php echo $row['foto']; ?>" class="img-fluid card-img-top" style="height: 150px; object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nama_kost']; ?></h5>
                                <p class="card-text"><?php echo $row['nama_daerah']; ?> | <span class="badge text-bg-danger"><?php echo $row['tipe_kost']; ?></span></p>
                                <button type="button" class="btn btn-primary" data-id-kost="<?php echo $row['id_kost']; ?>" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $row['id_kost']; ?>">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Kost -->
                    <div class="modal" id="detailModal<?php echo $row['id_kost']; ?>" tabindex="-1" aria-labelledby="detailModalLabel<?php echo $row['id_kost']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="detailModalLabel<?php echo $row['id_kost']; ?>">Detail Info Kost</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <!-- Foto-kost -->
                                            <div class="col-6 col-form-label">
                                                <p>Foto Kost</p>
                                                <div class="w-100 h-auto">
                                                    <img src="src/img/kost/<?= $row['foto']; ?>" alt="foto-kost" style="width: 90%; height: 425px; object-fit: cover;" class="img-fluid rounded">
                                                </div>
                                            </div>
                                            <div class="col-6 col-form-label">
                                                <div class="mb-2">
                                                    <label for="nama_kost" class="col-form-label">Nama Kost</label>
                                                    <input type="text" name="nama_kost" readonly class="form-control-plaintext" id="nama_kost" value="<?= $row['nama_kost']; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="daerah" class="col-form-label">Daerah</label>
                                                    <input type="text" name="daerah" readonly class="form-control-plaintext" id="daerah" value="<?= $row['nama_daerah']; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="kontak" class="col-form-label">Kontak</label>
                                                    <input type="text" name="kontak" readonly class="form-control-plaintext" id="kontak" value="<?= $row['kontak']; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="tipe" class="col-form-label">Tipe Kost</label>
                                                    <input type="text" name="tipe" readonly class="form-control-plaintext" id="tipe" value="<?= $row['tipe_kost']; ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="harga" class="col-form-label">Harga</label>
                                                    <input type="text" name="harga" readonly class="form-control-plaintext" id="harga" value="Rp<?= number_format($row['harga'], 0, ',', '.'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-form-label">
                                                <label for="alamat">Alamat</label>
                                                <textarea name="alamat" id="alamat" rows="5" class="form-control" readonly><?= $row['alamat']; ?></textarea>
                                            </div>
                                            <div class="col-6 col-form-label">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" readonly><?= $row['deskripsi']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" onclick="confirmDelete(<?= $row['id_kost']; ?>)" class="btn btn-danger">Hapus</a>
                                    <a href="edit_kost.php?id_kost=<?= $row['id_kost']; ?>" class="btn btn-warning">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } //while-rows
                ?>
                <div class="col">
                    <div class="card w-100 h-100">
                        <button type="button" class="my-auto btn modal-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#9b1111" viewBox="0 0 256 256">
                                <path d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24Zm40,112H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32a8,8,0,0,1,0,16Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Tutup div row-card -->
            </div>

            <div class="d-flex justify-content-end">

            </div>
        <?php
            // Jika tidak ada data
        } else {
        ?>
            <h3 class="title text-center">Halo, <?php echo $fullname; ?></h3>
            <div class="mt-5 text-center" style="font-size: 1.3rem; line-height: 1.3;">
                <p><b>Selamat datang di Telkozy!</b></p>
                <p>Ayo mulai promosikan kost Anda dan dapatkan lebih banyak penyewa dengan mudah.</p>
                <button type="button" class="btn modal-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#9b1111" viewBox="0 0 256 256">
                        <path d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24Zm40,112H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32a8,8,0,0,1,0,16Z"></path>
                    </svg>
                </button>
                <p><strong>Bergabunglah dengan Telkozy sekarang!!!</strong></p>
            </div>
        <?php
        } //else result
        ?>
        <!-- Modal Tambah Info Kost -->
        <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kost</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_kost.php?id_akun=<?= $id_akun; ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama-kost" class="col-form-label">Nama Kost</label>
                                <input type="text" name="nama-kost" class="form-control" id="nama-kost" required>
                            </div>
                            <div class="mb-3">
                                <label for="daerah" class="col-form-label">Daerah</label>
                                <select name="daerah" id="daerah" class="form-select" required>
                                    <option selected>Pilih Daerah</option>
                                    <option value="Sukapura">Sukapura</option>
                                    <option value="Sukabirus">Sukabirus</option>
                                    <option value="PGA">PGA</option>
                                    <option value="Ciganitri">Ciganitri</option>
                                    <option value="PBB">PBB</option>
                                    <option value="Mangga Dua">Mangga Dua</option>
                                </select>
                                <p class="text-secondary"><small>Jika tidak ada nama daerah kost anda, pilih yang terdekat dari opsi diatas</small></p>
                            </div>
                            <div class="mb-3">
                                <label for="tipe" class="col-form-label">Tipe Kost</label>
                                <select class="form-select" name="tipe" id="tipe" required>
                                    <option selected>Pilih Tipe Kost</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Putra">Putra</option>
                                    <option value="Putri">Putri</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="col-form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <textarea rows="4" name="alamat" class="form-control" id="alamat" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kontak" class="col-form-label">Kontak</label>
                                <input type="tel" name="kontak" minlength="10" maxlength="13" class="form-control" id="kontak" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="col-form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" placeholder="Deskripsikan kost Anda mulai dari ukuran, fasilitas dan peraturan" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto-kost" class="col-form-label">Upload Foto</label>
                                <input type="file" name="foto-kost" class="form-control" id="foto-kost" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn batal-btn" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary selesai-btn">Selesai</button>
                        </form>
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
</body>

</html>