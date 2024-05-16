<?php
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

<body class="bg-gradient-primary">

    <!-- masukan menu -->
    <?php include 'menu.php'; ?>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Silahkan Buat Akun!</h1>
                            </div>
                            <form class="user" method="post" action="">

                                <div class="form-group">
                                    <input type="text" class="form-control 
                                   form-control-user" id="" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="" name="email" placeholder="Email Address" required>
                                </div>

                                <div class="form-group ">
                                    <input type="password" class="form-control form-control-user" id="" name="password" placeholder="Password" required>
                                </div>

                                <div class="form-group ">
                                    <input type="alamat" class="form-control form-control-user" id="" name="alamat" placeholder="Alamat" required>
                                </div>

                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="" name="telepon" placeholder="Telepon" required>
                                </div>


                                <button type="submit" class="btn btn-primary btn-user btn-block" name="daftar">
                                    Register Account
                                </button>

                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="login.php">Sudah Punya Akun? Login!</a>
                            </div>

                            <?php
                            if (isset($_POST["daftar"])) {

                                $nama = $_POST["nama"];
                                $email = $_POST["email"];
                                $password = $_POST["password"];
                                $alamat = $_POST["alamat"];
                                $telepon = $_POST["telepon"];

                                // apakah email sudah digunakan


                                $ambil = $koneksi->query("SELECT * FROM t_pelanggan 
                                        WHERE email_pelanggan='$email'");
                                $yangcocok = $ambil->num_rows;
                                if ($yangcocok == 1) {
                                    $akun = $ambil->fetch_assoc();
                                    $_SESSION["pelanggan"] = $akun;
                                    echo "<script>alert('Email sudah digunakan');</script>";
                                    echo "<script> location='daftar.php' ; </script>";
                                } else {
                                    // insert ke tabel pelanggan
                                    $koneksi->query("INSERT INTO t_pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan
                                    ,telepon_pelanggan,alamat_pelanggan)
                      VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]','$_POST[alamat]')");

                                    echo "<script>alert('pendaftaran sukses silahkan login');</script>";
                                    echo "<script> location='login.php' ; </script>";
                                }
                            }





                            ?>

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