<?php
include 'func.php';
session_start();  // FECHAR DEPOIS!
$_SESSION['carro']=[];
?>

    <!doctype html>
    <html>

    <head>
        <title>STORE</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Bungee|Roboto" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="shop.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>

        <div class="sidebars" id="leftsb">
           <div id="lb"><i class="fa fa-align-justify fa-4x" aria-hidden="true" id="l-icon"></i></div>
        </div>

        <div class="sidebars" id="rightsb">
            <div id="rb"><i class="fa fa-user-circle fa-4x" aria-hidden="true" id="r-icon"></i></div>
        </div>

        <h1>VYNIL STORE - SHOP</h1>

        <main class="main">
            <div class="disc"><img src="img/albums/bc.jpg">
                <span>At Least for Now</span>
            </div>
            <div class="disc"><img src="img/albums/bbng.jpg">
                <span>At Least for Now</span>
            </div>
            <div class="disc"><img src="img/albums/qotsa.jpg">
                <span>At Least for Now</span>
            </div>
            <div class="disc"><img src="img/albums/prod.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/pluto.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/ornv.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/ornv2.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/bc2.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/bbng.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/qotsa2.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/bbng2.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/kdlm.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/strks.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/rgwtt.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/altj.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/led2.jpg">
                <span>At Least for Now</span></div>
            <div class="disc"><img src="img/albums/strks2.jpg">
                <span>At Least for Now</span></div>

        </main>

        <script>
            $('#l-icon').click(function() {
                        $('#leftsb').animate({
                                width: "600px",
                            }, 500, function() {
                                });


                            $('#l-icon').animate({
                                left: "240px",
                            }, 500, function() {

                            });

                        });
            
            $('#r-icon').click(function() {
                        $('#rightsb').animate({
                                width: "600px",
                            }, 500, function() {
                                });


                            $('#r-icon').animate({
                                right: "240px",
                            }, 500, function() {

                            });

                        });

        </script>

    </body>

    </html>
