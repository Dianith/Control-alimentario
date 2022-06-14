<?php
include 'conn.php';
include 'check_login.php';

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$msg = 0;

if (isste($_POST['submit'])) {
    $efname = $_POST['fname'];
    $emname = $_POST['mname'];
    $elname = $_POST['lname'];
    $eaddress = $_POST['address'];
    $egender = $_POST['gender'];
    $edob = $_POST['dob'];
    $eheight = $_POST['height'];
    $eweight = $_POST['weight'];

    mysqli_query($conn, "UPDATE users SET FName='$efname', MName ='$emname', LName = '$elname', Address = '$eaddress', DoB = '$edob',
                Gender = '$egender', Height = '$eheight', weight = '$eweight'  WHERE Username = '$user' AND PassMd = '$pass'");

    if (mysqli_connect_errno()) {
        $msg = 1;
    }else {
        $msg = 2;
        $message = "Tu informacion personal ha sido actualizada";

    }
}

$q = mysqli_query($conn, " SELECT * FROM users WHERE Userbame = '$user' AND PassMd = '$pass'");
$r = Mysqli_fetch_array($q);

$dob = $r['Dob'];
$height = $r['Height'];
$weight = $r['Weight'];

?>