<?php 
require('connect.php'); 
session_start();
if(!isset($_SESSION["admin"]))
    header("location:index.php");
$order = 1;


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <style>
    .search-container {
    display: flex;
    align-items: center;
    
}

.search-input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
}

.search-button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
}
.buy-button {
    background-color: darkgreen;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
}
.container{
    background-color: white;
    padding: 20px;
    width: 500px;
}

    </style>
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined">production_quantity_limits</span>
        </div>
        <div class="header-right">
         

        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">admin_panel_settings</span> Admin Dashboard
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="dashboard.php" >
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="product.php" >
              <span class="material-icons-outlined">inventory</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="stock.php" >
              <span class="material-icons-outlined">inventory_2</span> Stock
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="employees.php" >
              <span class="material-icons-outlined">badge</span>employees
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="member.php">
              <span class="material-icons-outlined">card_membership</span>memberuser
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="logout.php">
              <span class="material-icons-outlined">logout</span> LOGOUT
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
    <div class="main-title">
        <p class="font-weight-bold">PRODUCT</p>
    </div>     
    <hr><br>
    <div class="container">
        <form action="stockbuyorderdata.php" method="POST">
            <div class="form-group">
                <label for="">เลือกสินค้าที่จะสั่ง</label>
                <select class="form-select" name="stockbuyorder">
                    <?php
                    $sql = "SELECT * FROM tbl_stockorder left outer join tbl_stock on tbl_stockorder.stock_id = tbl_stock.id";
                    $result = mysqli_query($connect, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['stockorder_name']; ?>"><?php echo $row['stockorder_name']." "."อันละ"." ".$row['stockorder_price']." บาท "; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div><br>
            <div class="form-group">
                <label>จำนวน</label>
                <input type="text" class="form-control" name="amountorder" required>
            </div><br>
            <button type="submit" class="btn btn-success">สั่งซื้อ</button>
            <a href="addstock.php" class="btn btn-primary">เพิ่มสินค้าที่ไม่มี</a>
        </form>
    </div>
</main>
   

    </div>

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
 
    <script src="js/chart.php"></script>

    

  </body>
</html>