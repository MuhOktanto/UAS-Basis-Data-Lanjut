<?php
    require "koneksi.php";

    $queryProduk = mysqli_query($conn, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TOKO ONLINE | HOME </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container warnatulisan text-center">
            <h1> TOKO BAJU ONLINE </h1>
            <h3> Apa Yang Ingin Dicari? </h3>

            <div class="col-md-8 offset-md-2">
                <form action="produk.php" method="get">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Barang" 
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna3"> Telusuri </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- kategori highlight -->
    <div class="container-fluid py-5" >
        <div class="container text-center" >
            <h3> Kategori Terlaris </h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori kategori-jacket-pria d-flex justify-content-center
                    align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Jacket"> Jacket Pria </a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori kategori-kemeja d-flex justify-content-center
                    align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Kemeja"> Kemeja </a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori kategori-koko d-flex justify-content-center
                    align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Koko"> Koko </a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about us -->

    <div class="container-fluid warna2 py-5">
        <div class="container text-center">
            <h3 class="text-white"> About Us </h3>
            <p class="fs-5 mt-3 text-white fa-align-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, doloribus perspiciatis, aut consequuntur corrupti ducimus hic nulla 
                consectetur quasi odio harum quidem natus doloremque ex, tenetur aspernatur veniam! Modi est tempore ea necessitatibus eum magnam, 
                saepe exercitationem aliquam fugit esse repellendus at corporis reiciendis non ut iusto, quidem aut repellat dolorum harum? Voluptatem aspernatur, 
                asperiores suscipit rerum, vel delectus harum earum ex, odio veritatis commodi minus odit debitis amet! Earum nisi illo consequatur molestias ullam voluptatibus maxime quasi harum praesentium!
            </p>
        </div>
    </div>

    <!-- produk -->
    <<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Produk</h3>

        <div class="row mt-5">
            <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
            <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="image-box">
                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                        <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                        <p class="card-text text-harga">Rp.<?php echo $data['harga']; ?></p>
                        <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna2 text-white">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

    <!-- footer -->
<?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>