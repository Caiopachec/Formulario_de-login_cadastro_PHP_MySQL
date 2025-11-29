<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela do usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <div class="container">
        <h1>Seja Bem vindo!!</h1>
        <a href="logout.php" class = "btn btn-warning">Voltar</a>
    </div>
</body>

</html>