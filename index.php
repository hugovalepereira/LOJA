
<?php
include 'func.php';

$nomeErr = $emailErr = $passwordErr = $password_confirmErr = $email_loginErr= $password_loginErr="";
$nome = $email = $password = $password_confirm = $email_login = $password_login="";
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

  //SIGN UP
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["submit"])){ // CLICANDO NO BOTAO DE SIGN UP

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
        $hash = md5( rand(0,1000) );

        mysqli_query($conn, "insert into cliente (nome,email,password,hash) values ('$nome', '$email','$password','$hash')");

        $to      = $email;
        $subject = 'Signup | Verifição'; // Give the email a subject
        $message = '

        A sua conta foi já foi criada.
        Por favor utilize o link abaixo para confirmar e começar a utilizar.

        ------------------------
        Email de login: '.$nome.'
        ------------------------

        Please click this link to activate your account:
        http://localhost:8000/verify.php?email='.$email.'&hash='.$hash.'

        ';  // endereço devia ter uma hash mas isso necesita alterações da base de dados




        // DESCOMENTAR LINHA A BAIXO PARA LIGAR O ENVIO DE EMAIL
        $headers = "From: VYNIL STORE <noreply@vynilstore.com>" . "\r\n";
        mail("oneblackholemail@gmail.com",$subject,$message,$headers);
        //mail($to, $subject, $message, $headers); // Send our email

      }

    } elseif (isset($_POST["submit_login"])){ // CLICANDO NO BOTAO DE LOGIN

      if (empty($_POST["email_login"])) {
        $email_loginErr = "email é um campo obrigatório";
      } else {
        $email_login = $_POST["email_login"];
      }

      if (empty($_POST["password_login"])) {
        $password_loginErr = "introduza a sua password";
      } else {
        $password_login =$_POST["password_login"];
      }


      if($email_login!=""&&$password_login!=""){
        $resultA=mysqli_query($conn, "SELECT nome, email, password, ativo FROM admin WHERE email='".$email_login."' AND password='".$password_login."' AND ativo='1'");

        $matchA = mysqli_affected_rows($conn);
        $res = mysqli_fetch_all($resultA, MYSQLI_ASSOC);

        if($matchA > 0){
          echo "ADMINISTRADOR";
          session_start();
          $_SESSION['tipo'] = "admin";
          $_SESSION['nome'] = $res[0]['nome'];
          $_SESSION['email'] = $res[0]['email'];
          header("Location:admin.php");
          mysqli_close($conn);
          exit();

        }else{
          $resultC=mysqli_query($conn, "SELECT nome, email, password, ativo FROM cliente WHERE email='".$email_login."' AND ativo='1'");
          $matchC = mysqli_affected_rows($conn);
          if($matchC > 0){
            foreach($resultC as $linha){
              if (password_verify($password_login, $linha['password'])) {

                echo "CLIENTE";
                session_start();   // IMPLEMENTAR SISTAMA DE CHAVE ENCRIPTADA COMO NA HASH PARA A SESSAO

                $_SESSION['tipo'] = "cliente";
                $_SESSION['nome'] = $linha['nome'];
                $_SESSION['email'] = $linha['email'];
                header("Location:shop.php");
                mysqli_close($conn);
                exit();
              } else {
                echo "password errada";
              }
            }
          }else {
            //Invalid password
            echo "password errada";
          }

        }

      }


    }



  }
  ?>

  <h1>VYNIL STORE</h1>

  <h2>LOG IN</h2>
  <form method="post" >
    email: <input type="email" placeholder="email" name="email_login">
    <span class="error"> <?php echo $email_loginErr;?></span><br>
    password: <input type="password" name="password_login">
    <span class="error"> <?php echo $password_loginErr;?></span><br>
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
