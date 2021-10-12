<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['month', 'Sales', 'Expenses','Target'],
          ['2004',  ,      400,800],
          ['2005',  1170,     ,300],
          ['2006',  660,       0,500],
          ['2007',  1030,      540,900]
        ]);

        var options = {
          title: 'marketing activity',
		  colors: ['#000000', '#990000', '#009900', '#000099']
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;">wgwgwgw</div>
  </body>
</html>