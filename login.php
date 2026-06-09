<?php
require("db.php");
session_start(); // Inicia a sessão para armazenar informações do usuário

$serverHttpMethod = $_SERVER['REQUEST_METHOD']; // Obtém o método HTTP da requisição (GET, POST, etc.)

if ($serverHttpMethod === 'POST') { // Verifica se o método HTTP é POST, indicando que o formulário foi enviado
  $username = $_POST['username']; // Obtém o valor do campo "username" do formulário usando a super global $_POST
  $password = $_POST['password']; // Obtém o valor do campo "password" do formulário usando a super global $_POST
  $colordata = $_POST['colordata']; // Obtém o valor do campo "colordata" do formulário usando a super global $_POST

  $storeUserData = $conn->prepare("INSERT INTO users_data (user_Name_Data, password, 	user_Color_Data) VALUES (?, ?, ?)"); // Prepara a consulta SQL para inserção de dados na tabela "users_data"
  $storeUserData->bind_param("sss", $username, $password, $colordata); // Trata os dados para evitar SQL Injection tratando todos os dados como strings (sss)
  $storeUserData->execute(); // Executa a consulta para armazenar os dados no banco de dados

  if ($storeUserData->affected_rows > 0) { // Verifica se a inserção foi bem-sucedida verificando o número de linhas afetadas

    $_SESSION['username'] = $username; // Armazena o nome de usuário na sessão para uso posterior
    $_SESSION['colordata'] = $colordata; // Armazena a cor do tema na sessão para uso posterior


    header("Location: index.php?username=" . urlencode($username)); // Redireciona para a página "index.php" passando o nome de usuário como parâmetro na URL
    exit(); // Encerra a execução do script após o redirecionamento
  } else {
    echo "<p style='color:red'>Erro ao criar usuário. Por favor, tente novamente.</p>"; // Exibe uma mensagem de erro caso a inserção falhe
  }
}





?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>
  <h1>Faça login com um usuario existente ou simplesmente um novo será criado</h1>
  <form action="" method="post">

    <label for="username">Usuário:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" required>

    <label for="colordata">Escolha uma cor para seu tema no site:</label>
    <input type="text" name="colordata" id="colordata" maxlength="7" placeholder="Digite a cor do tema (ex: #ff0000)">

    <input type="submit" value="Entrar">


  </form>
</body>

</html>