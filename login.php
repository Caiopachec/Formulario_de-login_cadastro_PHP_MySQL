
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="container">
        <?php
if (isset($_POST["Entrar"])) {

    $email = $_POST["email"];
    $password = $_POST["senha"];

    require_once "database.php";

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user) {

        if (password_verify($password, $user["senha"])) {
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: index.php");
            exit();

        } else {
            echo "<div class='alert alert-danger'>Senha incorreta</div>";
        }

    } else {
        echo "<div class='alert alert-danger'>Este e-mail não existe</div>";
    }

}
?>


        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Digite o e-mail" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="senha" placeholder="Digite a senha" class="form-control" required>
            </div>
            <div class="form-btn">
                <input type="submit" value="login" name="Entrar" class="btn btn-primary">
            </div>
        </form>
        <div><p>Ainda não tem uma conta?<a href="cadastro.php">Cadastre-se aqui</a></p></div>
    </div>
</body>
</html>
