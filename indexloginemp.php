<?php
require('connect.php');
session_start();

$username = mysqli_real_escape_string($connect, $_POST['useremp']);
$passwordd = mysqli_real_escape_string($connect, $_POST['password']);

$sql = "SELECT tbl_employees.*, position.position_name 
        FROM tbl_employees 
        INNER JOIN position ON tbl_employees.position_id = position.id 
        WHERE emp_useremp = '$username' AND emp_phone = '$passwordd'";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $_SESSION["useremp"] = $row['emp_useremp'];
    $_SESSION["password"] = $row['emp_phone'];
    $_SESSION["position_name"] = $row['position_name'];

    header("location: menu.php");
} else {
    $_SESSION["error"] = "<p> Username or password is invalid </p>";
    header("location: index.php");
    exit();
}
?>
