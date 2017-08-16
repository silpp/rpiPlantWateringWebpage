<?php
    include "../../db/db.php";
    include "JSdate.php";
    define('TIMEZONE', 'Asia/Bangkok');
    date_default_timezone_set(TIMEZONE);
?>
<html>

    <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        setInterval(drawLightChart, 2000);
        setInterval(drawSoilChart, 2000);
        setInterval(drawDht22Chart, 2000);
        google.charts.load('current', {'packages':['corechart','line']});
        google.charts.setOnLoadCallback(drawLightChart);
        google.charts.setOnLoadCallback(drawSoilChart);
        google.charts.setOnLoadCallback(drawDht22Chart);
        function drawLightChart() {

            var jsonData=$.ajax({
                url:"getLightData.php",
                dataType:"json",
                async:false
            }).responseText;

            //alert(jsonData);
            var data = new google.visualization.DataTable(jsonData);
            var options = {
                chart: {
                    title: 'Light from LDR',
                    subtitle: 'in percentage'
                },
                width: 900,
                height: 500,
               
            };

            //var chart = new google.charts.Line(document.getElementById('Light_chart_div'));
            //chart.draw(data, google.charts.Line.convertOptions(options));
            var chart = new google.visualization.LineChart(document.getElementById('Light_chart_div'));
            chart.draw(data, options);
        }
        function drawSoilChart() {

            var jsonData=$.ajax({
                url:"getSoilData.php",
                dataType:"json",
                async:false
            }).responseText;

            //alert(jsonData);
            var data = new google.visualization.DataTable(jsonData);
            var options = {
                chart: {
                    title: 'Light from LDR',
                    subtitle: 'in percentage'
                },
                width: 900,
                height: 500,
               
            };

          //var chart = new google.charts.Line(document.getElementById('line_top_x'));
          //chart.draw(data, google.charts.Line.convertOptions(options));
            var chart = new google.visualization.LineChart(document.getElementById('Soil_chart_div'));
            chart.draw(data, options);
        }
        function drawDht22Chart() {

            var jsonData=$.ajax({
                url:"getDht22Data.php",
                dataType:"json",
                async:false
            }).responseText;

            //alert(jsonData);
            var data = new google.visualization.DataTable(jsonData);
            var options = {
                chart: {
                    title: 'Light from LDR',
                    subtitle: 'in percentage'
                    
                },
                vAxes: {0: {},
                        1: {}
                        },
                series: {   0:  {targetAxisIndex:0},
                            1:  {targetAxisIndex:1}
                        },
                width: 900,
                height: 500,
               
            };

          //var chart = new google.charts.Line(document.getElementById('line_top_x'));
          //chart.draw(data, google.charts.Line.convertOptions(options));
            var chart = new google.visualization.LineChart(document.getElementById('DHT22_chart_div'));
            chart.draw(data, options);
        }
    </script>
    </head>
    <body>
        <div id="Light_chart_div"></div>
        <div id="Soil_chart_div"></div>
        <div id="DHT22_chart_div"></div>
    </body>
</html>
