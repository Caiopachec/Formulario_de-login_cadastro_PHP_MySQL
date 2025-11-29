<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])){
            $nome_completo = $_POST["nome_completo"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $repita_senha = $_POST["repita_senha"];

            $passwordHash = password_hash($senha, PASSWORD_DEFAULT);


            $errors = array();

            if (empty($nome_completo) OR empty($nome_completo) OR empty($email) OR empty($senha) OR empty($repita_senha)) {
             array_push($errors,"Todos os campos são obrigatórios");  
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              array_push($errors, "Email invalido");  # code...
            }
            if (strlen($senha)<8) {
                array_push($errors, "Senha deve ter pelo menos 8 caracteres");
            }
            if ($senha!==$repita_senha) {
                array_push($errors,"Senhas diferentes");
            }
            require_once "database.php";
            $sql = "SELECT * FROM usuario WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount>0){
                array_push($errors,"Este e-mail já existe!");
            }
            if (count($errors)>0) {
                foreach ($errors as $erro) {
                    echo "<div class='alert alert-danger'>$erro</div>";
                }
            }else{
                
                $sql = "INSERT INTO usuário (nome_completo, email, senha) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"sss",$nome_completo, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Você foi cadastrado com sucesso.</div>";
                }else{
                   die("Algo deu errado"); 
                }
            }

        }
        ?>
        <form action="cadastro.php" method="post">
            <div class="grupo_formularios">
                <input type="text" class="form-control" name="nome_completo" placeholder="Nome completo:">
            </div>
            <div class="grupo_formularios">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="grupo_formularios">
                <input type="password" class="form-control" name="senha" placeholder="Senha:">
            </div>
            <div class="grupo_formularios">
                <input type="text" class="form-control" name="repita_senha" placeholder="Digite a senha novamente:">
            </div>
            <div class="botao">
                <input type="submit" class="btn btn-primary" value="registrar" name="submit">
            </div>
        </form>
    </div>
</body>
</html>