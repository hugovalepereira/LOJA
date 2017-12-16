<?php
include 'func.php';
session_start();
//print $_SESSION['nome'];
//print $_SESSION['email'];
$album_nome=$album_artista=$album_genero=$album_editora="";
$album_ano=$album_duracao=$album_nMusicas=$album_stock=$album_preco="";
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

  <h1>VYNIL STORE - ÁREA DE ADMINISTRADOR</h1>

  <main class="main">
    <?php
    $result=mysqli_query($conn, "SELECT * FROM album");

    if (!$result){
      echo("Descricao do erro: " . mysqli_error($conn));
    }else{
      foreach($result as $linha)  {
        echo "<div class='disc'><img src='albums/".$linha['editora']."'  /><span>".$linha['nome']."</span></div>";
      }
    }
    ?>
    <div id="add" class='disc' >+ adicionar disco</div>



  </main>

  <div id="edit" class="hide">

  </div>

  <div id="adicionar" class="hide">
    <form method="post">
      NOME DO ÁLBUM: <input type='text' name="nome">
      <br>
      ARTISTA: <input type="text" name="artista">
      <br>
      GÉNERO: <input type="text" name="genero">
      <br>
      IMAGEM: <input type="text" name="editora">
      <br>
      ANO: <input type="number" name="ano">
      <br>
      DURAÇÃO: <input type="number" name="duracao">
      <br>
      Nº MÚSICAS: <input type="number" name="nMusicas">
      <br>
      STOCK: <input type="number" name="stock">
      <br>
      PREÇO: <input type="number" name="preco">
      <br>

      <input type="submit" name="submit" value="C O N F I R M"><br>

    </form>
  </div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST["submit"])){
    if(isset($_POST["nome"]) && isset($_POST["artista"]) && isset($_POST["genero"]) && isset($_POST["editora"]) && isset($_POST["ano"]) && isset($_POST["duracao"]) && isset($_POST["nMusicas"])){
      if(isset($_POST["stock"]) && isset($_POST["preco"])) {
        $album_nome=$_POST["nome"];
        $album_artista=$_POST["artista"];
        $album_genero=$_POST["genero"];
        $album_editora=$_POST["editora"];
        $album_ano=$_POST["ano"];
        $album_duracao=$_POST["duracao"];
        $album_nMusicas=$_POST["nMusicas"];
        $album_stock=$_POST["stock"];
        $album_preco=$_POST["preco"];
        mysqli_query($conn, "INSERT INTO album (nome,artista,genero,editora,ano,duracao,nummusicas,stock,preco) VALUES ('$album_nome','$album_artista','$album_genero','$album_editora',$album_ano,'$album_duracao',$album_nMusicas,$album_stock,$album_preco)");
        header("Refresh:0");
      }
    }

  }

}



 ?>
 <script>
 $( "#add" ).click(function() {
   $("#adicionar").toggleClass( "hide" )
 });



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
