<?php
require('connect.php');
session_start();

$username = $_POST['admin'];
$passwordd = $_POST['password'];

$sql = "SELECT * from tbl_admin where user = '$username' and passwordd = '$passwordd'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);

if($row > 0){
    $_SESSION["admin"] = $row['user'];
    $_SESSION["password"] = $row['passwordd'];
    header("location:dashboard.php");
}else{
    $_SESSION["error"] = "<p> username or password is invalid </p>";
    header("location:adminlogin.php");
    exit();
}

?>