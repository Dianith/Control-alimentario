<?php 
include 'conn.php';
include 'check_login.php';

$user = $_SESSION['user'];
$pass = $_SESSION[ 'pass'];
$msg = 0;

if (isste($_POST['submit'])) {
    $epass=md5($_POST['pass']);

    if ($epass != $pass) {
        $msg = 1;
        $message = "la contraseña introducida no es correcta";
    }else {
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if ($pass1 != $_POST['pass2']) {
            $msg = 1;
            $message = "El nuevo password no se realizo correctamente";
        }else {
            $email = $_POST['email'];
            $pass2 = md5($pass2);

            mysqli_query($conn, "UPDATE users SET Pass = '$pass2', PassMd = '$pass2', Email = '$email', WHERE Username = '$user', AND PassMd = '$pass'");

            if (mysqli_connect_errno()) {
                $msg = 1;
                $message = mysqli_connect_errno();
            }else {
               $msg = 2;
               $message = " Tu informacion ha sido actualizada correctamente";
            }
        }
    }
}

$q =  mysqli_query($conn, "SELECT FNamen, LName, Email FROM users WHERE Username ='$user' AND PassMs ='$pass'");
$r = Mysqli_fetch_array($q);

?>
