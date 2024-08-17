<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_archives";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexão falhou: ".mysqli_connect_error());
}
?>