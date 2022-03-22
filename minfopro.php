<?php
session_start();
require_once('dbcon.php');

$namapel=$_POST['NamaPel'];
$tel=$_POST['tele'];
$jln=$_POST['alamat'];
$bdr=$_POST['bdr'];
$pkod=$_POST['poskod'];
$negeri=$_POST['ngr'];

$queryj="INSERT INTO alamat(alamat,bandar,poskod,negeri) 
VALUES ('$jln','$bdr','$pkod','$negeri')";

$resultj=mysqli_query($con,$queryj);

$get="SELECT idAlamat FROM alamat WHERE
alamat='$jln' AND poskod='$pkod'";

$resultget=mysqli_query($con,$get);
$row= mysqli_fetch_assoc($resultget);
$ida= implode("",$row);

$queryk="INSERT INTO pelanggan(namaPelanggan,nomHP,idAlamat) 
VALUES ('$namapel','$tel','$ida')";

$resultk=mysqli_query($con,$queryk);

{if($resultj && $resultk){
    echo "<script>window.alert('Pelanggan Berjaya Didaftarkan!');</script>";
    {if ($_SESSION['user'] == "pekerja") {
        echo "<script> window.location='./pekerja/home.php'</script>";
    } elseif($_SESSION['user'] == "admin") {
        echo "<script> window.location='./admin/ahome.php'</script>";
    }
    }
}
else{
    mysqli_query($con,"DELETE FROM alamat WHERE idAlamat='$ida'");
    echo "<script>window.alert('Pelanggan Gagal Didaftarkan!');</script>";
    {if ($_SESSION['user'] == "pekerja") {
        echo "<script> window.location='./pekerja/masukinfo.php'</script>";
    } elseif($_SESSION['user'] == "admin") {
        echo "<script> window.location='./admin/amasukinfo.php'</script>";
    }
    }
}} 
?>