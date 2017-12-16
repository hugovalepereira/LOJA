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
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <h1>VYNIL STORE - ÁREA DE ADMINISTRADOR</h1>

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

}
 </script>

</body>

</html>
