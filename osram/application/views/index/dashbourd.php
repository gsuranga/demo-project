<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = & get_instance();
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages: ["corechart"]});
    var options, chart;
    google.setOnLoadCallback(function() {
        options = {
            title: 'Brand Wise Sales Total',
            hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}, animation: {
                duration: 10000,
                easing: 'out'
            }
        };
        chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        drawChart();
    });
    function drawChart() {
        $j.getJSON('draw_chart', function(jsn) {
            chart.draw(google.visualization.arrayToDataTable(jsn), options);
        });
    }
    setInterval(drawChart, 15000);
</script>

<table  align="left"  >
    <tr>
        <td id="dbord">
            <div id="chart_div" style="width: 700px; height: 500px;" align="right" ></div>
        </td>
    </tr> 
</table>

