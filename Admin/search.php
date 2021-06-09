<?php

include '../koneksi.php';
require_once 'index.php';

$search = $_GET['search'];
$data=array();
$view= $koneksi->query("SELECT * FROM pembelian INNER JOIN pelanggan ON pelanggan. id_pelanggan = pembelian. id_pelanggan  WHERE nama_pelanggan LIKE '%$search%'

");

while($tampil= $view->fetch_assoc()){
$data[]=$tampil;
}

?>

<div class="container mt-5 ml-auto">
  <h1 class="ml-auto">Pencarian :
   <br>
   <?php echo $search ?></h1>


   <?php if (empty($data)) : ?>
       
       <div class="alert alert-danger"> <?php echo $search ?>   tidak ada</div>
   <?php endif?>

   <table class="table table-bordered">
    <thead>
        <tr>
           
            <th>nama </th>
            <th>email</th>
          
            <th>telpon</th>
            <th>Nama_kota</th>
        <th>Total Pembelian</th>
            <th>status pembelian</th>

            
        </tr>
    </thead>
    <tbody>
    
   
    <?php foreach ($data as $pecah): ?>
        <tr>
 
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
         
            <td><?php echo $pecah['telepon_pelanggan']; ?></td>
            <td><?php echo $pecah['alamat']; ?></td>
            <td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
            <td><?php echo $pecah['status_pembelian']; ?></td>
            
        </tr>
  
    <?php endforeach ?>
        
    </tbody>
</table>
  </div>