<?php
require('connect.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Check if the phone number already exists
$sql1 = "SELECT mem_phone FROM `tbl_member user` WHERE mem_phone = '$phone'";
$result1 = mysqli_query($connect, $sql1);
$row = mysqli_fetch_assoc($result1);

if ($row) {
    echo "<script>alert('ข้อมูลเบอร์เป็นสมาชิกอยู่แล้ว');</script>";
    echo "<script>window.location.href = 'register.php';</script>";
    exit();
} else {
    $sql = "INSERT INTO `tbl_member user` (mem_fname, mem_lname, mem_email, mem_phone) VALUES ('$fname', '$lname', '$email', '$phone')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "<script>alert('สมัครสมาชิกเรียบร้อย');</script>";
        echo "<script>window.location.href = 'menu.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
