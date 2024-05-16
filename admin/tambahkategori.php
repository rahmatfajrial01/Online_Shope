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
             <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
         </div>
         
         <div class="card-body">
             <div class="table-responsive">




                 <form method="post" enctype="multipart/form-data">
                 <div class="form-group">
                         
                    
                     <div class="form-group">
                         <label>Nama Kategori</label>
                         <input type="text" class="form-control" placeholder="..." name="kategori">
                     </div>
                     
                    

                     <div class="">
                         
                         <button class="btn-primary btn" name="save">Simpan</button>
                     </div>
                 </form>
                 <?php
                    if (isset($_POST['save'])) {
                       
                     
                        $koneksi->query("INSERT INTO t_kategori(nama_kategori)
                      VALUES('$_POST[kategori]')");
                        echo "<div class = 'alert alert-info'>data tersimpan</div>";
                        echo "<script>location='index.php?halaman=kategori';</script>";
                    }
                    ?>





             </div>
         </div>
     </div>
 </div>

 <br> <br> <br>  <br> <br> <br> <br> <br> 