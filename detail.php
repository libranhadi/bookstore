<?php
session_start();
include "koneksi.php";


?>
<?php 

$id_produk= $_GET["id"];

$ambil= $koneksi-> query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil ->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="stylesheet" type="text/css" href="admin/css/sb-admin-2.min.css">
    
</head>
<body>
<!-- navbar -->
<?php include'menu.php';?>
<!-- akhir navbar -->
    <section class="kontent">
        <div class="container mt-5 ml-auto">
            <div class="row">
                
                <div class="col-md-4">
                        <img src="fotoproduk/<?php echo $detail['foto_produk'] ;?>" class="img-responsive">
                        
                    </div>
                    <div class="col-md-6 mt-5">
                        <h1> <strong> <?php echo $detail['nama_produk']; ?></strong></h1>
                        <br>
                        <h4> Rp.<?php echo number_format($detail['harga_produk']); ?></h4>
                        <hr>
                        <h4><strong>Stock produk</strong>: <?php echo $detail['stock_produk']; ?></h4>
                        <br>
                        
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group col-md-7 mr-5">
                                    <input type="number" min="1" max="<?php echo $detail['stock_produk'];?>"class="form-control" name="jumlah">
                                    <div class="input-group-btn ml-2">
                                        <button class="btn btn-primary" name="beli">Beli</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                        </div>
                        <?php
                        //jika ada tombol beli maka
                        if (isset($_POST['beli'])) {
                            # code...
                            $jumlah= $_POST['jumlah'];
                            $_SESSION['keranjang'][$id_produk]=$jumlah;
                            echo "<script>alert('Produk Masuk Keranjang')</script>";
                            echo "<script>location='keranjang.php'</script>";
                        }
                        ?>
                        </div>
                        <br>
                        <h1><strong>Details</strong></h1>
                        <hr>
                        <div class="row">
                            
                        <div class="col-md-4">

                            <h4><?php echo $detail['deskripsi_produk']; ?></h4>
                        </div>
                </div>
                </div>
                
            </section>
        </body>
</html>