<?php
    require "koneksi.php";

    $queryKeranjang = mysqli_query($conn, "SELECT * FROM keranjang");
    $keranjang = mysqli_fetch_array($queryKeranjang);
    $jumlahProduk = mysqli_num_rows($queryKeranjang);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Keranjang</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
            <div class="mt-3 mb-5">
            <h2> LIST DIBELI </h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama.</th>
                            <th>Harga</th>
                            <th>Ketersediaan Stok</th>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahProduk==0){
                        ?>
                                <tr>
                                    <td colspan=6 class="text-center">Tidak ada Data Untuk Produk</td>
                                </tr>
                        <?php
                            }
                            else
                            {
                                $jumlah = 1;
                                while($keranjang=mysqli_fetch_array($queryKeranjang)){
                        ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $keranjang['nama']; ?></td>
                                    <td><?php echo $keranjang['harga']; ?></td>
                                    <td><?php echo $keranjang['ketersediaan_stok']; ?></td>
                                    <td>
                                        <button class="btn btn-danger"> Hapus </button>
                                        </td>
                                </tr>           
                        <?php
                                
                                }
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class=""></div>
    </div>



    <?php require "footer.php" ?> 
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>