<?php
include "../koneksi.php";

$id_pembelian= $_GET['id'];
$bayar= $koneksi-> query("SELECT * FROM pembayaran
INNER JOIN pembelian
ON pembelian. id_pembelian = '$id_pembelian'
INNER JOIN pelanggan on pelanggan. id_pelanggan = pembelian. id_pelanggan 

");
$view = $bayar->fetch_assoc();


?>

<div class="row">
    <div class="col-md-12">
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3  text-gray-800">Transaksi</h1>
<p class=""><strong>Alamat Pengiriman :</strong> <?php echo $view['alamat_pengiriman']?></p>
<p class=""><strong>Telepon :</strong> <?php echo $view['telepon_pelanggan']?></p>
<p class=""><strong>Email :</strong> <?php echo $view['email_pelanggan']?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Penerima</th>
            <th>Bank</th>
            <th>Total bayar</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Bukti Struct</th>
          </tr>
        </thead>
        <tbody>
        <td><?php echo $view['nama']?></td>
        <td><?php echo $view['bank']?></td>
        <td><?php echo $view['jumlah']?></td>
        <td><?php echo $view['tanggal']?></td>
        <td><?php echo $view['status_pembelian']?></td>
        <td> <img src="../pembayaran/<?php echo $view['bukti']; ?>" width="100px"></td>
    
    </tbody>

</table>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php
if($view ['status_pembelian']=== 'success') :?>

  <form action="" method="post">
  <label for="confirm">Confirm</label>
 <select name="status" id="confirm" class="form-control">
 <option value="proses kirim">Kirim Product</option>
 <option value="batal">Product Kosong</option>
</select>
<br>
 <button class="btn btn-primary" name="proses"> proses</button>
 </form>
 <br>
  </div>
<?php endif ?>


    <?php

if(isset($_POST['proses'])){
    $status= $_POST['status'];
        $koneksi->query("UPDATE pembelian SET status_pembelian ='$status'
         WHERE id_pembelian='$id_pembelian'");

echo "<script>location='index.php?halaman=pembelian';</script>";
    }
    ?>
</div>
</div>
</div>