<?php
  $connect = mysqli_connect("localhost","root","","zenata");
?>
<html>
  <head>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['categorie', 'nombre'],
         <?php
         $sql = "SELECT categorie,sum(nombre) as nombre FROM `ts_precedent` group by categorie";
         $fire = mysqli_query($connect,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['categorie']."',".$result['nombre']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Categorie et Pourcentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
        var area_options = {
				title : 'Categorie et Pourcentage',
				legend: 'none'
			};
			var areachart = new google.visualization.AreaChart(document.getElementById('chart2'))
			areachart.draw(data, area_options);
      }
    </script>
    <style>
.flex-container {
  width: 100%;
display: flex;
justify-content: space-evenly;
align-items: flex-start;
}

.flex-container > div {
  background-color: #f1f1f1;
  margin: 10px;
  padding: 20px;
  font-size: 30px;

}
.container_{
      width: 100%;
      display: flex;
      flex-direction: column;
    } 
</style>
  </head>
  <body>
    <div class="container_">

  <div class="flex-container">
    <div id="piechart1" style="width: 450px; height: 250px;"></div>
    <div id="chart2" style="border: 1px solid #ccc"></div>
  </div>
<div>
  
</div>
</div>
  </body>
</html>