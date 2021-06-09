<?php

require_once 'index.php';
$data = $koneksi-> query ("SELECT * FROM pelanggan");

?>
<h2>Data Pelanggan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama </th>
            <th>email</th>
         
            <th>telpon</th>
            <th>alamat</th>
            
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
   
    <?php foreach ( $data as $pecah) : ?>
        <tr>
        <td><?php echo $nomor ?> </td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
            
            <td><?php echo $pecah['telepon_pelanggan']; ?></td>
            <td><?php echo $pecah['alamat']; ?></td>
            
        </tr>
        <?php $nomor++ ?>
    <?php endforeach ?>
        
    </tbody>
</table>