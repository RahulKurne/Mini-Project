<?php
include "connection.php";
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['id', 'setord'],
          <?php
          $query="SELECT * from u_ord GROUP BY dmy";
          $dt=mysqli_query($con,$query);
          $total=mysqli_num_rows($dt);
          if ($total!=0)
           {

  
             while ($result=mysqli_fetch_assoc($dt))
              {   
             echo "['".$result['dmy']."',".$result['setord']."],";
      
    
              }
  
            }
          ?>


          // ['Work',     11],
          // ['Eat',      2],
          // ['Commute',  2],
          // ['Watch TV', 2],
          // ['Sleep',    7]
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
