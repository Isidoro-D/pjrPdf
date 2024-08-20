<?php
session_start();
if (isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="refresh" content="2; url=main_page.php">
    <link rel="stylesheet" href="css/style.css">
    <title>Bem-Vindo</title>
</head>

<body>
    <div class="container">
        <h2 class="title">Bem-Vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome'])?>!</h2>
        <span class="loader"></span>
        <p>Um momento, estamos conectando...</p>
    </div>
</body>

</html>