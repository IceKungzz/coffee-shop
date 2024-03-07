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
