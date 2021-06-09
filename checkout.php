<?php
session_start();
$koneksi = new mysqli("localhost", "root","", "buku");


if (!isset ($_SESSION["pelanggan"])) {
    echo "<script>alert('anda harus login')</script>";
        echo "<script>location = 'login.php'</script>";
}
if (!isset ($_SESSION["keranjang"])) {
    echo "<script>alert('anda belum memilih barang')</script>";
        echo "<script>location = 'index.php'</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
    
    <title>chechkout</title>
    <link href="Admin/css/sb-admin-2.min.css" rel="stylesheet">
    
</head>
<body>
<!-- navbar -->
<?php include "menu.php" ;?>
  
        <div class="container">
            <h1 class="mt-5"> Checkout</h1>
            <hr>
            <div class="row">
                    <div class="col-md-8">

                <table class=" table table - bordered">
                    <thead> <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        
                      
                    </tr>
                    
                    </thead>
                    
                    <tbody>
                    
                   
                    <?php $nomor=1; ?>
                    <?php $totalbelanja=0?>
                    <?php foreach( $_SESSION ['keranjang'] as $id_produk => $jumlah) :?>
                    <?php $ambil= $koneksi->query ("SELECT * FROM produk WHERE id_produk='$id_produk'"); // menampilkan isi produk
                    $pecah =$ambil ->fetch_assoc();
                    $subharga = $pecah['harga_produk'] * $jumlah;
                     
                     
                    ?>
                        
                        <tr>
                            <td><?php echo $nomor ?></p></td>
                            <td><?php echo $pecah ['nama_produk'];?></td>
                            <td><?php echo number_format($pecah['harga_produk']);?></td>
                            <td><?php echo $jumlah?></td>
                            
                            <td><?php echo number_format($subharga);?></td>
                          
                            
                        </tr>
                        <?php $nomor++ ?>
                        <?php $totalbelanja += $subharga?>
                        
                        <?php endforeach ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total belanja</th>
                            <td> Rp. <?php echo number_format($totalbelanja);?></td>
                        </tr>
                    </tfoot>
                    
                </table>
            </div>
            
            
                    
            
            <div class="col-md-2">
                
                <form method="post">
                    <div class="form-group">
                        
                        </div>
                        
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']?>" class="form-control">
                    </div>
                    
                    <div class="col-md-2 mt-3">
                        
                        <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']?>" class="form-control">
                    </div>
                    
                                        
                    <div class="col-md-4">
                        
                    <select name="id_ongkir" class="form-control">
                        
                        <option value="">Pilih ongkir</option>
                        <?php $ambil = $koneksi->query( "SELECT * FROM ongkir");
                    while ($perongkir=$ambil-> fetch_assoc()){
                        ?>
                    <option value="<?php echo $perongkir['id_ongkir'] ?>">
                        <?php echo $perongkir ['nama_kota']?>
                        Rp. <?php echo number_format($perongkir ['tarif'])?>
                    </option>
                    
                    <?php } ?>
                </select>
                    </div>
            
        </div>
      
            <div class="form-group">
                <label for="">Alamat Lengkap Pengiriman</label>
            <textarea 
            class="form-control"name="alamat_pengiriman" placeholder="Masukan alamat lengkap anda "></textarea>
                        
        </div>
                    <button class="btn btn-primary" name="checkout"> checkout</button>
                
                </form>
                <?php 
                if (isset ($_POST['checkout'])){
                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                    $id_ongkir = $_POST['id_ongkir'];
                    $tanggalpembelian=date('Y-m-d');
                    $alamatpengirim= $_POST['alamat_pengiriman'];
                    
                    $ambil= $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir  ='$id_ongkir'");
                    $arrayongkir= $ambil->fetch_assoc();
                    $nama_kota=$arrayongkir['nama_kota'];
                    $tarif=$arrayongkir['tarif'];
                    
                    $totalpembelian= $totalbelanja +$tarif;
                    
                    $koneksi->query ("INSERT INTO pembelian 
                    (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman ) 
                    VALUES 
                    (
                    '$id_pelanggan', 
                    '$id_ongkir', 
                    '$tanggalpembelian', 
                    '$totalpembelian','$nama_kota','$tarif','$alamatpengirim' )
                    ");
                        
                        //mendapatkan id pembelian yang baru terjadi terakhir
                        $id_pembelian_baru = $koneksi->insert_id;
                        
                        foreach ($_SESSION['keranjang'] as $id_produk=> $jumlah){
                            $ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                            $perproduk= $ambil->fetch_assoc();
                            
                            $nama = $perproduk['nama_produk'];
                            $harga = $perproduk ['harga_produk'];
                            $berat= $perproduk['berat_produk'];

                            $subberat=$perproduk['berat_produk'] * $jumlah;
                            $subharga= $perproduk['harga_produk'] * $jumlah;
                            
                            $koneksi->query("INSERT INTO pembelian_produk 
                       (id_pembelian,id_produk, nama_produk,harga_produk,berat_produk,sub_berat,sub_harga,jumlah ) 
                       VALUES ('$id_pembelian_baru','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')
                       "); 

                            $koneksi->query("UPDATE produk SET stock_produk=stock_produk -$jumlah WHERE id_produk='$id_produk' ");

                    }
                    unset ($_SESSION['keranjang']);
                    
                    echo "<script>alert('pembelian sukses');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
                }
                
                ?>
                
            </div>  
        </div>
        
            
        </body>
        </html>