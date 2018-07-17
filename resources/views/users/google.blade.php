<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["imagelinechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var tmp = JSON.parse('{!! json_encode($graph_data) !!}');
        var data = google.visualization.arrayToDataTable(tmp);
        
        var options = {
          legend: 'none',
          series: {
            0: { color: '#e2431e' },
            1: { color: '#e7711b' },
            2: { color: '#f1ca3a' },
            3: { color: '#6f9654' },
            4: { color: '#1c91c0' },
            5: { color: '#43459d' },
          }
        };
        
        var chart = new google.visualization.ImageLineChart(document.getElementById('chart_div'));
        
        chart.draw(data, {width: 200, height: 200, min: 0});
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 200px; height: 200px;"></div>
  </body>