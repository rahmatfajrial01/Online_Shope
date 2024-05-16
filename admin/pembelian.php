 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Data Pembelian</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama Pelanggan</th>
                             <th>Tanggal</th>
                             <th>Status Pembelian</th>
                             <th>Total</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $nomor = 1; ?>
                         <?php $ambil = $koneksi->query("SELECT * FROM t_pembelian JOIN t_pelanggan ON t_pembelian.
                         id_pelanggan=t_pelanggan.id_pelanggan"); ?>
                         <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                             <tr>
                                 <td><?php echo $nomor; ?></td>
                                 <td><?php echo $pecah['nama_pelanggan']; ?></td>
                                 <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                                 <td><?php echo $pecah['status_pembelian']; ?>
                                <br>
                                <?php if (!empty($pecah['resi_pengiriman'])) : ?>
                                                Resi: <?php echo $pecah['resi_pengiriman']; ?>
                                            <?php endif ?>
                                </td>
                                 <td><?php echo $pecah['total_pembelian']; ?></td>
                                 <td>
                                     <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn-info btn">Detail</a>

                                     <?php if ($pecah['status_pembelian'] !== "pending") : ?>
                                         <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn-success btn">Pembayaran</a>
                                     <?php endif ?>

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