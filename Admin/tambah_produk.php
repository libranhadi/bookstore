<?php 
require_once "index.php";

?>
<h2> Tambah Produk</h2>
<form action ="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label> Nama </label>
    <input type="text" class="form-control" name="nama" id="nama_produk" >
    </div>

    <div class="form-group">
    <label> Harga (Rp.) </label>
    <input type="number" class="form-control" name="harga" id="harga_produk">
    </div>

    <div class="form-group">
    <label> Berat (Gr) </label>
    <input type="number" class="form-control" name="berat" id="berat_produk">
    </div>
    
    <div class="form-group">
    <label> Stock </label>
    <input type="number" class="form-control" name="stock" id="stock_produk">
    </div>
   
   
    <div class="form-group">
    <label> Deskripsi </label>
    <textarea class="form-control" name="deskripsi" rows="10" id="deskripsi_produk"></textarea>
    </div>


    <div class="form-group">
    <label> Foto</label>
    <input type="file" class="form-control" name="foto" id="foto_produk">
    </div>
    
    
    
    
    <button class="btn btn-primary" name="save">  Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
  
$nama = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, '../fotoproduk/'.$nama);

$koneksi ->query (" INSERT INTO produk 
(nama_produk, harga_produk, berat_produk, stock_produk, foto_produk, deskripsi_produk)
VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[stock]' ,'$nama','$_POST[deskripsi]') ");

//cek keberhasilan
if(mysqli_affected_rows($koneksi)>0){
   echo "berhasil";
} else {
   echo "gagal";
   echo mysqli_error($koneksi);
}
    
 echo "<div class=' alert alert-info '> Data Tersimpan</div>";
 echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

}

?>


