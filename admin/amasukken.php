<?php
session_start();

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
    <title>Masukkan Info Kenderaan</title>
    <link rel="icon" href="../assets/favicon.jpg" type="image/jpg" sizes="16x16">
 <link rel="stylesheet" href="../bootstrap.css">    <link rel="stylesheet" href="../general.css" type="text/css">
    <link rel="stylesheet" href="../masukjual.css" type="text/css">
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
    <div class="row">
        <div class="col-sm">
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
                <br><br>
                <div class="text">
                <h4> Masukkan Info Kenderaan </h4>
                </div>
            </div>
        </div>

        <div class="col-sm">
        <form action="../mkenpro.php" method ="post">
        <div class="form-group">
            <label>Nombor Plat:</label>
            <input type = "text" name = "NomPlat" class = "form-control" placeholder = "Masukkan Nombor Plat" required>
		</div>
        <div class = "form-group">
		    <label>Model:</label>
		    <input type = "text" name = "model" class = "form-control" placeholder = "Masukkan Model Kereta" required>
        </div>
        <div class = "form-group">
		    <label>Tahun Dibuat:</label>
		    <input type = "text" name = "thn" class = "form-control" placeholder = "Masukkan Tahun" required>
        </div>
        <div class = "form-group">
            <label>Status:</label>
		    <input type = "text" name = "stat" class = "form-control" placeholder = "Firsthand/Secondhand" required>
		</div>
        <div class = "form-group">
            <label>Harga:</label>
            <input type = "text" name = "hasal" class = "form-control" placeholder = "Harga Asal" required>
        </div>
        <div class = "form-group">
            <input type = "text" name = "cj" class = "form-control" placeholder = "Cukai Jalan" required>
        </div>

        <button style="width:120px;float:right" name = "Masuk" type = "submit" class = "btn btn-outline-dark">Masuk</button>

	    </form>
        </div>
    </div>
</div>
<footer>Autoweb 2019</footer>

</body>
</html>