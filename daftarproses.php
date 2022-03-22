<?php
require_once('dbcon.php');
$NAMA_PENGGUNA = $_POST['User'];
$KATA_LALUAN = $_POST['Pass'];
$CONFIRM_KL = $_POST['Passcon'];
$STATUS = $_POST['status'];

    if ($KATA_LALUAN!==$CONFIRM_KL){
        echo"
            <script>
            window.alert('Katalaluan tidak sama!');
            window.location = 'daftar.php';
            </script>'";
    }
    if ($KATA_LALUAN===$CONFIRM_KL){
        $sql = "INSERT INTO pengguna (namaPengguna,kataLaluan,statusPengguna) 
        VALUES('$NAMA_PENGGUNA','$KATA_LALUAN','$STATUS')";
        $result = mysqli_query($con, $sql);
        {
            if ($result)
            {
                echo"
                <script>
                window.alert('Anda telah berjaya didaftar');
                window.location = 'index.php';
                </script>'";
            }
            else
            {
                echo"
                <script>
                window.alert('Anda telah gagal didaftar');
                window.location = 'daftar.php';
                </script>'";
            }
        }
    }
    
?>