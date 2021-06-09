<?php
include '../koneksi.php';
$data= array();
$tgl_mulai="-";
$tgl_selesai="-";
if(isset($_POST['lihat'])){
    $tgl_mulai=$_POST['tgl_mulai'];
    $tgl_selesai=$_POST['tgl_selesai'];
    $penjualan = $koneksi->query("SELECT * FROM pembayaran
     WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
    while($hasil= $penjualan->fetch_assoc()){
        $data[]= $hasil;
    }
   
}


?>
<div class="container my-5">
    <h1 class="my-5 mx-5">Laporan Penjualan <?php echo $tgl_mulai?>  <?php echo $tgl_selesai?></h1>
    <form action="" method="post">
        
        <div class="row mt-5">
            <div class="col-md-5">
            <div class="form-group">
                
                <label for="tanggal" > Date</label>
                <input type="date" name="tgl_mulai" value="<?php echo $tgl_mulai?>" class="col-md-8 ml-4">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                
                <label for="">Date</label>
                <input type="date"  name="tgl_selesai" value="<?php echo $tgl_selesai?>" class="col-md-8 ml-4" >
            </div>
        </div>
        <div class="col-md-2">
            <button  name="lihat" class= "btn btn-primary mb-5"> Lihat </button>
        </div>
        
    </div>
</form>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Penjualan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Penerima</th>
            <th>Bank</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
         
          </tr>
        </thead>
        
        <tbody>
        <?php $total=0; ?>
            <?php foreach ($data as $key => $view) : ?>

            <?php $total+=$view['jumlah']?>
        <tr>

            <td><?php echo $key+1; ?></td>
            <td><?php echo $view['nama']?></td>
  <td><?php echo $view['bank']?></td>
  <td><?php echo $view['tanggal']?></td>
  <td><?php echo $view['jumlah']?></td>
  <?php endforeach ?>
</tr>    
    </tbody>
    <tfoot>
    <tr>
    <th>Total Pendapatan</th>
    <td colspan="5" ml-auto>
    Rp. 
    
    <?php echo number_format( $total) ?>
    
    </td>
    </tr>
    </tfoot>

</table>