<?php
session_start();
if (isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel</title>
</head>

<body>
    <div class="container">
        <h2 class="title">Bem-Vindo, <?php echo htmlspecialchars($_SESSION['usuario_name'])?>!</h2>
        <p>Você está logado.</p>
        <a href="logout.php">Sair</a>
    </div>
</body>

</html>