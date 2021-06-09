<?php
$koneksi= mysqli_connect("localhost","root","","buku");
if(!$koneksi)
{
    die ("connection failed :" .mysqli_connect_error());
}
function query ($sql){
    global $koneksi;
$ambil = mysqli_query ($koneksi, $sql);
$pecahan =[];
while ( $perproduk = mysqli_fetch_assoc($ambil)){
$pecahan[] = $perproduk;

}
return $koneksi;
}


function registrasi($pecah){
    global $koneksi;
    $name = strtolower(stripslashes( $pecah ["username"]));
    $email = $pecah["email"];
    $password = mysqli_real_escape_string($koneksi,$pecah["pass"]);
    $tlpn = $pecah["telpon"];
    $alamat = $pecah["alamat"];
   
//mengamankan password
  


  //tambahkan ke database
    $ambil= mysqli_query($koneksi,"INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, password_pelanggan, telepon_pelanggan, alamat)
    VALUES ('$name','$email','$password','$tlpn','$alamat')
    ");


return mysqli_affected_rows($koneksi);
}



?>

       




