<!-- <?php

//     session_start();
    
//     $pdo =include "../function.php";
    
//     $email = $_POST["email"];
//     $pass = $_POST["pass"];
    
//     $sql = "SELECT * FROM tbllogin WHERE email='" . $email . "' and pass='".$pass."' limit 1";
//     $hasil = mysqli_query($koneksi,$sql);
//     $jumlah = mysqli_num_rows($hasil);

//     $sql = $pdo-> query ("SELECT FROM tbllogin WHERE email='$email'");
//     $hasil = mysqli_f($koneksi,$sql);
//     $jumlah = mysqli_num_rows($hasil);

//     if ($jumlah>0) {
//         $row = mysqli_fetch_assoc($hasil);

//         $_SESSION["idLogin"]=$row["idLogin"];
//         $_SESSION["email"]=$row["email"];
//         $_SESSION["username"]=$row["username"];
        
//         die(header("Location : home.php"));
//     }else {
//         echo "username atau password salah <br>
//         <a href=index.php>Kembali</a>";
//     }

    session_start();
  
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
  
        include '../function.php';
  
        $stmt = $pdo->prepare('SELECT * FROM tbllogin WHERE email = :email');
  
        try{
            $stmt->execute(['email' => $email]);
  
            if($stmt->rowCount() > 0){
                $user = $stmt->fetch();
  
                if(password_verify($password, $user['password'])){
                    $_SESSION['success'] = 'User verification successful';
                }
                else{
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
  
                    $_SESSION['error'] = 'Incorrect password';
                }
  
            }
            else{
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
  
                $_SESSION['error'] = 'No account associated with the email';
            }
  
        }
        catch(PDOException $e){
            $_SESSION['error'] = $e->getMessage();
        }
  
    }
    else{
        $_SESSION['error'] = 'Fill up login form first';
        header('Location : index.php');
    }
  
    die(header('Location: home.php'));
?>

?>