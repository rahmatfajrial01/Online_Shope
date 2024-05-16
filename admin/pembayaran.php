<?php
$id_pembelian = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM t_pembayaran WHERE id_pembelian ='$id_pembelian'");
$detail = $ambil->fetch_assoc();


// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $detail['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td><?php echo $detail['bank'] ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>Rp. <?php echo number_format($detail['jumlah']) ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?php echo $detail['tanggal'] ?></th>
                            </tr>
                        </table>

                    </div>
                    <div class="col-md-4">
                        <img src="../bukti_pembayaran/<?php echo $detail['bukti']; ?>" class="img-responsive" style="width: 17rem;">
                    </div>
                </div>

                <form action="" method="POST">
                    <div class="form-group">
                        <label>No Resi Pengiriman</label>
                        <input type="text" class="form-control" name="resi" id="">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" id="">
                            <option value="">Pilih Status</option>
                            <option value="Lunas">Lunas</option>
                            <option value="barang dikirim">barang dikirim</option>
                            <option value="batal">batal</option>
                        </select>
                    </div>
                    <button class="btn-primary btn" name="proses">Proses</button>

                </form>
                <?php
                if (isset($_POST["proses"])) {
                    $resi = $_POST["resi"];
                    $status = $_POST["status"];
                    $koneksi->query("UPDATE t_pembelian SET resi_pengiriman='$resi',status_pembelian='$status'
                WHERE id_pembelian='$id_pembelian'");
                    echo "<script>alert('data pembelian terupdate');</script>";
                    echo "<script>location='index.php?halaman=pembelian';</script>";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<br> <br> <br> <br> <br>