<?php
$nomeErr = $emailErr = $passwordErr = $password_confirmErr = "";
$nome = $email = $password = $password_confirm = "";

//cria ligação à base de dados
$servername = "localhost";
$username = "root";
$password = "";
$bd = "vinis";
$conn = mysqli_connect($servername, $username, $password, $bd);

if (!$conn){
  die("Erro na ligacao: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");






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
        <link href="https://fonts.googleapis.com/css?family=Bungee|Roboto" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <h1>VYNIL STORE </h1>
            <img src="img/vynil.png" id="vynil">

            <h2>
<<<<<<< HEAD

=======
                <?php echo $nome;?>
>>>>>>> 6165f4ec7a8d4dec9914c8eb552e6eb24f6280da
            </h2>

            <div id="logb">
                <h2>LOG IN</h2>
            </div>
            <div id="logbg"></div>
            <div id="log">
                <form method="post">
                    email: <input type="email" placeholder="email" name="email_login"><br><br> password: <input type="password" name="password_login"><br><br>
                    <input type="submit" name="submit_login" value="L O G I N"><br>

                </form>
            </div>

            <div id="signb">
                <h2>SIGN UP</h2>
            </div>
            <div id="signbg"></div>
            <div id="sign">
                <form method="post">
                    nome: <input type='text' name="nome">
                    <span class="error"> <?php echo $nomeErr;?></span><br><br> email: <input type="email" name="email">
                    <span class="error"> <?php echo $emailErr;?></span><br><br> password: <input type="password" name="password">
                    <span class="error"> <?php echo $passwordErr;?></span><br> confirm password: <input type="password" name="password_confirm">
                    <span class="error"> <?php echo $password_confirmErr;?></span><br><br>
                    <input type="submit" name="submit" value="C O N F I R M"><br>

                </form>
            </div>

            <div id="cntb">
                <h2>CONTACT</h2>
            </div>
            <div id="cnt">
                <p>oneblackholemail@gmail.com</p>
            </div>

            <script>
                $('#logb').click(function() {
                    $('#sign').css("display", "none");
                    $('#cnt').css("display", "none");
                    if ($(window).width() >= 1024) {
                        $('#logbg').animate({
                            top: "180vh",
                        }, 500, function() {
                            $('#log').css("display", "block");
                        });

                        $('#signbg').animate({
                            top: "35vh",
                        }, 250, function() {});
                        $('#cnt').animate({
                            top: "35vh",
                        }, 250, function() {});

                    } else {
                        $('#logbg').animate({
                            top: "80vh",
                        }, 500, function() {
                            $('#log').css("display", "block");
                        });
                        $('#signbg').animate({
                            top: "35vh",
                        }, 250, function() {});
                        $('#cnt').animate({
                            top: "35vh",
                        }, 250, function() {});
                    }
                });

                $('#signb').click(function() {
                    $('#log').css("display", "none");
                    $('#cnt').css("display", "none");
                    if ($(window).width() >= 1024) {
                        $('#signbg').animate({
                            top: "180vh",
                        }, 500, function() {
                            $('#sign').css("display", "block");
                        });
                        $('#logbg').animate({
                            top: "35vh",
                        }, 250, function() {});
                        $('#cnt').animate({
                            top: "35vh",
                        }, 250, function() {});

                    } else {
                        $('#signbg').animate({
                            top: "80vh",
                        }, 500, function() {
                            $('#sign').css("display", "block");
                        });
                        $('#logbg').animate({
                            top: "35vh",
                        }, 250, function() {});
                        $('#cnt').animate({
                            top: "35vh",
                        }, 250, function() {});
                    }
                });

                $('#cntb').click(function() {
                    $('#sign').css("display", "none");
                    $('#log').css("display", "none");
                    if ($(window).width() >= 1024) {
                        $('#cnt').animate({
                            top: "180vh",
                        }, 500, function() {
                            $('#cnt').css("display", "block");
                        });
                        $('#logbg').animate({
                            top: "35vh",
                        }, 250, function() {});
                        $('#signbg').animate({
                            top: "35vh",
                        }, 250, function() {});

                    } else {
                        $('#cnt').animate({
                            top: "80vh",
                        }, 500, function() {
                            $('#cnt').css("display", "block");
                        });
                        $('#logbg').animate({
                            top: "35vh",
                        }, 250, function() {});
                        $('#signbg').animate({
                            top: "35vh",
                        }, 250, function() {});
                    }
                });

            </script>

    </body>

    </html>
