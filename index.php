<?php
require("db.php");


if (!empty($_POST['user_Data']) && !empty($_POST['text_Data'])) { // Verifica se os campos estão preenchidos
  $user_Data = $_POST['user_Data']; // Usar as super globais $_POST para obter os dados do formulário
  $text_Data = $_POST['text_Data'];

  $store_Data = $conn->prepare("INSERT INTO posts_data (user_Data, text_Data) VALUES (?, ?)"); // Prepara a consulta SQL para inserção de dados
  $store_Data->bind_param("ss", $user_Data, $text_Data); // Trata os dados para evitar SQL Injection tratando todos os dados como strings (ss)
  $store_Data->execute(); // Executa a consulta para armazenar os dados no banco de dados
} else {
  echo "<p 
  style='color:red'

  >
  Por favor, preencha todos os campos.
  </p>";
}

$sqlallUsers = "SELECT * FROM posts_data"; // Consulta SQL para selecionar todos os dados da tabela posts_data

$allUsersResult = $conn->query($sqlallUsers); // Executa a consulta e armazena o resultado



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
      <article class="posts-container">
        <div class="posts-sub-container">
          <?php
          while ($user_Data = mysqli_fetch_assoc($allUsersResult)) {
            echo "<div class='post-card'>";
            echo "<h2>" . $user_Data['user_Data'] . "</h2>";
            echo "<p>" . $user_Data['text_Data'] . "</p>";
            echo "<p style='font-size: 0.8em; color: gray;'>Postado em: " . $user_Data['date_Data'] . "</p>";
            echo "</div>";
            echo "<hr>";
          }



          ?>
        </div>
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