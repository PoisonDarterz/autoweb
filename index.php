<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Autoweb</title>
    <link rel="icon" href="./assets/favicon.jpg" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./index.css" type="text/css">
</head>
<body>

<div class="container">
    <div class="box">AutoWeb</div>

    <h2><br>Login Page </h2>
    <h4>Laman Log Masuk</h4>
    <br>

    <form action="loginprocess.php" method ="post">
        <div class="form-group">
            <label>USERNAME:</label>
            <input type = "text" name = "User" class = "form-control" placeholder = "Masukkan Username Anda" required>
		    </div>
        <div class = "form-group">
		    <label>KATALALUAN:</label>
		    <input type = "password" name = "Pass" class = "form-control" placeholder = "Masukkan Katalaluan Anda" required>
		    </div>

        <div class= "form-group" >
            <a href="./daftar.php">Belum berdaftar?</a>
        <br>
        <br>
            <button style="width:120px;float:right" name = "Login" type = "submit" class = "btn btn-primary">Log Masuk</button>
	    <br>
        <br>
	    </div>
    </form>

    <footer>Untuk sebarang pertanyaan sila hubungi: 014-602 9626</footer>
</div>
</body>
</html>