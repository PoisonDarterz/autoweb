<html>
<head>
<link rel="stylesheet" href="./bootstrap.css">
<link rel="icon" href="./assets/favicon.jpg" type="image/jpg" sizes="16x16">
<center><title>Autoweb | Print</title></center>
</head>
<body>
<center><h2>BAHAGIAN CETAKAN JUALAN</h2></center>

<?php
require_once('dbcon.php');
$mth=$_POST['data'];
print"<table border='1' style='margin-left:auto;margin-right:auto'>";
print"<tr>";
print"<th>ID Jualan</th>";
print"<th>Nombor Plat</th>";
print"<th>Tarikh</th>";
print"<th>ID Pelanggan</th>";
print"<th>ID Pekerja</th>";
print"<th>Harga</th>";
print"</tr>";

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
else{
    $sql="SELECT * FROM jualan INNER JOIN 
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

if($mth!="all"){
    $resultq=mysqli_query($con,"SELECT SUM(harga) FROM jualan INNER JOIN 
        kenderaan ON jualan.nomPlat=kenderaan.nomPlat
        INNER JOIN harga ON kenderaan.idHarga=harga.idHarga
        WHERE MONTH(jualan.tarikh)='$mth'");
    $rowq=mysqli_fetch_assoc($resultq);
    $jumlah=implode("",$rowq);
    echo "<h6 style='text-align:center'>Jumlah: $jumlah</h6>";
}

else{
    $resultq=mysqli_query($con,"SELECT SUM(harga) FROM jualan INNER JOIN 
        kenderaan ON jualan.nomPlat=kenderaan.nomPlat
        INNER JOIN harga ON kenderaan.idHarga=harga.idHarga
        WHERE MONTH(jualan.tarikh)=1 OR 2 OR 3 OR 4 OR 5 OR 6 OR 7 OR 8 OR 9 OR 10 OR 11 OR 12");
    $rowq=mysqli_fetch_assoc($resultq);
    $jumlah=implode("",$rowq);
    echo "<h6 style='text-align:center'>Jumlah: RM $jumlah</h6>";
}

?>

<br>
<a href="javascript:history.go(-1)">Kembali ke menu utama</a>
<br>
<button onclick="window.print();" id="cetak" class="btn btn-outline-dark">Cetak</button>

</body>
</html>