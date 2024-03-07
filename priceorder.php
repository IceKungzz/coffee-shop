<?php 
require('connect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coffee = $_POST['coffee'];
    $typecoffee = $_POST['select'];
    $amount = $_POST['amount'];
    $member = $_POST['member'];
    $user = $_POST['useremp'];
    $price = 35;
    $pricetotal = $price * $amount; 
    $date = date('Y-m-d');
    

    $score_sql = "SELECT * FROM `tbl_member user` WHERE mem_phone = '$member'"; 
    $score_result = mysqli_query($connect, $score_sql);
    $row = mysqli_fetch_assoc($score_result);
    $score = $row['score'];
    $new_score = $amount + $score;
    $free = 0;

    if ($new_score > 10) {
        $new_score -= 10;   
        $pricetotal -= $price;
        $free = 1;
    }

    $update_score_sql = "UPDATE `tbl_member user` SET score = '$new_score', total_score = total_score + $amount, free_total = free_total + '$free',date = '$date'  WHERE mem_phone = '$member'"; 
    $update_score_result = mysqli_query($connect, $update_score_sql);


  
        

    
    $sql = "INSERT INTO transection (tra_name, tra_type, tra_amount, tra_price, tra_emp, tra_date, tra_mem) VALUES('$coffee', '$typecoffee', '$amount', '$pricetotal', '$user', '$date', '$member')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        $updatestock = "UPDATE tbl_stock SET stock_amount = stock_amount - 1 WHERE stock_name IN ('ผงกาแฟ', 'นม', 'แก้ว', 'หลอด')";
        // เก็บค่าใน $_SESSION
        $_SESSION['amount'] = $amount;
        $_SESSION['custumer'] = $date;
        $_SESSION['pricetotal'] = $pricetotal;

        echo "<script>alert('สั่งซื้อสำเร็จ');</script>";
        echo "<script>window.location.href = 'menu.php';</script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
