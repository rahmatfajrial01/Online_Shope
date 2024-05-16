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
                         <select class="form-control" name="id_kategori" id="">
                            <option value="">Pilih kategori</option>
                            <?php  foreach ($datakategori as $key  =>$value): ?>
                            <option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
                            
                            <?php  endforeach ?>     
                        </select>
                     </div>
                     <div class="form-group">
                         <label>Nama Produk</label>
                         <input type="text" class="form-control" placeholder="..." name="nama">
                     </div>
                     <div class="form-group">
                         <label>Harga Produk (Rp)</label>
                         <input type="number" class="form-control" placeholder="..." name="harga">
                     </div>
                     <div class="form-group">
                         <label>Berat Produk (Kg)</label>
                         <input type="number" class="form-control" placeholder="..." name="berat">
                     </div>
                     <div class="form-group">
                         <label>Deskripsi</label>
                         <textarea class="form-control" rows="3" name="deskripsi"></textarea>
                     </div>
                     <div class="form-group">
                         <label>Stok</label>
                         <input type="number" class="form-control" placeholder="..." name="stok">
                     </div>
                     
                     <div class="form-group">
                         <label> file input</label>
                         <input type="file" class="form-control-file" name="foto">
                     </div>

                     <div class="">
                         <br>
                         <button class="btn-primary btn" name="save">Simpan</button>
                     </div>
                 </form>
                 <?php
                    if (isset($_POST['save'])) {
                        $nama = $_FILES['foto']['name'];
                        $Lokasi = $_FILES['foto']['tmp_name'];
                        move_uploaded_file($Lokasi, "../foto_produk/" . $nama);
                        $koneksi->query("INSERT INTO t_produk(nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk,id_kategori)
                      VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]','$_POST[id_kategori]')");
                        echo "<div class = 'alert alert-info'>data tersimpan</div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
                    }
                    ?>





             </div>
         </div>
     </div>
 </div>

 <br> <br> <br>