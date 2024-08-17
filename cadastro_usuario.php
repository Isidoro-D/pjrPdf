<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";
    
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tb_usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $senha);
    
    if ($stmt->execute()) {
        echo "Registrado com sucesso";
    } else {
        error_log("Erro na inserção de usuário: " . $stmt->error);
        echo "Erro ao registrar. Por favor, tente novamente.";
    }

    $stmt->close();
    mysqli_close($conn);
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="style_cadastro.css">
    <link rel="stylesheet" href="css/typography.css">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=New+Amsterdam&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2 class="title">Cadastro de Usuário</h2>
    <form method="post">
        <label for="user">Usuário</label>
        <input type="text" id="user" name="user" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php" target="_self" rel="noopener noreferrer">Já possui uma conta? Faça o Login aqui.</a>
</body>
</html>