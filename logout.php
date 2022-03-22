<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
    <link rel="icon" href="./assets/favicon.jpg" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="./bootstrap.css"></head>

<body style="background-color:lemonchiffon">
    <img src="./assets/logout.jpg" type="image/jpg" style="display:block;margin-left:auto;margin-right:auto;width:55%">
    
    <script>
    alert ("Anda telah berjaya log out!")
    </script>

<h1 style="text-align:center"> Log Out. </h1>
<h3 style="text-align:center"> Log Keluar. </h3>

<label> Kembali ke laman </label><a href="./index.php"> log masuk.</a>

<footer style="width:max;height:50px;border:1px solid #000;margin-left:auto;margin-right:auto;text-align:center;font-size:30px;font-weight:bold">AutoWeb 2019
</footer>

</body>
</html>