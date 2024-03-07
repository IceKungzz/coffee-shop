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
        <a href="addemp.php" class="btn btn-success">ADD</a>
        <a href="edit.php" class="btn btn-primary">EDIT</a>
        <a href="delete.php" class="btn btn-danger">DELETE</a>
        <div class="table-container">
      <table class="table table-hover">
    <thead>
    <tr>
      <th scope="col">order</th>
      <th scope="col">first name</th>
      <th scope="col">last name</th>
      <th scope="col">email</th>
      <th scope="col">brithday</th>
      <th scope="col">salary</th>
      <th scope="col">useremp</th>
      <th scope="col">phone</th>
      <th scope="col">position</th>
 
    </tr>
    
  </thead>
  <tbody>
  <?php 
 
  $sql = "SELECT * from tbl_employees inner join position on tbl_employees.position_id = position.id ";
  $result = mysqli_query($connect,$sql);

  while($row = mysqli_fetch_assoc($result)){?>
    <tr>
      <th><?php echo $order++; ?></th>
      <td><?php echo $row['emp_fname']; ?></td>
      <td><?php echo $row['emp_lname']; ?></td>
      <td><?php echo $row['emp_email']; ?></td>
      <td><?php echo $row['emp_brithday']; ?></td>
      <td><?php echo $row['emp_salary']; ?></td>
      <td><?php echo $row['emp_useremp'] ?> </td>
      <td><?php echo $row['emp_phone']; ?> </td>
      <td><?php echo $row['position_name']; ?> </td>

     
    </tr>
    <?php } ?>

  </tbody>
</table>
    </div>
       

        

       
      </main>
     

    </div>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
   
    <script src="js/chart.php"></script>

    

  </body>
</html>