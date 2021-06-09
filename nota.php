<?php 
session_start();
$koneksi = new mysqli("localhost", "root","", "buku");

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>nota</title>
    <link rel="stylesheet" type="text/css" href="Admin/css/sb-admin-2.min.css">
    
</head>
<body>
    <!-- navbar -->
 <?php include "menu.php"; ?>
    <section class="konten">
        <div class="container">
       
<?php



$ambil = $koneksi-> query("SELECT * FROM pembelian JOIN pelanggan 
ON pembelian.id_pelanggan = pelanggan.id_pelanggan
WHERE pembelian.id_pembelian = '$_GET[id]'"); 
 
 $detail = $ambil-> fetch_assoc();?>
 


<?php

$idpelangganbeli= $detail ['id_pelanggan'];
$idpelangganlogin =$_SESSION['pelanggan']['id_pelanggan'];

if ($idpelangganbeli!==$idpelangganlogin) {
    # code...
    echo "<script>alert('jujur')</script>";
    echo "<script> location='riwayat.php'</script>";
}


?>

<div class="row mt-5">

<div class="col-md-4"> <h2>Pembelian</h2>
           
            Tanggal pembelian :  <?php echo $detail ['tanggal_pembelian']; ?> <br>
          
            Total Pembelian : Rp.  <?php echo number_format ($detail ['total_pembelian']); ?>
          
            </div>

<div class="col-md-4"> <h2>Nama Pelanggan</h2>
<strong><?php echo $detail ['nama_pelanggan'];?></strong> <br>
<p>
 <?php echo $detail ['telepon_pelanggan'];?> <br>
 <?php echo $detail ['email_pelanggan']; ?>
</p>
</div>
            <div class="col-md-4"> <h2>Pengiriman</h2>
            <strong><?php echo $detail ['nama_kota'];?></strong> <br>
    
            Alamat: <?php echo $detail ['alamat_pengiriman']; ?>
            </div>

</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah</th>
            <th>Sub Harga Produk</th>
            <th>Ongkir</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil = $koneksi -> query ("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'");?> 
        <?php while($pecah=$ambil -> fetch_assoc()){ ?>
        
        <tr>
        <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo number_format($pecah['harga_produk']); ?></td>
            <td><?php echo number_format ($pecah['jumlah']); ?></td>
            <td><?php echo number_format($pecah['sub_harga']); ?></td>
            <td> <?php echo number_format ($detail ['tarif']); ?> </td>
            <td><?php echo $detail['status_pembelian'];?></td>
        </tr>
        <?php $nomor++ ?>
        <?php } ?>
    </tbody>
    
</table>
<div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                     total bayar Rp.<?php echo number_format($detail ['total_pembelian']); ?> <hr>
                    <strong> NerdLara Store</strong>
                    </p>
                </div>
            </div>

        
        </div>
            <div class="col-md-3">
            <a href="riwayat.php" class="btn btn-info">Bayar Nanti</a>
            <a href="pembayaran.php?id=<?php echo $detail['id_pembelian']?>" class="btn btn-success">Bayar Sekarang</a>
            </div>
    
    </section>
</body>
</html>