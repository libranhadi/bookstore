<?php
session_start();
$id_produk = $_GET ['id'];


//mendapatkan id dari url produk

//jika produk sudah ada maka ditambah 1
if( isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk] += 1;

} 
// jika belum ada dimulai dari 1
else {
    $_SESSION['keranjang'][$id_produk]=1;

    
}



 echo "<script>location='keranjang.php'</script>";

?>