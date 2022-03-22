<?php
session_start();
require_once('../dbcon.php');
if ($_SESSION['user'] == "admin") {

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

<button class="colorButton">Blue</button>
<button class="colorButton">Green</button>
<button class="colorButton">Orange</button>
<button class="colorButton">Yellow</button>
<button class="colorButton">Pink</button>
<button class="colorButton">White</button>
<button class="colorButton">Black</button>

<script>
    const colorButtons = [...document.querySelectorAll('.colorButton')];
document.addEventListener('click', e => {
    if (!colorButtons.includes(e.target)) return;
    document.body.style.background = e.target.textContent;
}); </script>

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
        <h4> Senarai Jualan Kereta </h4>
    </div>

</div>

<div class=month>
    <form action="asenaraijual.php" method="get">
    <label>Pilih Bulan:</label>
    <select name="month" value="all">
        <option value="all">Semua maklumat</option>
        <option value="1">Jan 2020</option>
        <option value="2">Feb 2020</option>
        <option value="3">Mac 2020</option>
        <option value="4">Apr 2020</option>
        <option value="5">Mei 2020</option>
        <option value="6">Jun 2020</option>
        <option value="7">Jul 2020</option>
        <option value="8">Ogo 2020</option>
        <option value="9">Sep 2020</option>
        <option value="10">Oct 2020</option>
        <option value="11">Nov 2020</option>
        <option value="12">Dec 2020</option>
    </select>
    <button type = "submit" style="width:150px;"  class = "btn btn-outline-secondary">Kemaskini Pilihan</button>

    </form>
</div>

<div class="blank">
    <table class="main">
        <tr>
            <th>ID Jualan</th>
            <th>Nombor Plat</th>
            <th>Tarikh</th>
            <th>ID Pelanggan</th>
            <th>ID Pekerja</th>
            <th>Harga</th>
        </tr>
        
            <?php
                error_reporting(0);
                $bln=$_GET['month'];
                    if($bln!="all"){
                        $mth=(int)$bln;
                    }
                    else{
                        $mth="all";
                    }
            ?>
        <?php
        if($mth!="all"){
        $sql="SELECT * FROM jualan INNER JOIN 
        kenderaan ON jualan.nomPlat=kenderaan.nomPlat
        INNER JOIN harga ON kenderaan.idHarga=harga.idHarga
        WHERE MONTH(jualan.tarikh)='$mth'
        ORDER BY idJualan";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) > 0 ){
          while($row=mysqli_fetch_assoc($result)){
              echo"<tr><td>" . $row['idJualan']."</td><td>" . $row['nomPlat']."</td><td>"
              . $row['tarikh']."</td><td>" . $row['idPelanggan']."</td><td>" . $row['idPekerja']
              . "</td><td>" . $row['harga']."</td></tr>";
          }
          echo"</table>";
        }
        else{
            echo "<p style='color:lightcoral'>no result</p></table>";
        }
        }
        else{$sql="SELECT * FROM jualan INNER JOIN 
            kenderaan ON jualan.nomPlat=kenderaan.nomPlat
            INNER JOIN harga ON kenderaan.idHarga=harga.idHarga
            ORDER BY idJualan";
            $result = mysqli_query($con,$sql);
    
            if(mysqli_num_rows($result) > 0 ){
              while($row=mysqli_fetch_assoc($result)){
                  echo"<tr><td>" . $row['idJualan']."</td><td>" . $row['nomPlat']."</td><td>"
                  . $row['tarikh']."</td><td>" . $row['idPelanggan']."</td><td>" . $row['idPekerja']
                  . "</td><td>" . $row['harga']."</td></tr>";
              }
              echo"</table>";
            }
            else{
                echo "<p style='color:lightcoral'>no result</p></table>";
            }

        }
        ?>

    <div class="sum">
        <label>Jumlah: RM
            <?php 
                if($mth!="all"){
                $resultq=mysqli_query($con,"SELECT SUM(harga) FROM jualan INNER JOIN 
                    kenderaan ON jualan.nomPlat=kenderaan.nomPlat
                    INNER JOIN harga ON kenderaan.idHarga=harga.idHarga
                    WHERE MONTH(jualan.tarikh)='$mth'");
                $rowq=mysqli_fetch_assoc($resultq);
                $jumlah=implode("",$rowq);
                echo $jumlah;}
                else{
                $resultq=mysqli_query($con,"SELECT SUM(harga) FROM jualan INNER JOIN 
                    kenderaan ON jualan.nomPlat=kenderaan.nomPlat
                    INNER JOIN harga ON kenderaan.idHarga=harga.idHarga
                    WHERE MONTH(jualan.tarikh)=1 OR 2 OR 3 OR 4 OR 5 OR 6 OR 7 OR 8 OR 9 OR 10 OR 11 OR 12");
                $rowq=mysqli_fetch_assoc($resultq);
                $jumlah=implode("",$rowq);
                echo $jumlah;
                }
            ?>
        </label>
    </div>
    
    <form action="../print.php" method="post">
        <input type="hidden" name="data" value=<?php echo $mth; ?>>
        <button type = "submit" name="cetak" style="width:150px;"  class = "btn btn-outline-secondary">Cetak</button>
    </form>
    <p class="note">Nota: Jika "no result" dipaparkan, sila cuba "Kemaskini Pilihan" lalu (jika hendak) tekan "Cetak".</p>
</div>

<footer>Autoweb 2019</footer>

</body>
</html>