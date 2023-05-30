<script>
    $(window).resize(function () {
        drawChart();
    });
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Promozioni'],
            ['2013', 1000],
            ['2014', 1170],
            ['2015', 660],
            ['2016', 1030]
        ]);

        var options = {
            title: 'Promozioni Emesse',
            hAxis: {title: 'Date', titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
</head>
<body>
<h1 style="text-align: center; margin-top: 50px;">Statistics</h1>
<section id="coupon-statistics">
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
</section>
