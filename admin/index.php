<?php
   require "session.php";
   require "../koneksi.php";

   $querykategori = mysqli_query($conn, "SELECT * FROM kategori");
   $jumlahkategori = mysqli_num_rows($querykategori);

   $queryproduk = mysqli_query($conn, "SELECT * FROM produk");
   $jumlahproduk = mysqli_num_rows($queryproduk);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css"

</head>

<style>
    .kotak {
        border: solid;
    }

    .summary-kategori {
        background-color: #4DD0E1;
        border-radius: 15px;
    }

    .summary-produk{
        background-color: #03A9F4;
        border-radius: 15px;
    }

    .no-decoration {
        text-decoration: none;
    }

</style>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
    <h1>HALO: <?php echo $_SESSION['username']?></h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 summary-kategori p-3 mb-3">
                <div class="row">
                        <div class="col-5">
                            <i class="fas fa-align-justify fa-5x "> </i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Kategori</h3>
                            <p class="fs-4"><?php echo $jumlahkategori; ?> Kategori</p>
                            <p><a href="kategori.php" class="text-white no-decoration">Deskripsi</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

            <div class="col-lg-3 col-md-6 summary-produk p-3">
                    <div class="row">
                        <div class="col-5">
                            <i class="fas fa-box fa-5x "> </i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Produk</h3>
                            <p class="fs-4"><?php echo $jumlahproduk; ?> Produk</p>
                            <p><a href="kategori.php" class="text-white no-decoration">Deskripsi</a></p>
                        </div>
                    </div>
            </div>
        </div>
    
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>