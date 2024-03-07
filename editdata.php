<?php 
require('connect.php');
$fname =$_POST['fname'];
$lname =$_POST['lname'];
$email =$_POST['email'];
$brithday =$_POST['brithday'];
$salary =$_POST['salary'];
$useremp =$_POST['useremp'];
$phone =$_POST['phone'];



$sql = "UPDATE tbl_employees SET emp_fname = '$fname', emp_lname = '$lname', emp_salary = '$salary', emp_phone = '$phone' where emp_useremp = '$useremp'";
$result = mysqli_query($connect,$sql);

if($result){
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
    echo "<script>window.location.href = 'employees.php';</script>";
}else{
        echo "<script>alert('บันทึกไม่ข้อมูลสำเร็จ');</script>";
        echo "<script>window.location.href = 'employees.php';</script>";
      }
?>
