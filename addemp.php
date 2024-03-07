<?php 
require('connect.php'); 
session_start();
if(!isset($_SESSION["admin"]))
    header("location:index.php");
$order=1;

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


.input {
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

.container{
    background-color: white;
    padding: 20px;
    width: 500px;
}
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn {
            margin-top: 10px;
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
          <span class="material-icons-outlined">search</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined"></span>

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
            <a href="dashboard.php">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="product.php">
              <span class="material-icons-outlined">inventory</span> Products
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="stock.php">
              <span class="material-icons-outlined">inventory_2</span> Stock
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="employees.php">
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
          <p class="font-weight-bold">EMPLOYEES</p>
        </div>
        <div class="container">
            <h1><center>เพิ่มข้อมูลพนักงาน</center></h1><br>
        <form action="addempdata.php" method="post">
            <div class="form-group">
            <label for="">กรอกชื่อพนักงาน</label><br>
            <input type="text" name="fname" required class="form-control">
            </div>

            <div class="form-group">
            <label for="">กรอกนามสกุลพนักงาน</label><br>
            <input type="text" name="lname" required class="form-control">
            </div>

            <div class="form-group">
            <label for="email">กรอก email <span style="color:red">(ตรวจสอบให้ถูกต้อง แก้ไม่ได้)</span></label><br>
            <input type="email" id="email" name="email" required class="form-control">
            </div>

            <div class="form-group">
            <label for="">วันเกิด<span style="color:red">(ตรวจสอบให้ถูกต้อง แก้ไม่ได้)</span></label><br>
            <input type="date" name="date" required class="form-control">
            </div>

            <div class="form-group">
            <label for="">username<span style="color:red">(ตรวจสอบให้ถูกต้อง แก้ไม่ได้)</span></label><br>
            <input type="text" name="username" required class="form-control">
            </div>

            <div class="form-group">
            <label for="">phone<span style="color:blue">(จะใช้เป็นรหัสผ่านด้วย)</span></label><br>
            <input type="text" name="phone" required class="form-control">
            </div>
            <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
            <a href="employees.php" class="btn btn-danger">ย้อนกลับ</a>
            </form>

        </div>

      </main>
     

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
   
    <script src="js/chart.php"></script>

    

  </body>
</html>