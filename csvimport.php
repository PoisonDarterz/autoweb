<?php
require_once("dbcon.php");
session_start();
$namaFail = $_FILES["csv"]["name"];
$jenisFail = strtolower(pathinfo($namaFail,PATHINFO_EXTENSION));
$berjaya=true;

if($jenisFail!="csv"){
    echo"<script>window.alert('Maaf. Fail yang dimuat naik bukan format CSV.');
    window.history.go(-1);</script>";
    $berjaya=false;
}

if ($_FILES['csv']['size']>0 && fopen($namaFail,'r') && $berjaya==true){
    $fail = fopen($namaFail, 'r');

        while (($data=fgetcsv($fail,'0'))!==FALSE){
        $num=count($data);
    
        $query1 = "INSERT INTO pengguna(namaPengguna, kataLaluan, statusPengguna)
        VALUES('".$data[0]."','".$data[1]."','".$data[2]."')";
        mysqli_query($con,$query1);
        }

    fclose($fail);

    echo"<script>window.alert('Rekod berjaya ditambahkan!');</script>";
        if($_SESSION['user'] == "admin") {
            echo "<script> window.location='./admin/ahome.php'</script>";
        }
    }

    else{
    echo "<script>
    window.alert('Operasi import gagal.Sila cuba sekali lagi!');
    </script>";
        if($_SESSION['user'] == "admin") {
            echo "<script> window.location='./admin/aimport.php'</script>";
        }
    }
?>