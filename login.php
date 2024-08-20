<?php

session_start();

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM tb_usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome'];

            header("Location: redirect_login.php");
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Email incorreto.";
    }
}
?>

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
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <label for="senha">Senha</label>
                <input type="password" name="senha" required>
                <button class="btn" type="submit" value="Entrar">Entrar</button>
                <a href="cadastro_usuario.php" target="_self" rel="noopener noreferrer">Ainda sem conta? Cadastre-se aqui.</a>
            </form>
        </div>
    </div>
</body>

</html>