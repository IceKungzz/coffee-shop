<?php
require('connect.php');
$nameadd = $_POST['nameaddstock'];
$pricetoorder = $_POST['pricetoorder'];

$sql = "SELECT * FROM tbl_stockorder";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['stockorder_name'] == $nameadd) {
    echo "<script>alert('มีสินค้าตัวนี้แล้ว');</script>";
    echo "<script>window.location.href = 'addstock.php';</script>";
} else {
    $addsql = "INSERT INTO tbl_stockorder (stockorder_name, stockorder_price) VALUES ('$nameadd', '$pricetoorder')";
    $addresult = mysqli_query($connect, $addsql);
}
if($addresult){
    echo "<script>alert('เพิ่มสินค้าสำเร็จ');</script>";
    echo "<script>window.location.href = 'addstock.php';</script>";
}else{
    echo "<script>alert('เกิดข้อผิดพลาด');</script>";
    echo "<script>window.location.href = 'addstock.php';</script>";
}
?>
