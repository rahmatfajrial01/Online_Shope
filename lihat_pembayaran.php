<?php
session_start();
//koneksi ke database
include 'koneksi.php';

// <!--  mendapatkan id pembelian dari url -->
$idpembelian = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM t_pembayaran 
LEFT JOIN t_pembelian ON t_pembayaran.id_pembelian=t_pembelian.id_pembelian 
WHERE t_pembelian.id_pembelian ='$idpembelian'");
$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";


//jika belum ada data pembayaran
if (empty($detbay)) {
    echo "<script>alert('belum ada data pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}


//jika data pelanggan yang bayar tidak sesuai denga yang login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


// masih dalam keraguan
if ($_SESSION["pelanggan"]['id_pelanggan'] !== $detbay["id_pelanggan"]) {
    echo "<script>alert('anda tidak berhak melihat pembayaran orang lain');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}


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

<body>

    <!-- masukan menu -->
    <?php include 'menu.php'; ?>
<br>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
            </div>
            <div class=" card-header  ">
                <br>
                <h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">



                    <div class="container">
                        <h3>lihat pembayaran</h3>
                        <div class="row">

                            <div class="col-md-6">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Nama</th>
                                        <td> <?php echo $detbay['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bang</th>
                                        <td> <?php echo $detbay['bank']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td> <?php echo $detbay['tanggal']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>Rp. <?php echo number_format($detbay['jumlah']); ?></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-md-6">
                                <img src="bukti_pembayaran/<?php echo $detbay['bukti']; ?>" widht="50" style="width: 19rem;">


                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br>




</body>

</html>