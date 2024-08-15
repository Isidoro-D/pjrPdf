<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archive'])) {
    if ($_FILES['archive']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES["archive"]["name"]);
        $archiveFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES['pdf']['type'] == 'application/pdf') {
            echo "O arquivo é um PDF";
        
            if (move_uploaded_file($_FILES["archive"]["tmp_name"])) {
                echo "O arquivo ".basename($_FILES["archive"]["name"])." foi enviado com sucesso.";
            } else {
                echo "Desculpe, houve um erro ao enviar o seu arquivo.";
        }else {
            echo "O arquivo não é um PDF";
        }
    } else {
        echo "Erro no upload: ".$_FILES['archive']['error'];
    }
} else {
    echo "Nenhum arquivo enviado.";
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1; url=index.php">
    <title>Redirecionando...</title>
</head>

<body>
    <p>Redirecionando para página principal...</p>
</body>

</html>