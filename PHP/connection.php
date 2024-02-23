<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "PUC@1234";
    $dbname = "garssum";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
    }
    // echo "conectado.";
?>