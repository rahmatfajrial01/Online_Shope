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


// <!--  mendapatkan id pembelian dari url -->
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM t_pembelian WHERE id_pembelian ='$idpem'");
$detpem = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detpem);
// print_r($_SESSION);
// echo "</pre>";

// ambil id pelanggan beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// ambil id pelanggan login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];


if ($id_pelanggan_login !==  $id_pelanggan_beli) {
    echo "<script>alert('kwkw');</script>";
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
    <!-- <pre><?php //print_r($_SESSION) 
                ?></pre>  -->
    <br>
    <section class="riwayat">
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konfirmasi pembayaran</h6>
                </div>
                <div class=" card-header  ">

                    <p>Nama : <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></p>
                    <div class="alert alert-info">Total Tagihan Anda <strong>Rp.<?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <!-- form -->
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama Penyetor</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Bank</label>
                                <input type="text" class="form-control" name="bank">
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" name="jumlah">
                            </div>
                            <div class="form-group">
                                <label>Foto Bukti</label>
                                <input type="file" class="form-control-file" name="bukti">
                                <P class="text-danger">foto bukti harus JPG maksimal 2mb</P>
                                <button class="btn-primary btn" name="kirim">Simpan</button>
                            </div>

                    </div>
                    </form>
                    <!-- form -->

                    <!-- input bukti -->

                    <?php
                    if (isset($_POST['kirim'])) {
                        $namabukti = $_FILES['bukti']['name'];
                        $lokasibukti = $_FILES['bukti']['tmp_name'];
                        $namafiks = date("YmdHis") . $namabukti;
                        move_uploaded_file($lokasibukti, "bukti_pembayaran/" . $namafiks);

                        $nama = $_POST["nama"];
                        $bank = $_POST["bank"];
                        $jumlah = $_POST["jumlah"];
                        $tanggal = date("Y-m-d");


                        $koneksi->query("INSERT INTO t_pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
                      VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");
                        // echo "<div class = 'alert alert-info'>data tersimpan</div>";
                        // echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

                        //update statud pembelian
                        $koneksi->query("UPDATE t_pembelian SET status_pembelian='sudah kirim pembayaran'
                    WHERE id_pembelian='$idpem'");

                        echo "<script>alert('terima kasih anda sudah mengirimkan bukti pembayaran');</script>";
                        echo "<script> location='riwayat.php' ; </script>";
                    }
                    ?>



                </div>
            </div>
        </div>
        </div>
        <br> <br> <br> <br> <br>
    </section>



</body>

</html>