<?php
//memulakan sesi
session_start();
require_once('dbcon.php');

    //mendapatkan dapa dari borang memasukkan jualan
    $noplat=$_POST['NomPlat'];
    $idpel=$_POST['IDCust'];
    $idpek=$_SESSION['pengguna'];

    //query untuk memasukkan data ke dalam pamngkalan data
        $queryj="INSERT INTO jualan(nomPlat,idPelanggan,idPekerja) 
        VALUES ('$noplat','$idpel','$idpek')";

        $resultj=mysqli_query($con,$queryj);

//output jika berjaya ataupun tidak
{   if($resultj){
        echo "<script>window.alert('Jualan Berjaya Didaftarkan!');</script>";
            {if ($_SESSION['user'] == "pekerja") {
               echo "<script> window.location='./pekerja/home.php'</script>";
                } elseif($_SESSION['user'] == "admin") {
                  echo "<script> window.location='./admin/ahome.php'</script>";
                }
            }
    }
    else{
        mysqli_query($con,"DELETE FROM harga WHERE idHarga='$idh'");
            echo "<script>window.alert('Jualan Gagal Didaftarkan!');</script>";
                {if ($_SESSION['user'] == "pekerja") {
                echo "<script> window.location=./pekerja/masukjual.php'</script>";
                    }elseif($_SESSION['user'] == "admin") {
                    echo "<script> window.location='./admin/amasukjual.php'</script>";
                    }
                }
        }
} 
?>