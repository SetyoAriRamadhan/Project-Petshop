<?php

$id_foto = $_GET['idfoto'];
$id_produk = $_GET['idproduk'];

$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk_foto='$id_foto'");
$detail_foto = $ambil->fetch_assoc();
$nama_foto = $detail_foto['nama_produk_foto'];

unlink("../assets/foto_produk/".$nama_foto);

$koneksi->query("DELETE FROM produk_foto WHERE id_produk_foto=$id_foto");

echo "<script>alert('foto produk berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=detail_produk&id=$id_produk';</script>";

?>