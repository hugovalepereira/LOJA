<?php
include 'func.php';
session_start();  // FECHAR DEPOIS!
$_SESSION['carro']=[];

$img=$nomedisco=$nomeartista="";
$hide="hide";

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
    <form id="f" class="hide" method="post">

      password: <input type="text" name="what"><br><br>
      <input type="submit" name="search" value="S E A R C H"><br>

    </form>
  </div>

  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["search"])){
      if($_POST["what"] != ""){
      $s=mysqli_query($conn, "SELECT * FROM album WHERE nome='".$_POST["what"]."'");

      if (!$s){
        echo "sem resultados";

      }else{
        foreach($s as $linha)  {

          $img=$linha["editora"];
          $nomedisco=$linha["nome"];
          $nomeartista=$linha["artista"];
          $hide="";
        }
      }

}
    }
  }
  ?>
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
        echo "<div class='disc'><img src='albums/".$linha['editora']."'  /><span>".$linha['nome']."</span></div>"; //MUDAR DEPOIS SE DER

      }
    }
    ?>
  </main>


  <div id="view" class="<?php echo $hide?>">
    <img src="albums/<?php echo $img ?>" />
    <h3> <?php echo $nomedisco ?></h3>
    <h3> <?php echo $nomeartista ?></h3>
    <a href="shop.php">&times</a>
  </div>

  <script>
  var x, y;
  x = true;
  y = true;

  $('#l-icon').click(function() {
    if (x === true) {
      $('#leftsb').animate({
        width: "600px",
      }, 500, function() {

      });


      $('#l-icon').animate({
        left: "240px",
      }, 500, function() {
        x = false;
        $('#f').toggleClass('hide');
      });

      $('#rightsb').animate({
        width: "100px",
      }, 500, function() {});


      $('#r-icon').animate({
        right: "0",
      }, 500, function() {
        y = true;
      });

    } else if (x === false) {

      $('#leftsb').animate({
        width: "100px",
      }, 500, function() {});

$('#f').toggleClass('hide');
      $('#l-icon').animate({
        left: "0",
      }, 500, function() {
        x = true;

      });

    }
  });


  $('#r-icon').click(function() {
    if (y === true) {
      $('#rightsb').animate({
        width: "600px",
      }, 500, function() {

      });


      $('#r-icon').animate({
        right: "240px",
      }, 500, function() {
        y = false;
      });

      $('#leftsb').animate({
        width: "100px",
      }, 500, function() {});


      $('#l-icon').animate({
        left: "0",
      }, 500, function() {
        x = true;

      });



    } else if (y === false) {

      $('#rightsb').animate({
        width: "100px",
      }, 500, function() {});


      $('#r-icon').animate({
        right: "0",
      }, 500, function() {
        y = true;
      });

    }
  });

  </script>


</body>

</html>
