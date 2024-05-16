<?php session_start();
//mendapatkan id produk
$id_produk = $_GET['id'];

//jika sudah ada prodk  di keranjang, maka produk itu jumlahnya di +1

if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
} else
//selain itu (belum ada di keranjang), mk produk itu dianggap dibeli 1
{
    $_SESSION['keranjang'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//pergi ke keranjang

echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
