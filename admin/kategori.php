<?php
   require "session.php";
   require "../koneksi.php";

   $querykategori = mysqli_query($conn, "SELECT * FROM kategori");
   $jumlahkategori = mysqli_num_rows($querykategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">

</head>
<body>
    <?php
        require "navbar.php";
    ?>
    <div class="container mt-4">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="text-muted text-decoration-none">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                   <i class="fas fa-align-justify"></i> Kategori
                </li>
            </ol>
        </nav>

        <div class="my-4 col-12 col-md-6">
            <h3>Tambah Kategori</h3>

            <form action="" method="post">
                <div>
                    <label for="kategori" >Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="input nama kategori"
                    class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <button class="btn btn-primary my-2" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    $queryexist = mysqli_query($conn, "SELECT nama FROM kategori WHERE nama = '$kategori'");
                    $jumlahkategoribaru = mysqli_num_rows($queryexist);

                    if($jumlahkategoribaru>0){
                        ?>
                            <div class="alert alert-primary my-3" role="alert">
                                Kategori Sudah Ada!
                            </div>
                        <?php
                    }
                    else{
                        $querysimpan = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES
                        ('$kategori')");
                        if($querysimpan){
                            ?>
                            <div class="alert alert-primary my-3" role="alert">
                                Kategori Tersimpan
                            </div>
                                <meta http-equiv="refresh" content="2; url = kategori.php" />
                            <?php
                        }
                        else{
                            echo mysqli_error($conn);
                        }

                    }
                }
            ?>
        </div>

        <div class="mt-3">
            <h2>LIST KATEGORI</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Nama.</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($jumlahkategori==0)
                            {
                    ?>
                                <tr>
                                    <td colspan=3 class="text-center">Tidak ada Data Untuk Kategori</td>
                                </tr>
                    <?php
                            }
                            else
                            {
                                $jumlah = 1;
                                while($data = mysqli_fetch_array($querykategori))
                                {
                        ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td>
                                            <a href="kategori-detail.php?p=<?php echo $data['id']; ?>" 
                                            class="btn btn-info"><i class="fas fa-search"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                    $jumlah++;
                                }
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>




    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>