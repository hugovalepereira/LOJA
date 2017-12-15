<?php
include 'func.php';
session_start();  // FECHAR DEPOIS!
$_SESSION['carro']=[];




?>

<!doctype html>
<html>
<head>
  <title>VYNIL STORE</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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


</body>

</html>
