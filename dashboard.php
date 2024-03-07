<?php 
require('connect.php'); 
session_start();
if(!isset($_SESSION["admin"]))
    header("location:index.php");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <style>
      .icon-button {
    border: none;
    background-color: transparent;
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
          <span class="material-icons-outlined">today</span>
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">

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
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">จำนวนสินค้าที่ขายได้วันนี้</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <?php
              $sql = "SELECT sum(tra_amount) AS sum_tra_amount FROM transection WHERE tra_date = '" . date('Y-m-d') . "'";
              $result = mysqli_query($connect, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
            <span class="text-primary font-weight-bold"><?php echo $row['sum_tra_amount']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">จำนวนบิลวันนี้</p>
              <span class="material-icons-outlined text-orange">person</span>
            </div>
            <?php 
             $sql = "SELECT count(id) as totalbill FROM transection WHERE tra_date = '" . date('Y-m-d') . "'";
             $result = mysqli_query($connect, $sql);
             $row = mysqli_fetch_assoc($result);
             ?>
            <span class="text-primary font-weight-bold"><?php echo $row['totalbill']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">จำนวนรายได้ทั้งหมดของวันนี้</p>
              <span class="material-icons-outlined text-green">attach_money</span>
            </div>
            <?php 
             $sql = "SELECT sum(tra_price) as totalprice FROM transection WHERE tra_date = '" . date('Y-m-d') . "'";
             $result = mysqli_query($connect, $sql);
             $row = mysqli_fetch_assoc($result);
             ?>
            <span class="text-primary font-weight-bold"><?php echo $row['totalprice']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">จำนวนลูกค้าที่แรกแต้มฟรี1แก้ว</p>
              <span class="material-icons-outlined text-red">star</span>
            </div>
            <?php 
             $sql = "SELECT sum(free_total) as totalfree FROM `tbl_member user` ";
             $result = mysqli_query($connect, $sql);
             $row = mysqli_fetch_assoc($result);
             ?>
            <span class="text-primary font-weight-bold"><?php echo $row['totalfree'];?></span>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <p class="chart-title">ยอดสินค้าที่ขายวันนี้</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">ประเภทสินค้าที่ขายได้วันนี้</p>
            <div id="bar1-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/chart.php"></script>
    <script>
      <!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
<?php
require('connect.php');
$date = date('Y-m-d');
$sql = "SELECT distinct(tra_name), sum(tra_price) as totalprice FROM transection WHERE tra_date = '$date' GROUP BY tra_name";
$result = mysqli_query($connect, $sql);

$menus = array();
$totalprices = array();

while ($row = mysqli_fetch_assoc($result)) {
    $menus[] = $row['tra_name'];
    $totalprices[] = $row['totalprice'];
}
?>
    <!-- ส่วนที่แสดงกราฟ -->
    <div id="bar-chart"></div>
	
    
    <script>
        var menus = <?php echo json_encode($menus); ?>;
        var totalprices = <?php echo json_encode($totalprices); ?>;
        
        // โค้ด JavaScript
        var barChartOptions = {
            series: [{
                name: 'Total Price',
                data: totalprices
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                },
            },
            colors: [
                "#246dec",
                "#cc3c43",
                "#367952",
                "#f5b74f",
                "#4f35a1"
            ],
            plotOptions: {
                bar: {
                    distributed: true,
                    borderRadius: 4,
                    horizontal: false,
                    columnWidth: '40%',
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: menus
            },
            yaxis: {
                title: {
                    text: "Total Price"
                }
            }
        };

        var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
        barChart.render();
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
<?php
require('connect.php');
$date = date('Y-m-d');
$sql = "SELECT tra_type, SUM(tra_amount) as totalprice FROM transection WHERE tra_date = '$date' GROUP BY tra_type";
$result = mysqli_query($connect, $sql);

$menus = array();
$totalprices = array();

while ($row = mysqli_fetch_assoc($result)) {
    $menus[] = $row['tra_type'];
    $totalprices[] = $row['totalprice'];
}


?>
    <!-- ส่วนที่แสดงกราฟ -->
    <div id="bar-chart"></div>
	
    
    <script>
        var menus = <?php echo json_encode($menus); ?>;
        var totalprices = <?php echo json_encode($totalprices); ?>;
        
        // โค้ด JavaScript
        var barChartOptions = {
            series: [{
                name: 'Total Price',
                data: totalprices
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                },
            },
            colors: [
                "#246dec",
                "#cc3c43",
                "#367952",
                "#f5b74f",
                "#4f35a1"
            ],
            plotOptions: {
                bar: {
                    distributed: true,
                    borderRadius: 4,
                    horizontal: false,
                    columnWidth: '40%',
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                categories: menus
            },
            yaxis: {
                title: {
                    text: "Total Price"
                }
            }
        };

        var barChart = new ApexCharts(document.querySelector("#bar1-chart"), barChartOptions);
        barChart.render();
    </script>
</body>
</html>

    </script>
    

  </body>
</html>