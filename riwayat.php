<?php
session_start();
//koneksi ke database
include 'koneksi.php';




// <!-- jika tidak ada sesiom pelanggan -->
if (!isset($_SESSION["pelanggan"]) or  empty($_SESSION["pelanggan"])) {
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
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
    <!-- <pre><?php print_r($_SESSION) ?></pre> -->

    <section class="riwayat">
        <div class="container-fluid">

            <!-- DataTales Example -->
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">History Belanja</h6>
                </div>
                <div class=" card-header  ">
                    <br>
                    <h3>History Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- mendapatkan id pelanggan yang login dari session -->
                                <?php $nomor = 1; ?>
                                <?php $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

                                $ambil = $koneksi->query("SELECT * FROM t_pembelian
                                    WHERE id_pelanggan='$id_pelanggan'");
                                while ($pecah = $ambil->fetch_assoc()) {
                                ?>



                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $pecah['tanggal_pembelian'] ?></td>
                                        <td>
                                            <?php echo $pecah['status_pembelian'] ?>
                                            <br>
                                            <?php if (!empty($pecah['resi_pengiriman'])) : ?>
                                                Resi: <?php echo $pecah['resi_pengiriman']; ?>
                                            <?php endif ?>
                                        </td>
                                        <td>Rp.<?php echo number_format($pecah["total_pembelian"]) ?></td>
                                        <td>
                                            <a href="nota.php?id=<?php echo $pecah["id_pembelian"]  ?>" class="btn-info btn">Nota</a>
                                            <?php if ($pecah['status_pembelian'] == 'pending') : ?>
                                                <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]  ?>" class="btn-primary btn">
                                                    Input Pembayaran</a>
                                            <?php else : ?>
                                                <a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]  ?>" class="btn-warning btn">
                                                    Lihat Pembayaran</a>


                                            <?php endif  ?>
                                        </td>
                                    </tr>
                                    <?php $nomor++; ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br> <br> <br> <br> <br>
    </section>



</body>

</html>