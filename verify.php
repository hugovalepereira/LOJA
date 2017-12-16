<?php
include 'func.php';
?>
<!doctype html>
<html>
<head>
  <title>VYNIL STORE</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <?php

  if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){ // adicionar quando hash existir: AND isset($_GET['hash']) && !empty($_GET['hash']
    $email = $_GET['email'];
    $hash = $_GET['hash']; // adicionar quando hash existir
    $search = mysqli_query($conn,"SELECT email, hash, ativo FROM cliente WHERE email='".$email."' AND hash='".$hash."' AND ativo='0'"); // perceber se isto faz sentido: or die(mysql_error());
    $match  = mysqli_affected_rows($conn);
    if($match > 0){
      // se existir correspondencia atualiza o cliente
      mysqli_query($conn,"UPDATE cliente SET ativo='1' WHERE email='".$email."' AND ativo='0'"); // or die(mysql_error());
      echo '<div>A sua conta foi verificada. Já pode fazer login!</div>';
    }else{
      // URL inválido ou a conta já foi ativada
      echo '<div >Inseriu um URL inválido ou a conta já foi ativada.</div>';
    }
  }else{
    // Acesso à página sem especificação de variáveis
    echo '<div>ERRO! Por favor aceda através do endereço que foi enviado para o seu email</div>';
  }

  mysqli_close($conn);
  ?>

  <a href="http://localhost:8000/">Página Principal</a>

</body>
</html>
