<?php

include 'koneksi.php';

$search = $_GET['search'];
$data=array();
$view= $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$search%'
OR deskripsi_produk LIKE '%$search%' 
");
while($tampil= $view->fetch_assoc()){
$data[]=$tampil;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="Admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<?php include 'menu.php'; ?>
  <div class="container mt-5 ml-auto">
  <h1 class="ml-auto">Pencarian :
   <br>
   <?php echo $search ?></h1>

   <?php if (empty($data)) : ?>
       
       <div class="alert alert-danger"> <?php echo $search ?>   tidak ada</div>
   <?php endif?>
  <div class="row mt-5 ml-auto">
  <?php foreach ($data as $key => $value): ?>
  <div class="col-md-3">
  <div class="thumbnail">
  <img src="fotoproduk/<?php echo $value['foto_produk']; ?>">
                        <div class="caption">
                      <strong>
                      <h6><?php echo $value['nama_produk'];?></h6>
                      </strong>  
                                <h6>Rp.<?php echo number_format( $value['harga_produk']);?></h6>
                                <a href="beli.php ?id=<?php echo $value['id_produk'];?>" class="btn btn-primary"> Beli</a>
                                <a href="detail.php?id=<?php echo $value['id_produk'];?>" class="btn btn-default">Detail </a>
                                </div>
  </div>
  </div>
  <?php endforeach ?>
  </div>
</body>
</html>