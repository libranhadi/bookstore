<?php

require_once 'index.php';
$produk = $koneksi-> query ("SELECT * FROM pembelian JOIN pelanggan ON pembelian. id_pelanggan = pelanggan.id_pelanggan");
?>
<h2>Data Pembelian</h2>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Status</th>
        <th>aksi</th>
 
    </tr>    
    </thead>
    <tbody>
    <?php $nomor=1; ?>
  
    <?php foreach ( $produk as $pecah ) :?>
 
        <tr>
        <td><?php echo $nomor  ?> </td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['tanggal_pembelian']; ?></td>
            <td><?php echo $pecah['total_pembelian']; ?></td>
            <td><?php echo $pecah['status_pembelian']; ?></td>
            
            <td>
                <?php if($pecah['status_pembelian']!== 'pending'):?>
                    <a href="index.php?halaman=pembayaran& id=<?php echo $pecah['id_pembelian'];?>" 
                        class="btn btn-success">
                        <?php if($pecah['status_pembelian']== 'success'):?>
                        Transaksi
                        <?php else :?>
                        Lihat Transaksi 
                        <?php endif?>
                        </a>
                    <?php else:?>
                            <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>" 
                            class="btn btn-info"> detail</a>
           <?php endif?>
            </td>
        </tr>
        <?php $nomor++ ?>
<?php endforeach ?>
    </tbody>
</table>