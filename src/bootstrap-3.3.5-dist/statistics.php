<?php
require_once 'Menu.php';

    $menu = new Menu();
    $positive = $menu->fetchAllPositive();
    $negative = $menu->fetchAllNegative();

    $positiveJson = $menu->formatToJsonChart($positive);
    $negativeJson = $menu->formatToJsonChart($negative);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>AV RU</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Example of using CSS only for masonry / isotope style layout with Bootstrap panels." />
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">

    <link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">

    <!-- CSS code from Bootply.com editor -->
    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">


</head>

<body>

<!--template-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container" style="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" style="">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#" class="" style="">Explore</a>

                </li>
                <li><a href="#" class="">Estatísticas</a>

                </li>
                <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Sign in</a>

                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <div class="center-block text-center">
            <h1>Restaurante universitário UFFS</h1>
        </div>

        <div id="chartContainer" style="height: 500px; width: 100%;">

    </div>

    <hr>

        <!--/template-->

        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="application/javascript" src="/js/jquery.canvasjs.min.js"></script>

        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>


        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-40413119-1', 'bootply.com');
            ga('send', 'pageview');
        </script>
        <script type="text/javascript">
            $(function () {
                    var chart = new CanvasJS.Chart("chartContainer", {
                        title:{
                            text: "Avaliaçoes Pratos RU"
                        },
                        animationEnabled: true,
                        axisX :{
                            labelFontSize: 14
                        },
                        axisY :{
                            labelFontSize: 12,
                        },
                        data: [

                            {
                                type: "bar",
                                showInLegend: true,
                                legendText: "Avaliaçoes Positivas",
                                dataPoints: <?php echo $positiveJson; ?>
                            },
                            {
                                type: "bar",
                                showInLegend: true,
                                legendText: "Avaliaçoes Negativas",
                                dataPoints: <?php echo $negativeJson; ?>
                            }

                        ],
                        legend: {
                            cursor:"pointer",
                            itemclick : function(e){
                                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                    e.dataSeries.visible = false;
                                }
                                else{
                                    e.dataSeries.visible = true;
                                }
                                chart.render();
                            }
                        }
                    });

                    chart.render();
                });
    </script>
</body>
</html>
