<?php
$conn = new mysqli("127.0.0.1","root", "", "finance");
$sql = "SELECT 
CASE WHEN pt.type_Name = 'Private' OR 'Shared' THEN 'Expense' ELSE pt.type_Name END AS Cat
,ABS(SUM(c.cash_Value)) AS Total
FROM allcash2 c
RIGHT JOIN purchase_type pt ON c.type_Id = pt.type_Id
GROUP BY
CASE WHEN pt.type_Name IN( 'Private','Shared') THEN 'Expense' ELSE pt.type_Name END";
$result = $conn->query($sql);
//var_dump($result);
?>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {'packages':["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cat', 'Total'],
<?php
  if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "['".$row['Cat']."', '" .$row['Total']."'],";
    }
  }else {
    echo "No data or error idfk";
  };
?>
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 500px; height: 500px;"></div>
  </body>