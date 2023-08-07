<?php

    session_start();
    
    include "../function.php";
    
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    
    $sql = "SELECT * FROM tbllogin WHERE email='" . $email . "' and pass='".$pass."' limit 1";
    $hasil = mysqli_query($koneksi,$sql);
    $jumlah = mysqli_num_rows($hasil);
    // var_dump($hasil);

    die();
    if ($jumlah>0) {
        $row = mysqli_fetch_assoc($hasil);
        
        $_SESSION["idLogin"]=$row["idLogin"];
        $_SESSION["email"]=$row["email"];
        $_SESSION["username"]=$row["username"];
        
        die(header("Location : home.php"));
    }else {
        echo "username atau password salah <br>
        <a href=index.php>Kembali</a>";
    }

?>