<?php
require_once "index.php";
$ambil = $koneksi->query ("SELECT * FROM produk");
?>
<h2>Data Produk</h2>
<table class = "table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Stock</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php global $koneksi;?>
   
    <?php foreach( $ambil as $pecah) :?>

    
        <tr>
        <td><?php echo $nomor ?> </td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['berat_produk']; ?></td>
            <td><?php echo $pecah['stock_produk']; ?></td>
            <td>
                <img src="../fotoproduk/<?php echo $pecah['foto_produk']; ?>" width="100px">
            </td>
           
            <td>
            <a href="index.php?halaman=ubah&id=<?php echo $pecah['id_produk']; ?>" 
            class="btn btn-warning btn-circle ">EDIT</a>
            <a href="index.php?halaman=hapus&id=<?php echo $pecah['id_produk']; ?>" 
            class="btn btn-danger btn-circle  "> <i class="fas fa-trash"></i></a>
            
            </td>
        </tr>

        <?php $nomor++ ?>
<?php endforeach ?>
    </tbody>
</table>
