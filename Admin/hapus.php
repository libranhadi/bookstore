<h2>Hapus Data</h2>
<?php
require_once "index.php";
$ambil = $koneksi -> query("SELECT * FROM produk WHERE id_produk ='$_GET[id]'");
$pecah = $ambil -> fetch_assoc();
$fotoproduk =$pecah['fotoproduk'];
if (file_exists("../fotoproduk/$fotoproduk")){
unlink("../fotoproduk/$fotoproduk");
}
$koneksi-> query ("DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<script> alert ('produk terhapus')</script>";
echo "<script>location='index.php?halaman=produk' ;</script>";

?>