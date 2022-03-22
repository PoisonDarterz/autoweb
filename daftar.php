<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar | Autoweb</title>
    <link rel="stylesheet" href="./bootstrap.css">    
    <link rel="stylesheet" href="./index.css" type="text/css">
    <link rel="icon" href="./assets/favicon.jpg" type="image/jpg" sizes="16x16">
</head>
<body>
<div class="container">
    <div class="box">AutoWeb</div>

    <h2> <br> Registration Page </h2>
    <h4>Laman Berdaftar</h4>
    <br>

    <form action="daftarproses.php" method ="post">
        <div class="form-group">
            <label>USERNAME:</label>
            <input type = "text" name = "User" class = "form-control" placeholder = "Masukkan Username Anda" required>
		    </div>
        <div class = "form-group">
		    <label>KATALALUAN:</label>
		    <input type = "password" name = "Pass" class = "form-control" placeholder = "Masukkan Katalaluan Anda" required>
		    </div>
        <div class = "form-group">
		    <label>Kenalpasti Katalaluan:</label>
		    <input type = "password" name = "Passcon" class = "form-control" placeholder = "Masukkan Katalaluan Anda Sekali Lagi" required>
		    </div>
        <div class = "form-group">
		    <label>Status Pendaftar:</label>
		    <select name="status">
                <option value="pekerja">Pekerja</option>
                <option value="admin">Admin</option>
            </select>
		    </div>
        <div class= "form-group" >
        <br>
            <button style="width:120px;float:right" name = "Reg" type = "submit" class = "btn btn-primary">Daftar</button>
            <br><br>
            <label style="font-style:italic"> Sudah mempunyai akaun? </label>
            <a href="./index.php" style="width:120px;float:right" name = "Goback" type = "button" class = "btn btn-info">Kembali</a>
        <br>
        <br>
	    </div> 
        
    </form>
    <footer>Untuk sebarang pertanyaan sila hubungi: 014-602 9626</footer>
</div>
</body>
</html>