<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
    # code...
    echo "<script>alert('silahkan login dahulu')</script>";
    echo "<script>location='login.php'</script>";
    exit();
}
//mengambil id untuk di tampilkan
    $idpembelian= $_GET["id"];
    $pembelian= $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian ='$idpembelian'");
    $hasil= $pembelian->fetch_assoc();


    $conpelanggan=$hasil['id_pelanggan'];
    $conpelangganlogin=$_SESSION['pelanggan']['id_pelanggan'];

    if($conpelangganlogin !== $conpelanggan){
        echo "<script>alert('Jujur lain waktu')</script>";
        echo "<script>location='riwayat.php'</script>";
        exit();
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="admin/css/sb-admin-2.min.css">
</head>
<body>
    <?php include "menu.php";?>

<div class="container-fluid mt-5 ml-auto">
    <div class="row">
    <div class="col-md-6 ml-auto">
              <strong >Confirm Order</strong> 
              <div class="panel-body">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                     <label for="nama" class="control-label col-md-3">Nama Penerima</label>
                                    <div class="col-md-10">
                                     <input type="text" class="form-control" name="nama" placeholder="" required>         
                                    </div>                          
                                </div>
                                <div class="panel-body">
                     
                                <div class="form-group">
                                     <label for="" class="control-label col-md-3">Bank</label>
                                    <div class="col-md-10">
                                     <input type="text" class="form-control" name="bank" placeholder="" required>         
                                    </div>
                                                              
                                </div>
                                <div class="panel-body">
                         
                                <div class="form-group">
                                     <label for="nama" class="control-label col-md-3">Sub Price</label>
                                    <div class="col-md-10">
                                     <input type="text" class="form-control"
                                     name="jumlah" placeholder="" value="<?php echo $hasil['total_pembelian']?>"readonly>         
                                    </div>
                                </div>
                                <div class="form-group">
                                     <label for="nama" class="control-label col-md-3">Bukti</label>
                                    <div class="col-md-10">
                                     <input type="file" class="form-control" name="bukti" placeholder="" required>         
                                    </div>
                                </div>
                                  
                        <button class="btn btn-primary" name="confirm">  Confirm</button>
                    </form>
                </div>
            </div>
        </div>
        
</div>
<?php 

if (isset($_POST['confirm'])) {
    # code...
    $nama= $_FILES['bukti']['name'];
    $lokasi= $_FILES['bukti']['tmp_name'];
    $namafoto = date('YmdHis').$nama;
    move_uploaded_file($lokasi, "pembayaran/$namafoto");

    $name = $_POST['nama'];
    $bank = $_POST['bank'];
    $total = $_POST['jumlah'];
    $date = date("Y-m-d");

    if ($hasil['total_pembelian'] !==$total) {
        # code...
        echo "<script>alert('bayar dengan sesuai tagihan')</script>";
        echo "<script>location='pembayaran.php'</script>";

    } else {
        
        
        $koneksi->query("INSERT INTO pembayaran (id_pembelian , nama, bank, jumlah, tanggal, bukti) 
    values  ('$idpembelian', '$name' , '$bank' ,'$total' ,'$date', '$namafoto')");

//update status
    $koneksi->query("UPDATE pembelian SET status_pembelian='success'
    WHERE id_pembelian='$idpembelian'
    ");

     echo "<script>location='riwayat.php'</script>";
}
}

?>


        <div class="col-md-6">
        <strong class="ml-3">Order</strong> 
        <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>City</th>
                      
                      <th>Sub Price</th>
                      <th>Date</th>
              
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $hasil['nama_kota']; ?></td>
                      <td><?php echo number_format($hasil['total_pembelian']); ?></td>
                      <td> <?php echo $hasil['tanggal_pembelian'];?></td>
          
                      
                    
                    </tr>
                </tbody>
</table>
        </div>
        </div>
</div>             
        </div>   
        </div>
</div>
</body>
</html>