<div class="shadow p-3 mb-3 bg-white rounded">
    <h5><b>Halaman Detail Produk</b></h5>
</div>

<?php

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detail_produk = $ambil->fetch_assoc();

$produk_foto = array();
$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while($tiap = $ambil->fetch_assoc())
{
    $produk_foto[]=$tiap;
}

?>
<div class="card shadow bg-white">
    <div class="card header">
        <strong>Data Produk</strong>
    </div>
    <div class="card-body">

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Kategori :</label>
            <div class="col-sm-9">
                <input disabled class="form-control" value="<?php echo $detail_produk['nama_kategori']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama produk :</label>
            <div class="col-sm-9">
                <input disabled class="form-control" value="<?php echo $detail_produk['nama_produk']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Harga produk :</label>
            <div class="col-sm-9">
                <input disabled class="form-control" value="<?php echo $detail_produk['harga_produk']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stok Produk :</label>
            <div class="col-sm-9">
                <input disabled class="form-control" value="<?php echo $detail_produk['stok_produk']; ?>">
            </div>
        </div>

    </div>
</div>

<div class="row">
    <?php foreach ($produk_foto as $key => $value): ?>
    <div class="col-4">
        <div class="card" style="width: 21rem;">
        <img src="../assets/foto_produk/<?php echo $value['nama_produk_foto']; ?>" class="img-thumbnail">
        </div>
        <div class="card-footer text-center">
            <a href="index.php?halaman=hapus_foto&idfoto=<?php echo $value['id_produk_foto']; ?>&idproduk=<?php echo $value['id_produk']; ?>" class="btn btn-sm btn-danger">Hapus</a>
        </div>
    </div>
    <?php endforeach ?>
</div>

<form method="post" enctype="multipart/form-data">
    <div class="card shadow bg-white">
        <div class="card-header">
            <strong>Tambah Foto</strong>
        </div>
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">File Foto :</label>
                <div class="col-sm-9">
                    <input type="file" name="produk_foto" class="form-control">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-11">
                    <button name="simpan" class="btn btn-sm btn-success">Simpan</button>
                </div>
                <div class="col-md-1 text-right">
                    <a href="index.php?halaman=produk" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php

if(isset($_POST['simpan']))
{
    $namafoto = $_FILES['produk_foto']['name'];
    $lokasifoto = $_FILES['produk_foto']['tmp_name'];

    $tgl_foto = date('YmdHis') . $nama_foto;
    
    move_uploaded_file($lokasi_foto, "../assets/foto_produk/" . $tgl_foto);

    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('$id_produk','$tgl_foto')");

    echo "<script>alert('foto produk berhasil disimpan');</script>";
    echo "<script>location='index.php?halaman=detail_produk&id=$id_produk';</script>";
}

?>