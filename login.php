<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/typography.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=New+Amsterdam&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Izzy Archives</title>
</head>

<body>
    <div class="bg_login"></div>
        <div class="container">
            <div class="banner">
                <h2 class="title">Izzy Archives</h2>
                <h3 class="subtitle">Aqui você pode salvar todos seus <br> documentos importantes de forma gratuita!
                </h3>
            </div>
            <div class="login">
                <form method="post">
                    <label for="user">Usuário</label>
                    <input type="text" name="user" id="user" required>
                    <label for="senha">Senha</label>
                    <input type="password" name="password" id="password" required>
                    <button class="btn" type="submit">Entrar</button>
                </form>
                <a href="cadastro_usuario.php" target="_self" rel="noopener noreferrer">Ainda sem conta? Cadastre-se aqui.</a>
            </div>
        </div>
</body>

</html>