<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_archives";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Conexão falhou: ".mysqli_connect_error());
    }
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $verify_password = password_hash($_POST['verify_password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO tb_usuarios (nome, email, senha, confirmacao_senha) VALUES ('$user', '$email', '$password', '$verify_password')";
    if (mysqli_query($conn, $sql)) {
        echo "Registrado com sucesso";
    } else {
        echo "Erro: ".$sql."<br>".mysqli_error($conn);
    }
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
        <input type="password" id="password" name="password" required>
        <label for="verify_password">Confirme sua senha</label>
        <input type="password" id="verify_password" name="verify_password" required>

        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php" target="_self" rel="noopener noreferrer">Já possui uma conta? Faça o Login aqui.</a>
</body>
</html>