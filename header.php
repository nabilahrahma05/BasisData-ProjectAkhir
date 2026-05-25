<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        .dropdown-menu {
            width: 250px; /* Mengatur lebar dropdown menu */
        }
        .logout-btn {
            width: 100%; /* Membuat tombol log out lebar penuh */
        }
        footer {
            padding: 20px 0; /* Padding atas dan bawah */
        }
        .contact-info {
            background-color: #6931A2; /* Latar belakang ungu */
            color: white; /* Teks putih */
            padding: 20px; /* Padding untuk contact info */
            margin-top: 50px; /* Jarak antara konten di atas dan footer */
        }
        .copyright {
            background-color: #F0D200; /* Latar belakang kuning */
            padding: 10px; /* Padding untuk copyright */
        }
        .welcome-section {
            text-align: center; /* Mengatur teks di tengah */
            margin-top: 100px; /* Margin atas untuk jarak */
        }
        .welcome-section img {
            max-width: 100%; /* Membuat gambar responsif */
            height: auto; /* Menjaga rasio aspek gambar */
        }
        .welcome-section h2 {
            margin-bottom: 50px; /* Jarak antara teks dan gambar */
        }
    </style>    
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <div class="dropdown me-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="daftar_ruangan.php">Daftar Ruangan</a></li>
                            <li><a class="dropdown-item" href="daftar_properti.php">Daftar Properti</a></li>
                            <li><a class="dropdown-item" href="peminjaman_terjadwal.php">Peminjaman Terjadwal</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item logout-btn" href="/website-peminjaman-ruangan/login/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    <a class="navbar-brand" href="halaman.php">SeRuAMATH</a>
                </div>
                <div class="collapse navbar-collapse" id="navbarText">
                    <span class="navbar-text" style="margin-left: auto; text-align: right; width: 100%;">
                        Pinjam Kelas dan ATK jadi mudah untuk Mahasiswa Prodi Rumpun Matematika
                    </span>
                </div>
            </div>
        </nav>
    </header>
    <main>