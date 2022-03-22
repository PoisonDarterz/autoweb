<?php
session_start();

if ($_SESSION['user'] == "pekerja") {

} else {
    echo "<script>
    window.alert('Anda tidak log masuk! Sila log masuk dahulu.');
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
    <title>Autoweb | Home</title>
    <link rel="icon" href="../assets/favicon.jpg" type="image/jpg" sizes="16x16">
 <link rel="stylesheet" href="../bootstrap.css">    <link rel="stylesheet" href="../general.css" type="text/css">
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
            <li><a href="./home.php">Laman utama</a></li>
            <li>Kenderaan:</li>
            <ul>
            <li><a href="./masukken.php">Masukkan info kenderaan</a></li>
            <li><a href="./infoken.php">Info kenderaan</a></li>
            </ul>
            <li>Pelanggan:</li>
            <ul>
            <li><a href="./masukinfo.php">Masukkan info pelanggan</a></li>
            <li><a href="./info.php">Info pelanggan</a></li>
            </ul>
            <li>Jualan:</li>
            <ul>
            <li><a href="./masukjual.php">Masukkan jualan</a></li>
            <li><a href="./senaraijual.php">Senarai jualan kereta</a></li>
            </ul>
            <li><a href="../logout.php">Log keluar</a></li>
        </ul>
    </div>

    <br><br>

    <div class="text">
        <h4> Selamat Datang! </h4>
    </div>
    
    <div class="img">
        <img src="../assets/home.jpg"
        style="position:absolute;height:320px;width:auto;left:60%;top:0%">
    </div>

</div>

<footer>Autoweb 2019</footer>

</body>
</html>