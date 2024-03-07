<?php
require('connect.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$date = $_POST['date'];
$username = $_POST['username'];
$phone = $_POST['phone'];

$sql = "INSERT INTO tbl_employees (emp_fname,emp_lname,emp_email,emp_brithday,emp_useremp,emp_phone,position_id) values('$fname','$lname','$email','$date','$username','$phone','2')";
$result = mysqli_query($connect,$sql);

if($result){
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
    echo "<script>window.location.href = 'employees.php';</script>";
}else{
    echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>";
    echo "<script>window.location.href = 'employees.php';</script>";
}
?>