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
while($row = $result->fetch_assoc()){
  echo $row['Cat'].$row['Total'];
}
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Kategorie', 'Celkem'],
          <?php
            while ($row = $result->fetch_assoc()) {
            echo "['".$row['Cat']."',".$row['Total']."],";
            };
          ?>
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>



<!-- 

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {'packages':["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cat', 'Total'],
<?php
   // while ($row = $result->fetch_assoc()) {
   //   echo "['".$row['Cat']."',".$row['Total']."],";
   //  };
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
    <div id="donutchart" style="width: 500px; height: 500px;">
    TEST
    </div>
  </body> -->