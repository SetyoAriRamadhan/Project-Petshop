<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Detail Pembelian</b></h5>
</div>

<?php
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">

    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header">
                <strong>Data Pelanggan</strong>
            </div>
            <div class="card-body row">
                <label class="col-md-4 col-form-label">Nama :</label>
                <label class="col-md-8 col-form-label"><?php echo $detail['nama_pelanggan']; ?></label>
                <label class="col-md-4 col-form-label">Email :</label>
                <label class="col-md-8 col-form-label"><?php echo $detail['email_pelanggan']; ?></label>
                <label class="col-md-4 col-form-label">Telepon :</label>
                <label class="col-md-8 col-form-label"><?php echo $detail['telepon_pelanggan']; ?></label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow bg-white">
            <div class="card-header">
                <strong>Data Pembelian</strong>
            </div>
            <div class="card-body row">
                <label class="col-md-4 col-form-label">Tanggal :</label>
                <label class="col-md-8 col-form-label"><?php echo $detail['tanggal_pembelian']; ?></label>
                <label class="col-md-4 col-form-label">Total :</label>
                <label class="col-md-8 col-form-label">Rp<?php echo $detail['total_pembelian']; ?></label>
            </div>
        </div>
    </div>

</div>

<?php

$pp = array();
$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$id_pembelian'");
while ($pecah = $ambil->fetch_assoc())
{
    $pp[] = $pecah;
}

?>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pp as $key => $value): ?>
                <?php $subtotal = $value['harga_produk']*$value['jumlah']; ?>   
                <tr>
                    <td width="50"><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama_produk']; ?></td>
                    <td><?php echo number_format($value['harga_produk']); ?></td>
                    <td><?php echo $value['jumlah']; ?></td>
                    <td>Rp<?php echo number_format($subtotal); ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>