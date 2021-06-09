<?php

$koneksi = mysqli_connect("localhost", "root","191919", "blog");
if(!$koneksi)
{
    die ("connection failed :" .mysqli_connect_error());
}
?>