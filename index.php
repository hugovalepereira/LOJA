
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
        mysqli_query($conn, "insert into cliente (nome,email,password) values ('$nome', '$email','$password')");
        $to      = $email;
        $subject = 'Signup | Verification'; // Give the email a subject
        $message = '

        Thanks for signing up!
        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

        ------------------------
        Username: '.$nome.'
        Password: '.$password.'
        ------------------------

        Please click this link to activate your account:
        http://localhost:8000/verify.php?email='.$email.'

        ';  // endereço devia ter uma hash mas isso necesita alterações da base de dados




        // DESCOMENTAR LINHA A BAIXO PARA LIGAR O ENVIO DE EMAIL
        $headers = "From: VYNIL STORE <noreply@vynilstore.com>" . "\r\n";
        mail("oneblackholemail@gmail.com",$subject,$message,$headers);
        //mail($to, $subject, $message, $headers); // Send our email
        mysqli_close($conn);
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
        $result=mysqli_query($conn, "SELECT email, password, ativo FROM cliente WHERE email='".$email_login."' AND ativo='1'");
        foreach($result as $linha){
          if (password_verify($password_login, $linha['password'])) {
            echo 'Password is valid!';
          } else {
            echo 'Invalid password.';
          }

        }

      }



    }
  }





  ?>
  <h1>VYNIL STORE <?php echo $nome;?></h1>

  <h2>LOG IN</h2>
  <form method="post">
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
