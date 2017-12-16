
<?php
include 'func.php';
session_start();  // FECHAR DEPOIS!
$_SESSION['carro']=[];

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
            <?php
    $result=mysqli_query($conn, "SELECT * FROM album");

    if (!$result){
      echo("Descricao do erro: " . mysqli_error($conn));
    }else{
      foreach($result as $linha)  {
        echo "<div class='disc'><img src='".$linha['editora']."'  />'</div>"; //MUDAR DEPOIS SE DER

      }
    }
    ?>

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
=======




?>

<!doctype html>
<html>
<head>
  <title>VYNIL STORE</title>
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
    <?php
    $result=mysqli_query($conn, "SELECT * FROM album");

    if (!$result){
      echo("Descricao do erro: " . mysqli_error($conn));
    }else{
      foreach($result as $linha)  {
        echo "<div class='disc'><img src='".$linha['editora']."'  />'</div>"; //MUDAR DEPOIS SE DER

      }
    }
    ?>
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

    </html>

>>>>>>> 6165f4ec7a8d4dec9914c8eb552e6eb24f6280da
