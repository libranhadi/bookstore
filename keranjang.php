<?php
session_start ();
include 'koneksi.php';


 
 //jika keranjang kosong dibalikan ke index
 if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']))
  {
    echo "<script>alert ('keranjang kosong')</script>";
    echo "<script>location ='index.php'</script>";
 }

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>keranjang</title>
    <link href="Admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <!-- navbar -->
   <!-- navbar -->
   <?php include "menu.php";?>
   
   <table class="table table-striped col-md-10 ml-5 my-5 mt-5">
     
     <div class="container ">
       <h1 class="mt-5 ml-5"> Chart</h1>
         <div class=" row justify-content-center">
         
         <thead>
           <tr>
             <th scope="col">No</th>
             <th scope="col">Name</th>
             <th scope="col">Price</th>
             <th scope="col">Qty</th>
             <th scope="col">Sub price</th>
             <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
          
          <?php $nomor=1; ?>
                    <?php foreach( $_SESSION ['keranjang'] as $id_produk => $jumlah) :?>
                    <?php $ambil= $koneksi->query ("SELECT * FROM produk WHERE id_produk='$id_produk'"); // menampilkan isi produk
                    $pecah =$ambil ->fetch_assoc();
                    
                    $subharga = $pecah['harga_produk']*$jumlah;
                     
                     
                    ?>
                        
                        <tr>
                            <td><?php echo $nomor ?></p></td>
                            <td><?php echo $pecah ['nama_produk'];?></td>
                            <td><?php echo number_format($pecah['harga_produk']);?></td>
                            <td><?php echo $jumlah?></td>
                            <td><?php echo number_format($subharga);?></td>
                            
                            <td><a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a></td>
                        </tr>
                        <?php $nomor++ ?>
                        <?php endforeach ?>
  </tbody>

</div>

</table>
</div>
</body>
</html>

