<?php
include("db.php");

$sql = "SELECT * FROM posts_data"; // executa um sql
//$result = $conn->query($sql);
//echo "<pre>";
//print_r($result);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página inicial</title>
  <link rel="stylesheet" href="pico-main/css/pico.min.css">
</head>

<body>
  <header class="header-main container">
    <div class="div-main">
      <h1 style="text-align: center;">Bem-vindo | Sem nome</h1>
      <hr>
    </div>
  </header>
  <main style="" class="container">
    <div class="div-main">
      <h2>Posts</h2>
      <article>

      </article>
    </div>
  </main>
  <footer class="container">
    <p style="text-align: center;">
      Esta é uma página feita em PHP puro, além de HTML e CSS e o framework pico.<br>
      Erros podem e vão acontecer
    </p>

  </footer>

</body>

</html>