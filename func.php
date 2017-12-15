<?php
$nomeErr = $emailErr = $passwordErr = $password_confirmErr = $email_loginErr= $password_loginErr="";
$nome = $email = $password = $password_confirm = $email_login = $password_login="";


//cria ligação à base de dados
$servername = "localhost";
$username = "root";
$pass = "root";
$bd = "vinis";
$conn = mysqli_connect($servername, $username, $pass, $bd);

if (!$conn){
  die("Erro na ligacao: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

error_log("Ligacao estabelecida!");



// $resultados = mysqli_query($conn, "select * from admin;");
//
// foreach($resultados as $linha){
//   echo "email -> ";
//   echo ($linha['email'] . "<br>" . $linha['password'] . "<br>" );
// }
?>
