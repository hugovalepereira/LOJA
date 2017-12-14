
<?php
$nomeErr = $emailErr = $passwordErr = $password_confirmErr = "";
$nome = $email = $password = $password_confirm = "";


//cria ligação à base de dados
$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vinis";
$conn = mysqli_connect($servername, $username, $password, $bd);

if (!$conn){
  die("Erro na ligacao: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

echo "Ligacao estabelecida!<br>";




$resultados = mysqli_query($conn, "select * from admin;");

foreach($resultados as $linha){
  echo "email -> ";
  echo ($linha['email'] . "<br>" . $linha['password'] . "<br>" );
}


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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nome"])) {
      $nomeErr = "nome é um campo obrigatório";
    } else {
      $nome = $_POST["nome"];
    }

    if (empty($_POST["email"])) {
      $emailErr = "email é um campo obrigatório";
    } else {
      $email =$_POST["email"];
    }

    if (empty($_POST["password"])) {
      $passwordErr = "password é um campo obrigatório";
    }

    if (empty($_POST["password_confirm"])) {
      $password_confirmErr = "confirmar password é um campo obrigatório";
    } else {
      if ($_POST["password_confirm"]==$_POST["password"]) {

        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);

      } else{
        $password_confirmErr = "as passwords não coincídem!";

      }

    }
    if($nome!=""&&$email!=""&&$password!=""){
      mysqli_query($conn, "insert into cliente (nome,email,password) values ('$nome', '$email','$password')");
      // DESCOMENTAR LINHA A BAIXO PARA LIGAR O ENVIO DE EMAIL
      $headers = "From: VYNIL STORE <noreply@vynilstore.com>" . "\r\n";
      mail("hvpereira@gmail.com","My subject","funciona!!!!",$headers);
      mysqli_close($conn);
    }

  }


  ?>
  <h1>VYNIL STORE <?php echo $nome;?></h1>

  <h2>LOG IN</h2>
  <form method="post">
    email: <input type="email" placeholder="email" name="email_login"><br>
    password: <input type="password" name="password_login"><br>
    <input type="submit" name="submit_login" value="L O G I N"><br>

  </form>

  <h2>SIGN UP</h2>
  <form method="post">
    nome: <input type='text' name="nome">
    <span class="error"> <?php echo $nomeErr;?></span><br>
    email: <input type="email" name="email">
    <span class="error"> <?php echo $emailErr;?></span><br>
    password: <input type="password" name="password">
    <span class="error"> <?php echo $passwordErr;?></span><br>
    confirm password: <input type="password" name="password_confirm">
    <span class="error"> <?php echo $password_confirmErr;?></span><br>
    <input type="submit" name="submit" value="C O N F I R M"><br>

  </form>



</body>

</html>
