<?php



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

error_log("Ligacao estabelecida!",0);




?>
