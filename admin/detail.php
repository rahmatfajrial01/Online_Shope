<?php
$ambil = $koneksi->query("SELECT * FROM t_pembelian JOIN t_pelanggan ON t_pembelian.
id_pelanggan=t_pelanggan.id_pelanggan
WHERE t_pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>




<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
        </div>

        <!-- <pre><?php //print_r($detail); 
                    ?></pre> -->






        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <div class="row">

                        <div class="col-md-4">
                            <h3>pembelian</h3>
                            <p>
                                tanggal : <?php echo $detail['tanggal_pembelian']; ?>
                                <br>
                                total : RP.<?php echo number_format($detail['total_pembelian']); ?>
                                <br>
                                Status : <?php echo $detail['status_pembelian']; ?>

                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3>pelanggan</h3>
                            <strong> <?php echo $detail['nama_pelanggan']; ?></strong><br>
                            <p>
                                <?php echo $detail['telepon_pelanggan']; ?>
                                <br>
                                <?php echo $detail['email_pelanggan']; ?>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h3>pengiriman</h3>
                            <strong> <?php echo $detail['nama_kota']; ?></strong><br>
                            <P>
                                Tarif : Pp. <?php echo number_format($detail['tarif']); ?><br>
                                Alamat : <?php echo ($detail['alamat_pengiriman']); ?>
                            </P>
                        </div>
                    </div>






                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama produk</th>
                            <th>harga</th>
                            <th>jumlah</th>
                            <th>subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php $ambil = $koneksi->query("SELECT * FROM t_pembelian_produk JOIN t_produk ON 
                        t_pembelian_produk.id_produk=t_produk.id_produk 
                        WHERE t_pembelian_produk.id_pembelian='$_GET[id]'"); ?>
                        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['nama_produk']; ?></td>
                                <td>Rp.<?php echo $pecah['harga_produk']; ?></td>
                                <td><?php echo $pecah['jumlah']; ?></td>
                                <td>Rp.<?php echo $pecah['harga_produk'] * $pecah['jumlah']; ?></td>


                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br>