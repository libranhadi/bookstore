<?php
session_start();
include 'koneksi.php';

$id_pembelian=$_GET['id'];

$view = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian 
WHERE pembelian.id_pembelian = '$id_pembelian'
");


$data = $view->fetch_assoc();

if(empty($data)){
    echo "<script> location='riwayat.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" type="text/css" href="Admin/css/sb-admin-2.min.css">
</head>
<body>
    <?php include "menu.php";?>

    <div class="container mt-5 ml-auto mb-5">
        <div class="row">
            
            <div class="col-md-6 justify-content-center">
                <strong><h1 class="ml-auto">Detail Pengiriman</h1></strong>
                <p> <strong>Tanggal Checkout : <?php echo $data['tanggal_pembelian']?></strong></p>
                <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable">
               <tr>

                   <th>Nama Penerima</th>
                   <td><?php echo $data['nama']; ?></td>
                </tr>
                   <tr>

                       <th>Nama Kota</th>
                       <td><?php echo $data['nama_kota']; ?></td>
                    </tr>
                    <tr>

                        <th>Status</th>
                        <td><?php echo $data['status_pembelian']; ?></td>
                    </tr>
                    <tr>

                    
                            <th>Alamat</th>
                            
                            
                            <td><?php echo $data['alamat_pengiriman']; ?></td>
                            
                        </tr>
                        </table>
                </div>
            </div>
            </div>
            <div class="col-md-6 justify-content-center">
                <strong><h1 class="ml-auto">Detail Pembayaran</h1></strong>
                <p> <strong>Tanggal Pembayaran : <?php echo $data['tanggal']?></strong></p>
                <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable">
               <tr>

                   <th>Nama Bank</th>
                   <td><?php echo $data['bank']; ?></td>
                </tr>
                   <tr>

                       <th> Tarif Ongkir </th>
                       <td><?php echo $data['tarif']; ?></td>
                    </tr>
                    <tr>

                        <th>Total Pembayaran</th>
                        <td collspan="4"><?php echo $data['total_pembelian']; ?></td>
                    </tr>
              
                        </table>
                </div>
            </div>
            </div>
           
            <!-- /row -->
        </div>
    </div>


</body>
</html>