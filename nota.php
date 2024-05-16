<?php
session_start();
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

    <title>Nota Pembelian</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <?php include 'menu.php'; ?>
    <br>

    <section class="konten">

        <!-- kopas nota yang ada di admin -->
        <?php
        $ambil = $koneksi->query("SELECT * FROM t_pembelian JOIN t_pelanggan ON t_pembelian.
id_pelanggan=t_pelanggan.id_pelanggan
WHERE t_pembelian.id_pembelian='$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        ?>




        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
                </div>



                <!-- jika pelanggan yang beli tidak sama dengan pelanggan 
                yang login,maka dilarikan kw riwayat -->

                <?php
                $idpelangganyangbeli = $detail["id_pelanggan"];

                //mendapatkan id pelanggan yang login
                $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

                if ($idpelangganyangbeli !==   $idpelangganyanglogin) {
                    echo "<script>alert('wkwk');</script>";
                    echo "<script>location='riwayat.php';</script>";
                }

                ?>



                <!-- form -->

                <br>

                <div class="card-body">
                    <div class="container">
                        <div class="form-group">

                            <!-- form  -->
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Pembelian</h3>
                                    <strong>No.pembelian: <?php echo $detail['id_pembelian']; ?></strong> <br>
                                    Tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
                                    Total: Rp. <?php echo  number_format($detail['total_pembelian']); ?>
                                </div>
                                <div class="col-md-4">
                                    <h3>Pelanggan</h3>
                                    <strong> <strong><?php echo $detail['nama_pelanggan']; ?></strong></strong>
                                    <p>
                                        <?php echo $detail['telepon_pelanggan']; ?> <br>

                                        <?php echo $detail['email_pelanggan']; ?>
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <h3>Pengiriman</h3>
                                    <strong> <?php echo $detail['nama_kota']; ?></strong> <br>
                                    Ongkis Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
                                    Alamat: <?php echo $detail['alamat_pengiriman']; ?>
                                </div>
                            </div>
                        </div>
                    </div>








                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama produk</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Jumlah</th>
                                    <th>Subberat</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php $ambil = $koneksi->query("SELECT * FROM t_pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
                                <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $pecah['nama']; ?></td>
                                        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                                        <td><?php echo $pecah['berat']; ?> Kg</td>
                                        <td><?php echo $pecah['jumlah'] ?></td>
                                        <td><?php echo $pecah['subberat'] ?></td>
                                        <td>Rp. <?php echo number_format($pecah['subharga']) ?></td>


                                    </tr>
                                    <?php $nomor++; ?>
                                <?php } ?>

                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="alert alert-info">
                                    <p>
                                        Silahkan Melakukan Pembayaran Sejumlah Rp. <?php echo number_format($detail['total_pembelian']); ?>
                                        Pilih Salah Satu ke <br>
                                        <strong>Bang Mandiri 175-0115-234 Atas Nama Dinas Perikanan</strong>
                                        <br>
                                        <strong>Bang BNI 265-0034-575 Atas Nama Dinas Perikanan</strong>
                                        <br>
                                        <strong>Bang BRI 353-0238-786 Atas Nama Dinas Perikanan</strong>
                                    </p>

                                </div>

                            </div>
                        </div>



    </section>



</body>

</html>