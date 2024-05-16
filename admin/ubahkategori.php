<?php
$ambil = $koneksi->query("SELECT * FROM t_kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>

<?php
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM t_kategori");
while ($tiap = $ambil->fetch_assoc())
{
    $datakategori[]=$tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">




                <form method="post" enctype="multipart/form-data">
               
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="..." name="nama_kategori" value="<?php echo $pecah['nama_kategori']; ?>  ">
                    </div>


                    <div class="">
                        <br>
                        <button class="btn-primary btn" name="ubah">Ubah</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['ubah'])) {
                
                    //jika fiti diubah
                    if (!empty($Lokasifoto)) {
                        move_uploaded_file($Lokasifoto, "../foto_produk/$namafoto");


                        $koneksi->query("UPDATE t_kategori SET 
                    nama_kategori='$_POST[nama_kategori]'
                   
                    
                    
                     WHERE id_kategori='$_GET[id]'");
                    } else {
                        $koneksi->query("UPDATE t_kategori SET 
                    nama_kategori='$_POST[nama_kategori]'
                    
                     WHERE id_kategori='$_GET[id]'");
                    }
                    echo "<script>alert('data kategori telah di ubah');</script>";
                    echo "<script>location='index.php?halaman=kategori';</script>";
                }
                ?>





            </div>
        </div>
    </div>
</div>

<br> <br> <br><br> <br> <br><br> <br> <br>