<?php
  $conn = new mysqli("127.0.0.1","root", "", "finance");
  $sql = "SELECT cash_Date,cash_Value FROM allcash2 ORDER BY cash_Id ASC";
  $result = $conn->query($sql);
  var_dump($result);
?>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'value'],
          ['2021-03-23',  1000],
<?php 
  while($row = $result->fetch_assoc()){
    echo "[" . $row['cash_Date']. "," . $row['cash_Value'] . "],";
}
?>

        ]);

        var options = {
          title: 'Line chart for all users',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="line_chart" style="width: 900px; height: 500px"></div>
  </body>
  
