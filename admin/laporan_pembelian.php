<?php
$semuadata = array();
$tgl_mulai = "";
$tgl_selesai = "";
$status=""; 

if (isset($_POST["kirim"])) {
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST['tgls'];
    $status = $_POST["status"];
    $ambil = $koneksi->query("SELECT * FROM t_pembelian pm LEFT JOIN t_pelanggan pl ON
   pm.id_pelanggan=pl.id_pelanggan WHERE Status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
    while ($pecah = $ambil->fetch_assoc()) 
    {
        $semuadata[] = $pecah;
    }
    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";
}
?>


<section class="konten">
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Pembayaran</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <h2>Laporan Pembelian Dari <strong> <?php echo $tgl_mulai ?> </strong>Hingga <strong><?php echo $tgl_selesai ?></strong></h2>

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="">Status</label>
                               <select class="form-control" name="status" id="">
                                   <option value="">Pilih status</option>
                                   <option value="pending">Pending (Belum Bayar)</option>
                                   <option value="Sudah Kirim Pembayaran">Sudah Kirim Pembayaran</option>
                                   <option value="Lunas">Lunas</option>
                                   <option value="Barang Dikirim">Barang Dikirim</option>
                                   <option value="Dibatalkan">Dibatalkan</option>
                               </select>
                            </div>
                            <div class="col-md-1">
                                <label for="">&nbsp;</label> <br>
                                <button class="btn-primary btn" name="kirim"> Lihat </button>
                            </div>
                            <div class="col-md-1">
                                <label for="">&nbsp;</label> <br>
                                <a class="btn-primary btn" href="download_laporan.php?tglm=<?php echo $tgl_mulai ?>&tgls=<?php echo $tgl_selesai ?>&status=<?php echo $status ?>" target="_blank">Cetak  </a>
                            </div>
                        </div>
                    </form>

                              <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total=0; ?>
                            <?php foreach ($semuadata as $key => $value) : ?>
                                <?php $total+=$value['total_pembelian'] ?>

                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value["nama_pelanggan"] ?></th>
                                    <td><?php echo $value["tanggal_pembelian"] ?></th>
                                    <td>Rp.<?php echo number_format($value["total_pembelian"]) ?></th>
                                    <td><?php echo $value["status_pembelian"] ?></th>
                                </tr>
                            <?php endforeach  ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>Rp.<?php echo number_format($total) ?></th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    <br> <br> <br> <br> <br>
</section>

</body>
<!-- <a href="download_laporan.php?tglm=<?php echo $tgl_mulai ?>&tgls=<?php echo $tgl_selesai ?>&status=<?php echo $status ?>"> Cetak Laporan </a> -->