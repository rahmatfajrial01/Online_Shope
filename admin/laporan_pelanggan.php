 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
         </div>
         <div class=" card-header  ">
          
             <a href="download_laporan_pelanggan.php" target="_blank" class="btn-primary btn">Cetak Laporan Pelanggan</a>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>no</th>
                             <th>email</th>
                             <th>nama</th>
                             <th>telepon</th>
                             <th>aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $nomor = 1; ?>
                         <?php $ambil = $koneksi->query("SELECT * FROM t_pelanggan"); ?>
                         <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                             <tr>
                                 <td><?php echo $nomor; ?></td>
                                 <td><?php echo $pecah['email_pelanggan']; ?></td>
                                 <td><?php echo $pecah['nama_pelanggan']; ?></td>
                                 <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                                 <td>
                                 <a href="index.php?halaman=hapuspelanggan&id= <?php echo $pecah['id_pelanggan']; ?>" class="btn-danger btn">Hapus</a>
                                    

                                 </td>

                             </tr>
                             <?php $nomor++; ?>
                         <?php } ?>

                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>