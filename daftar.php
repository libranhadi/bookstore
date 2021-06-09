<?php 
require "function.php";
if (isset($_POST["register"])) {
    if(registrasi($_POST)> 0){
        echo "
        <script> alert('sekarang anda terdaftar di toko kami')</script>
        ";
        echo"<script>location='index.php'</script>";
        
    } else {
        
        echo mysqli_error($koneksi);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="admin/css/sb-admin-2.min.css">
</head>
<body>
    <?php include 'menu.php';?>
    <div class="container">
            <div class="row">
               <div class="col-md-12 mt-5 ml-auto">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-tittle">Registrasi</h3>

                        </div>

                        <div class="panel-body">
                            <form method="post" class="form-horizontal">
                                <div class="form-group">
                                     <label for="nama" class="control-label col-md-3">Nama</label>
                                    <div class="col-md-7">
                                     <input type="text" class="form-control" name="username" placeholder="" required>         
                                    </div>
                                                              
                                </div>
                                <div class="form-group">
                                     <label for="email" class="control-label col-md-3">Email</label>
                                    <div class="col-md-7">
                                     <input type="email" class="form-control" name="email" placeholder="" required>         
                                    </div>
                                                              
                                </div>
                                <div class="form-group">
                                     <label for="pass" class="control-label col-md-3">Password</label>
                                    <div class="col-md-7">
                                     <input type="password" class="form-control" name="pass" placeholder="1-6 karakter" required>         
                                    </div>
                                                              
                                </div>
                                <div class="form-group">
                                     <label for="nama" class="control-label col-md-3">No. Phone</label>
                                    <div class="col-md-7">
                                     <input type="number" class="form-control" name="telpon" placeholder="0813xxxxxxx" required>         
                                    </div>
                                                              
                                </div>
                                <div class="form-group">
                                     <label for="alamat" class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-7">
                                     <textarea class="form-control" name="alamat" placeholder="....." required></textarea>         
                                    </div>
                                                              
                                </div>
                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" name="register">daftar</button>
                                    </div>
                                </div>
                             
                                
                            </form>
                           

                        </div>
                    </div>
               </div> 
            </div>
    </div>
    
</body>
</html>