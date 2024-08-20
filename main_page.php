<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";

    $arquivo = $_POST['archive'];

    $stmt = $conn->prepare("INSERT INTO tb_arquivos (arquivo) VALUES (?)");
    $stmt->bind_param("s", $arquivo);

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
    <link rel="stylesheet" href="css/style_upload.css">
    <title>Painel</title>
</head>

<body>
    <div class="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="arquivos">
                <input type="file" name="archive" accept="application/pdf">
                <p>Selecione o arquivo aqui</p>
            </div> 
            <button type="submit">Enviar arquivo</button>
        </form>
        <a href="logout.php">Sair</a>
        <div class="gallery">
            <?php
                $file = glob("uploads/*.*");
                foreach ($file as $file) {
                    echo '<embed src="' . $file .'" type="application/pdf" width="100%" height="100%">';
                }
            ?>
        </div>
    </div>
</body>

</html>