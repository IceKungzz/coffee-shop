<?php 
require('connect.php');

$stockk = $_POST['stockbuyorder'];
$amountt = $_POST['amountorder'];
$datee = date('Y-m-d'); 


$sql = "SELECT * FROM tbl_stock RIGHT OUTER JOIN tbl_stockorder ON stock_name = '$stockk' AND stockorder_name = '$stockk'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if($row['stock_name'] == $stockk){
        $updateSql = "UPDATE tbl_stock SET stock_amount = stock_amount + $amountt, totalprice = stock_amount * stock_price, stock_buyindate = '$datee' WHERE stock_name = '$stockk'";
        $updateResult = mysqli_query($connect, $updateSql);

        if ($updateResult) {
            echo "<script>alert('สั่งซื้อเรียบร้อย');</script>";
            echo "<script>window.location.href = 'stockbuyorder.php';</script>";
        } else {
           echo mysqli_error($connect);
        }
    }else{

        $ss = "SELECT stockorder_price from tbl_stockorder where stockorder_name = '$stockk'";
        $resultss = mysqli_query($connect, $ss);
        $ssRow = mysqli_fetch_assoc($resultss);
        $stockorder_price = $ssRow['stockorder_price'];

        $addsql = "INSERT INTO tbl_stock(stock_name, stock_amount, stock_price, totalprice, stock_buyindate) values('$stockk', '$amountt', '$stockorder_price', '".($stockorder_price * $amountt)."', '$datee')";
        $addresult = mysqli_query($connect, $addsql);
        if ($addresult) {
            echo "<script>alert('สั่งซื้อเรียบร้อย');</script>";
            echo "<script>window.location.href = 'stockbuyorder.php';</script>";
        } else {
           echo mysqli_error($connect);
        }   
    }
} else {
    echo "เกิดข้อผิดพลาดในการอัปเดตหรือไม่มีการเปลี่ยนแปลง";
}
?>
