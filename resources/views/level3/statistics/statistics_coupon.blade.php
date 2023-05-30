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
            ['Date', 'Coupon'],
            ['2013', 1000],
            ['2014', 1170],
            ['2015', 660],
            ['2016', 1030]
        ]);

        var options = {
            title: 'Coupon emessi',
            hAxis: {title: 'Date', titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
</head>
<body>
<!--<nav class="main-nav">
    <a href="index.html" id="logo">
        <img src="../resources/img/YourCoupon Logo.png">
    </a>
    <a class="icon" onclick="openMainNav()">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </a>
    <div class="main-nav-link" id="main-nav-link">
        <a href="index.html" class="nav-link">Home</a>
        <a href="company.html" class="nav-link">Company</a>
        <a href="FAQ.html" class="nav-link">FAQ</a>
        <a href="about.html" class="nav-link">About</a>

    </div>
    <div class="main-nav-link-btn" id="main-nav-link-btn">
        <a id="btn-blue" class="btn btn-blue" role="button" href="../Level-0/login.html">Log in</a>
        <a id="btn-light" class="btn btn-light" role="button" href="../Level-0/registration.html">Sign up</a>
    </div>
</nav>
<nav class="admin-nav">
    <a href="">Company</a>
    <a href="">Staff</a>
    <a href="">User</a>
    <a href="">FAQ</a>
    <a href="">Statistics</a>
</nav>-->
<!-- Area Chart from Google Charts -->
<h1 style="text-align: center; margin-top: 50px;">Statistics</h1>
<section id="coupon-statistics">
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
</section>
<!--<footer>
    <a href="https://github.com/ChristianCurzi/TWeb">
        <div class="github-icon-container">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github"
                 viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
            </svg>
        </div>
    </a>
    <p>&copy; 2023 Copyright: YourCoupon. All rights reserved.</p>
</footer>-->
</body>
