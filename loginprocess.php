<?php
session_start();
require_once('dbcon.php');
$user=$_POST['User'];
$katalaluan=$_POST['Pass'];

$query="SELECT idPekerja,namaPengguna,kataLaluan,statusPengguna FROM pengguna WHERE
namaPengguna='$user' AND kataLaluan='$katalaluan'";

$result=mysqli_query($con,$query);

if(mysqli_num_rows($result) !=0){
    $status=mysqli_fetch_assoc($result);
    
   if ($status['statusPengguna']=='admin'){
       $_SESSION['user'] = $status['statusPengguna'];
       $_SESSION['pengguna']=$status['idPekerja'];
       echo "<script>window.alert('Berjaya Log Masuk!');
       </script>";
       echo "<script> window.location='./admin/ahome.php'</script>";
   } 
   elseif ($status['statusPengguna']=='pekerja') {
       $_SESSION['user'] = $status['statusPengguna'];
       $_SESSION['pengguna']=$status['idPekerja'];
       echo "<script>window.alert('Berjaya Log Masuk!');
       </script>";  
       echo "<script> window.location='./pekerja/home.php'</script>";
   }
}

else{
   echo "<script>window.alert('Gagal Log Masuk!');
   window.location='index.php';</script>";
}

?>