<?php

//koneksi ke database
include 'koneksi.php';


session_start();
// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

// if (!isset($_SESSION['pelanggan'])) {
//     echo "<script>alert('anda harus login');</script>";
//     echo "<script>location='login.php';</script>";

//     exit();
// }

if (empty($_SESSION["keranjang"]) or !isset($_SESSION['keranjang'])) {
    echo "<script>alert('keranjang kosong silahkan berbelanja');</script>";
    echo "<script>location='index.php';</script>";
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

    <title>Keranjang Belanja</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <!--navbar-->
    <?php include 'menu.php'; ?>
    <br>

    <section class="konten">
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
                </div>
                <div class=" card-header  ">
                    
                    <a href="index.php" class="btn-success btn">Tambah Keranjang</a>
                    <a href="checkout.php" class="btn-primary btn">Checkout</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subharga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                                    <!-- menampilkan produk yaang sedang diperulangkan berdasrakan id _produk -->
                                    <?php $ambil = $koneksi->query("SELECT * FROM t_produk 
                            WHERE id_produk ='$id_produk'");
                                    $pecah = $ambil->fetch_assoc();

                                    // tambah 
                                    $subharga = $pecah["harga_produk"] * $jumlah;

                                    // echo "<pre>";
                                    // print_r($pecah);
                                    // echo "</pre>";

                                    ?>

                                    <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $pecah['nama_produk']; ?></td>
                                        <td>Rp.<?php echo number_format($pecah['harga_produk']); ?></td>
                                        <td><?php echo $jumlah  ?></td>
                                        <td>Rp.<?php echo number_format($subharga); ?></td>
                                        <td>
                                            <a href="hapuskeranjang.php?id=<?php echo $id_produk  ?>" class="btn-danger btn">hapus</a>
                                        </td>
                                    </tr>
                                    <?php $nomor++; ?>
                                <?php endforeach  ?>

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