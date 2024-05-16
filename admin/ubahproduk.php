<?php
$ambil = $koneksi->query("SELECT * FROM t_produk WHERE id_produk='$_GET[id]'");
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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">




                <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                         <label>Kategori</label>
                         <select class="form-control" name="id_kategori" >
                            <option value="">Pilih kategori</option>

                            <?php  foreach ($datakategori as $key  =>$value): ?>
                            <option value="<?php echo $value['id_kategori']; ?>" <?php if ($pecah["id_kategori"]==$value["id_kategori"])  {echo "selected";} ?>>
                            <?php echo $value['nama_kategori']; ?></option>
                            
                            <?php  endforeach ?>     
                        </select>
                     </div> 
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" placeholder="..." name="nama" value="<?php echo $pecah['nama_produk']; ?>  ">
                    </div>
                    <div class="form-group">
                        <label>Harga Produk (Rp)</label>
                        <input type="text"  class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>Berat Produk (Kg)</label>
                        <input type="text" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?> ">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" name="deskripsi">
                        <?php echo $pecah['deskripsi_produk']; ?> 
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>stok</label>
                        <input type="text" name="stok" class="form-control" value="<?php echo $pecah['stok_produk']; ?> ">
                    </div>
                    <div class="form-group">
                        <label> Ganti foto</label>
                        <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" rows="10">

                        <input type="file" class="form-control" name="foto">
                    </div>

                    <div class="">
                        <br>
                        <button class="btn-primary btn" name="ubah">Ubah</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['ubah'])) {
                    $namafoto = $_FILES['foto']['name'];
                    $Lokasifoto = $_FILES['foto']['tmp_name'];
                    //jika fiti diubah
                    if (!empty($Lokasifoto)) {
                        move_uploaded_file($Lokasifoto, "../foto_produk/$namafoto");


                        $koneksi->query("UPDATE t_produk SET 
                    nama_produk='$_POST[nama]',
                    harga_produk='$_POST[harga]',
                    berat_produk='$_POST[berat]',
                    foto_produk='$namafoto',
                    deskripsi_produk='$_POST[deskripsi]',
                    stok_produk='$_POST[stok]',
                    id_kategori='$_POST[id_kategori]'
                    
                    
                     WHERE id_produk='$_GET[id]'");
                    } else {
                        $koneksi->query("UPDATE t_produk SET 
                    nama_produk='$_POST[nama]',
                    harga_produk='$_POST[harga]',
                    berat_produk='$_POST[berat]',
                    deskripsi_produk='$_POST[deskripsi]',
                    stok_produk='$_POST[stok]',
                    id_kategori='$_POST[id_kategori]'
                     WHERE id_produk='$_GET[id]'");
                    }
                    echo "<script>alert('data produk telah di ubah');</script>";
                    echo "<script>location='index.php?halaman=produk';</script>";
                }
                ?>





            </div>
        </div>
    </div>
</div>

<br> <br> <br><br> <br> <br><br> <br> <br>