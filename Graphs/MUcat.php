<?php
$sql = "SELECT COUNT(p.cat_Id) AS Celkem, p.cat_Name AS Nazev FROM allcash2 c RIGHT JOIN pur_cat p ON c.cat_Id = p.cat_Id WHERE p.cat_Id < 9 GROUP BY c.cat_Id";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
  echo $row['Celkem'].$row['Nazev'];
}

?>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {'packages':["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Nazev', 'Celkem'],
<?php
  if($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "['".$row['Nazev']."',".$row['Celkem']."],";
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