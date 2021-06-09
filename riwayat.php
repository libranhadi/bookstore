<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
    # code...
    echo "<script>alert('silahkan login dahulu')</script>";
    echo "<script>location='login.php'</script>";
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat</title>
    <link href="Admin/css/sb-admin-2.min.css" rel="stylesheet">
    
</head>
<body>
    <?php include "menu.php"; ?>
    
<section class="riwayat">
    <div class="container mt-5 ml-auto">
        <h3>Riwayat belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan']?></h3>
            <table class="table table-bordered">
            
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL</th>
                        <th>STATUS</th>
                        <th>TOTAL</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                <?php $nomor=1;?>
                <?php 
                    //dapatkan id
                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                    $ambil=$koneksi->query("SELECT *FROM pembelian WHERE id_pelanggan='$id_pelanggan' ");
                    while ($pecah= $ambil->fetch_assoc()) {
                        # code...
                    
                      
                ?>
                    <tr>
                        <td><?php echo $nomor ?></td>
                        <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                        <td><?php echo $pecah['status_pembelian']; ?></td>
                        <td>Rp.<?php echo number_format($pecah['total_pembelian']); ?></td>
                        <td>
                            <?php if ($pecah['status_pembelian'] !== 'pending'): ?>
                        <a href="lihatbayar.php?id=<?php echo $pecah['id_pembelian'];?>" class="border-bottom-success">Lihat pembayaran</a>
                    <?php else :?>
                        <a href="nota.php?id=<?php echo $pecah['id_pembelian'];?>" class="border-bottom-warning">Nota</a>
                        <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian'];?>" class="border-bottom-info">Pembayaran</a>
                    <?php endif?>    
                    </td>
                    </tr>
                    <?php $nomor++?>
                    <?php }?>
                </tbody>
            
            </table>
    
    </div>


</section>
</body>
</html>