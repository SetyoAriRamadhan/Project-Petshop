<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Produk</b></h5>
</div>

<?php

$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
while($pecah = $ambil->fetch_assoc())
{
    $produk[] = $pecah;
}

?>

<a href="index.php?halaman=tambah_produk" class="btn btn-sm btn-success">Tambah</a>

<div class="card shadow bg-white mt-3">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" id="tables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $key => $value): ?>
                <tr>
                    <td width="50"><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama_kategori']; ?></td>
                    <td><?php echo $value['nama_produk']; ?></td>
                    <td><?php echo number_format($value['harga_produk']); ?></td>
                    <td class="text-center">
                        <img width="150" src="../assets/foto_produk/<?php echo $value['foto_produk']; ?>">
                    </td>
                    <td class="text-center" width="200">
                        <a href="index.php?halaman=edit_produk&id=<?php echo $value['id_produk']; ?>" class="btn btnn-sm btn-primary">Edit</a>
                        <a href="index.php?halaman=hapus_produksi&id=<?php echo $value['id_produk']; ?>" class="btn btnn-sm btn-danger">Hapus</a>
                        <a href="index.php?halaman=detail_produk&id=<?php echo $value['id_produk']; ?>" class="btn btnn-sm btn-info">Detail</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
    </div>
</div>