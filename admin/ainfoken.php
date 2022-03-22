<?php
session_start();
require_once("../dbcon.php");
if ($_SESSION['user'] == "admin") {

} else {
    echo "<script>
    window.alert('Anda tidak log masuk! Sila log masuk dahulu.') ;
    window.location='../index.php';
    </script>";
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Senarai Jualan Kereta</title>
    <link rel="icon" href="../assets/favicon.jpg" type="image/jpg" sizes="16x16">
 <link rel="stylesheet" href="../bootstrap.css">    <link rel="stylesheet" href="../general.css" type="text/css">
    <link rel="stylesheet" href="../senarai.css" type="text/css">
</head>

<body>

<header>  <h2>AutoWeb    <script>
    var fontSize = 1;
    function zoomIn() {
	fontSize += 0.4;
	document.body.style.fontSize = fontSize + "em";	
    }
    function zoomOut() {
	fontSize -= 0.4;
	document.body.style.fontSize = fontSize + "em";
    }
</script>
<!-- menyediakan butang besar kecil saiz font -->
        <center>
        <input type="button" value="Besar Teks" onClick="zoomIn()" style="position:RELATIVE;bottom:30px;float: right;font-size:20px;"/>
        <input type="button" value="Kecil Teks" onClick="zoomOut()" style="position:RELATIVE;bottom:30px;float: right;font-size:20px;"/>
        </center></h2>  </header>

<div class="container">
    <div class="selection">
    <ul>
            <li><a href="./ahome.php">Laman utama</a></li>
            <li>Kenderaan:</li>
            <ul>
            <li><a href="./amasukken.php">Masukkan info kenderaan</a></li>
            <li><a href="./ainfoken.php">Info kenderaan</a></li>
            </ul>
            <li>Pelanggan:</li>
            <ul>
            <li><a href="./amasukinfo.php">Masukkan info pelanggan</a></li>
            <li><a href="./ainfo.php">Info pelanggan</a></li>
            </ul>
            <li>Jualan:</li>
            <ul>
            <li><a href="./amasukjual.php">Masukkan jualan</a></li>
            <li><a href="./asenaraijual.php">Senarai jualan kereta</a></li>
            </ul>
            <li>Pekerja</li>
            <ul>
            <li><a href="./aimport.php">Import pekerja</a></li>
            <li><a href="./asenaraipek.php">Senarai pekerja</a></li>
            </ul>
            <li><a href="../logout.php">Log keluar</a></li>
        </ul>
    </div>

    <br><br>

    <div class="text">
        <h4> Info Kenderaan </h4>
    </div>

</div>
<div class="blank">
<table class="main">
    <tr>
        <th>Nombor Plat</th>
        <th>Model</th>
        <th>Tahun Dibuat</th>
        <th>ID Harga</th>
        <th>Status</th>
        <th>Harga Asal</th>
        <th>Cukai Jalan</th>
        <th>Insurans</th>
        <th>Harga</th>
    </tr>

    <?php
    $sql="SELECT * FROM kenderaan INNER JOIN harga ON kenderaan.idHarga=harga.idHarga";
    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) > 0 ){
      while($row=mysqli_fetch_assoc($result)){
          echo"<tr><td>" . $row['nomPlat']."</td><td>" . $row['model']."</td><td>"
          . $row['tahunDibuat']."</td><td>" . $row['idHarga']."</td><td>" . $row['status']."</td><td>"
           .$row['hargaAsal']."</td><td>"
          . $row['cukaiJalan']."</td><td>". $row['insurans']."</td><td>" .$row['harga']."</td></tr>";
      }
      echo"</table>";
    }
    else{
        echo "no result";
    }
    ?>
</div>
<footer>Autoweb 2019</footer>

</body>
</html>