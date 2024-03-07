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
        <form action="product.php" method="post">
        <div class="search-container">
        <input type="date" class="search-input" name="dateproduct">
        <button class="search-button">Search</button>
    </div><br>
        </form>
        <hr><br>

 <?php
      
      $date = date('Y-m-d');
      $datenew = isset($_POST['dateproduct']) ? $_POST['dateproduct'] : $date;
      $sql = "SELECT * from transection left outer join `tbl_member user` on tra_mem = mem_phone where tra_date = '$datenew'" ;
      $result = mysqli_query($connect,$sql);?>
       
  
      <div class="table-container">
      <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">order</th>
      <th scope="col">Menu name</th>
      <th scope="col">Type name</th>
      <th scope="col">amount</th>
      <th scope="col">total</th>
      <th scope="col">employees</th>
      <th scope="col">member</th>
      <th scope="col">date</th>
    </tr>
    
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_assoc($result)){?>
    <tr>
      <th><?php echo $order++; ?></th>
      <td><?php echo $row['tra_name']; ?></td>
      <td><?php echo $row['tra_type']; ?></td>
      <td><?php echo $row['tra_amount']; ?></td>
      <td><?php echo $row['tra_price']; ?></td>
      <td><?php echo $row['tra_emp']; ?></td>
      <td><?php if($row['tra_mem'] == '0' or $row['tra_mem'] != $row['mem_phone']){
        echo "ไม่ได้เป็นสมาชิก";
      }else{
        echo $row['mem_fname']." ".$row['mem_lname'];  } ?></td>
     <td><?php echo $row['tra_date']; ?></td>
    </tr>
    <?php } ?>

  </tbody>
</table>
    </div>

 

       
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/chart.php"></script>

    

  </body>
</html>