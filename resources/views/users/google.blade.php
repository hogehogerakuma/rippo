<html>
  <head>
    <style>
   @import url('https://fonts.googleapis.com/css?family=Gaegu|Lobster|Lobster+Two|Merienda');
  </style>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {
        var tmp = JSON.parse('{!! json_encode($graph_data) !!}');
        var data = google.visualization.arrayToDataTable(tmp);
        
        var options = {
        
          chartArea: { width: 600 , height:400},
          // curveType: 'function',
          lineWidth: 8,
          series: {
            0: { lineDashStyle: [1, 1] },
            1: { lineDashStyle: [2, 2] },
            2: { lineDashStyle: [4, 4] },
            3: { lineDashStyle: [5, 1, 3] },
            4: { lineDashStyle: [4, 1] },
            5: { lineDashStyle: [10, 2] },
            6: { lineDashStyle: [14, 2, 7, 2] },
            7: { lineDashStyle: [14, 2, 2, 7] },
            8: { lineDashStyle: [2, 2, 20, 2, 20, 2] },
           curveType: 'function',
          legend: { position: 'bottom' }
          } 
        };
        
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="position: relative; width: 900px; height: 500px"></div>
  </body>