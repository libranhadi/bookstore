<h2>Mengubah data</h2>
<?php 
require_once "index.php";
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk= '$_GET[id]'");
$pecah= $ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
    <label> Nama </label>
    <input type="text" class="form-control" name="nama_pro" value="<?php echo $pecah['nama_produk'];?>">
    </div>
    <div class="form-group">
    <label> Harga (Rp.) </label>
    <input type="number" class="form-control" name="harga"value="<?php echo $pecah['harga_produk'];?>">
    </div>
    <div class="form-group">
    <label> Berat (Gr) </label>
    <input type="number" class="form-control" name="berat"value="<?php echo $pecah['berat_produk'];?>">
    </div>
    <div class="form-group">
    <label> Stock </label>
    <input type="number" class="form-control" name="stock"value="<?php echo $pecah['stock_produk'];?>">
    </div>
    <div class="form-group">
    <img src="../fotoproduk/<?php echo $pecah['foto_produk']?>" width="100px">
    </div>
    <div class="form-group">

    <label>Ganti Foto</label>
    <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
    <label> Deskripsi </label>
    <textarea class="form-control" name="deskripsi" rows="10" ><?php echo $pecah['deskripsi_produk'];?></textarea>
    </div>
    <button class="btn btn-primary" name="ubah"> Ubah</button>

</form>

<?php
if (isset($_POST['ubah'])){
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto =$_FILES['foto']['tmp_name'];
    //foto diubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto,"../fotoproduk/$namafoto");
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_pro]',
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', stock_produk='$_POST[stock]',foto_produk='$namafoto',
        deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
    }
    else {
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama_pro]',
        harga_produk='$_POST[harga]', berat_produk='$_POST[berat]', stock_produk='$_POST[stock],
        deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script> alert ('data produk telah diubah ');</script>";
    echo "<script> location='index.php?halaman=produk';</script>";
}
?>