<?php 
require('connect.php');

$useremp =$_POST['useremp'];




$sql = "DELETE FROM tbl_employees WHERE emp_useremp = '$useremp'";
$result = mysqli_query($connect,$sql);

if($result){
    echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
    echo "<script>window.location.href = 'employees.php';</script>";
}else{
        echo "<script>alert('ลบข้อมูลไม่สำเร็จ');</script>";
        echo "<script>window.location.href = 'employees.php';</script>";
      }
?>
