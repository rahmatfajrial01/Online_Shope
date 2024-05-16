<?php session_start();
//koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Toko Ikan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- masukan menu -->
    <?php include 'menu.php'; ?>

    <!--konten-->
    <div class="container-fluid">

<!-- DataTales Example -->
<br>
            <div class="card shadow mb-4 ">
            <div class="card-header py-3">
            <div class="container">           
            <form action="pencarian.php" method="get" class="form-inline my-2 my-lg-0 form-right">
                     <input class="form-control mr-sm-2 "  type="search" placeholder="Cari" name="keyword"  aria-label="Search">
                     <button class=" btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                      </form>
                      </div>    
                      </div>            
                <!-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
                </div> -->
                <div class="card-body ">
                    <div class="table-responsive">

                <!--section-->
                <section class="konten">
                    <div class="container">
                        <!-- <h1>produk terbaru</h1> -->
                        <br>
                        

                        <div class="row">

                            <?php $ambil = $koneksi->query("SELECT * FROM t_produk"); ?>
                            <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                                <!-- <pre>     <?php print_r($perproduk) ?></pre> -->
                                <div class="col-md-3">
                                    <div class="card mb-4 " style="width: 16rem;">

                                        <div class="thumbnail ">

                                            <img class="card-img-top" alt="Card image cap" src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">

                                            <div class="card-body bg-white shadow">
                                                <h3 class="card-title">
                                                    <?php echo $perproduk['nama_produk']; ?>
                                                </h3>
                                                <h5>RP.<?php echo number_format($perproduk['harga_produk']); ?>
                                                </h5>

                                                <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn-primary btn">Beli</a>
                                                <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn-success btn">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    </div>
        </div>
    </div>
    </div>
        </div>
    


    <!--script-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>