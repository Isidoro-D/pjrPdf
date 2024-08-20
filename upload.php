<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archive'])) {
    if ($_FILES['archive']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["archive"]["name"]);
        $archiveFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (move_uploaded_file($_FILES["archive"]["tmp_name"], $target_file)) {
            echo "<h2>O arquivo " . basename($_FILES["archive"]["name"]) . " foi enviado com sucesso.</h2>";
        } else {
            echo "<h2>Desculpe, houve um erro ao enviar o seu arquivo.</h2>";
        }
    } else {
        //mostra mensagem de um erro específico
        echo "<h2>Erro no upload: </h2>" . $_FILES['archive']['error'];
    }
} else {
    echo "<h2>Nenhum arquivo enviado.</h2>";
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=main_page.php">
    <link rel="stylesheet" href="css/style.css">
    <title>Redirecionando...</title>
</head>

<body>
    <div class="container-load">
        <span class="loader"></span>
        <p>Redirecionando para página principal...</p>
    </div>
</body>

</html>