<?php
$ambil= $koneksi->query("SELECT * FROM t_kategori WHERE id_kategori='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM t_kategori WHERE id_kategori='$_GET[id]'");
echo "<script>alert('kategori terhapus');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
