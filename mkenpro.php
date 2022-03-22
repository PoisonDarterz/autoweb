<?php
session_start();
require_once('dbcon.php');

$nomplat=$_POST['NomPlat'];
$model=$_POST['model'];
$tahun=$_POST['thn'];
$status=$_POST['stat'];
$hargaasal=$_POST['hasal'];
$cukaij=$_POST['cj'];

$insuran=($hargaasal+$cukaij)*0.05;
$harga=$hargaasal+$cukaij+$insuran;

$queryj="INSERT INTO harga(hargaAsal,cukaiJalan,insurans,harga) 
VALUES ('$hargaasal','$cukaij','$insuran','$harga')";

$resultj=mysqli_query($con,$queryj);

$get="SELECT idHarga FROM harga WHERE
hargaAsal='$hargaasal' AND cukaiJalan='$cukaij'";

$resultget=mysqli_query($con,$get);
$row= mysqli_fetch_assoc($resultget);
$idh= implode("",$row);

$queryk="INSERT INTO kenderaan(nomPlat,model,tahunDibuat,idHarga,status) 
VALUES ('$nomplat','$model','$tahun','$idh','$status')";

$resultk=mysqli_query($con,$queryk);

{if($resultj && $resultk){
    echo "<script>window.alert('Kenderaan Berjaya Didaftarkan!');</script>";
    {if ($_SESSION['user'] == "pekerja") {
        echo "<script> window.location='./pekerja/masukken.php'";
    } elseif($_SESSION['user'] == "admin") {
        echo "<script> window.location='./admin/amasukken.php'";
    }
    }
}
else{
    mysqli_query($con,"DELETE FROM harga WHERE idHarga='$idh'");
    echo "<script>window.alert('Kenderaan Gagal Didaftarkan!');</script>";
    {if ($_SESSION['user'] == "pekerja") {
        echo "<script> window.location='./pekerja/masukken.php'</script>";
    } elseif($_SESSION['user'] == "admin") {
        echo "<script> window.location='./admin/amasukken.php'</script>";
    }
    }
}} 
?>