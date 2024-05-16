<?php session_start(); ?>
<?php include 'koneksi.php'; ?>


<?php
//mendapatkan id produk
$id_produk = $_GET['id'];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM t_produk WHERE id_produk='$id_produk' ");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detail</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>
    <!-- navbar -->
    <?php include 'menu.php'; ?>
    <br>


    <section class="konten">
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
                </div>


                <div class="card-body">
                    <div class="table-responsive">

                        <section class="kontent">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="card-img-top" alt="Card image cap" src="foto_produk/<?php echo $detail['foto_produk'];  ?>" alt="" class="img-responsive">
                                    </div>
                                    <div class="col-md-6">

                                        <h2><?php echo $detail['nama_produk']; ?></h2>
                                        <h4>Rp. <?php echo number_format($detail['harga_produk']); ?></h4>
                                        <!-- <h4><?php echo $detail['berat_produk']; ?></h4> -->
                                        <p>stock : <?php echo $detail['stok_produk']; ?></p>

                                        <form method="post" action="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
                                                    <div class="input-group-btn">
                                                        <button class="btn-primary btn" name="beli">beli</button>
                                                    </div>
                                                </div>
                                                <br>
                                                <p> <?php echo $detail['deskripsi_produk']; ?></p>
                                            </div>
                                        </form>

                                        <?php
                                        // jika ada tombol beli
                                        if (isset($_POST["beli"])) {
                                            //    mendapatlam ki yang akan di inputkan
                                            $jumlah = $_POST["jumlah"];

                                            // masukan ke keranjang belanja
                                            $_SESSION["keranjang"][$id_produk] =  $jumlah;


                                            echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                                            echo "<script>location='keranjang.php';</script>";
                                        }

                                        ?>


                                    </div>
                                    <br>
                                </div>
                            </div>

                        </section>

                    </div>
                </div>


            </div>
        </div>
        <br> <br> <br> <br> <br>














    </section>

</body>

</html>