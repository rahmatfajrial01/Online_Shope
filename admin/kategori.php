<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
    </div>
    <div class=" card-header  ">
          
             <a href="index.php?halaman=tambahkategori" class="btn-primary btn">Tambah Kategori</a>
         </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>                                         
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM t_kategori"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama_kategori']; ?></td>
                          
                            <td>
                            <a href="index.php?halaman=hapuskategori&id= <?php echo $pecah['id_kategori']; ?>" class="btn-danger btn">Hapus</a>
                            <a href="index.php?halaman=ubahkategori&id= <?php echo $pecah['id_kategori']; ?>"class="btn-warning btn">Edit</a>

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