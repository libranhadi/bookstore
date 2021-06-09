<?php
session_start();
//koneksi dataabase
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>pengunjung</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="Admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>

<!-- navbar -->
<?php include "menu.php";?>
    <!-- konten --> 
    <section class="konten">
        <div class="container">
            <h1>Produk</h1>
            <div class="row">
            <?php  $ambil= $koneksi->query ("SELECT * FROM produk"); ?>
            <?php global $koneksi;?>

            <?php foreach( $ambil as $perproduk) :?>

            
                     <div class="col-md-3">  
                        <div class="thumbnail">
                        <img src="fotoproduk/<?php echo $perproduk['foto_produk']; ?>">
                        <div class="caption">
                                <h6><?php echo $perproduk['nama_produk'];?></h6>
                                <h6><?php echo number_format( $perproduk['harga_produk']);?></h6>
                                <a href="beli.php ?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary"> Beli</a>
                                <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-default">Detail </a>
                            </div>
                        </div>
                     </div>               
                     <?php endforeach ?>
            </div>
          
        </div>
    </section>
</body>
</html>