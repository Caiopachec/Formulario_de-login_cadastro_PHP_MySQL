<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cadastro</title>
</head>
<body>
    <div class="container">
        <form action="cadastro" method="post">
            <div class="grupo_formularios">
                <input type="text" name="nome_completo" placeholder="Nome completo:">
            </div>
            <div class="grupo_formularios">
                <input type="emailc" name="email" placeholder="Email:">
            </div>
            <div class="grupo_formularios">
                <input type="senha" name="senha" placeholder="Senha:">
            </div>
            <div class="grupo_formularios">
                <input type="text" name="repita_senha" placeholder="Digite a senha novamente:">
            </div>
        </form>
    </div>
</body>
</html>