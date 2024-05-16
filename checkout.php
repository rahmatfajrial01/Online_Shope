<?php session_start();
//koneksi ke database
include 'koneksi.php';


//jika tidak ada sessio pelanggan (belum login) maka di kembalikan ke login
if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>";

    exit();
}
?>


<!-- bila tidak ada data di checkout -->
<?php
if (empty($_SESSION["keranjang"]) or !isset($_SESSION['keranjang'])) {
    echo "<script>alert('data checkout kosong silahkan berbelanja');</script>";
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

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <!-- masukan menu -->
    <?php include 'menu.php'; ?>

    <br>
    <section class="konten">
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
                </div>
                <form method="post" action="">
                    <div class=" card-header  ">

                        <button class="btn-primary btn" name="checkout">Checkout</button>
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    <?php $totalbelanja = 0; ?>
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
                                        </tr>

                                        <?php $nomor++; ?>
                                        <?php $totalbelanja += $subharga; ?>
                                    <?php endforeach  ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">total belanja</th>
                                        <th>Rp.<?php echo  number_format($totalbelanja) ?></th>
                                    </tr>
                                </tfoot>
                            </table>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']  ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan']  ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control " name="id_ongkir">
                                        <option value="">Pilih Tujuan dan Ongkos Kirim</option>
                                        <?php
                                        $ambil = $koneksi->query("SELECT * FROM t_ongkir");
                                        while ($perongkir = $ambil->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $perongkir["id_ongkir"]  ?>">
                                                <?php echo $perongkir['nama_kota'] ?> -
                                                RP. <?php echo  number_format($perongkir['tarif']) ?>
                                            </option>


                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="form-group"></div>
                            <label for="">Alamat Lenkap Peringiman </label>
                            <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan alamat lengkap pengiriman disini"></textarea>

                </form>
                <?php

                if (isset($_POST["checkout"])) {
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                    $id_ongkir = $_POST["id_ongkir"];
                    $tanggal_pembelian = date("Y-m-d");
                    $alamat_pengiriman = $_POST["alamat_pengiriman"];
                    $ambil = $koneksi->query("SELECT * FROM t_ongkir WHERE id_ongkir='$id_ongkir'");
                    $arrayongkir = $ambil->fetch_assoc();
                    $nama_kota = $arrayongkir['nama_kota'];

                    $tarif = $arrayongkir['tarif'];

                    $total_pembelian = $totalbelanja + $tarif;

                    //1. menyimapan data ke tabel pembelian
                    $koneksi->query("INSERT INTO t_pembelian (
                    id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)
                      VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");


                    // mendapatkan id pembelian barusan terjadi
                    echo $koneksi->insert_id;
                    $id_pembelian_barusan = $koneksi->insert_id;
                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

                        //mendapapkan keranjang data produk berdasarkan id prouk
                        $ambil = $koneksi->query("SELECT * FROM t_produk Where id_produk='$id_produk'");
                        $perproduk = $ambil->fetch_assoc();

                        $nama =  $perproduk['nama_produk'];
                        $harga =  $perproduk['harga_produk'];
                        $berat =  $perproduk['berat_produk'];
                        $subberat = $perproduk['berat_produk'] * $jumlah;
                        $subharga =  $perproduk['harga_produk'] * $jumlah;

                        $koneksi->query("INSERT INTO t_pembelian_produk(id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
                VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

                        //skrip stock

                        $koneksi->query("UPDATE t_produk SET stok_produk=stok_produk - $jumlah
                  Where id_produk= '$id_produk'");
                    }






                    //mengosongkan keranjang belanja

                    unset($_SESSION["keranjang"]);
                    // tampilan dialihkan ke halman nota  dari pembelian barusan
                    echo "<script>alert('pembelian sukses');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
                }


                ?>
            </div>
        </div>
        </div>
        </div>



    </section>


    <!-- <pre><?php print_r($_SESSION['pelanggan']) ?></pre>
    <pre><?php print_r($_SESSION['keranjang']) ?></pre> -->



</body>
<br> <br> <br> <br> <br>

</html>