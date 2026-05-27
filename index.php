<?php
require("db.php");

$sql = "SELECT * FROM posts_data"; // executa um sql
//$result = $conn->query($sql);
//echo "<pre>";
//print_r($result);

if (!empty($_POST['user_Data']) && !empty($_POST['text_Data'])) {
  $user_Data = $_POST['user_Data'];
  $text_Data = $_POST['text_Data'];

  $store_Data = $conn->prepare("INSERT INTO posts_data (user_Data, text_Data) VALUES (?, ?)");
  $store_Data->bind_param("ss", $user_Data, $text_Data);
  $store_Data->execute();
  echo "Dados armazenados com sucesso!";
}





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
    <div class="div-form">
      <form action="" method="post">
        <label for="user_Data"></label>
        <input type="text" name="user_Data" placeholder="Digite seu nome" id="user_Data">

        <label for="text_Data"></label>
        <textarea name="text_Data" id="text_Data"></textarea>

        <input type="submit" value="Enviar">
      </form>

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