<?php 
    include("connection.php");

    session_start();
    $id = $_SESSION["ID_usuario"];

    $sexo = $_POST["sexo"];
    $objetivo = $_POST["objetivo"];
    $peso = $_POST["txtPeso"];
    $altura = $_POST["txtAltura"];
    $atividade = $_POST["atividade"];

    $sql = "UPDATE usuario SET sexo = '$sexo', objetivo = '$objetivo', peso = $peso, altura = $altura, atividade = '$atividade' WHERE ID_usuario = $id";
    $result = $conn->query($sql);

    if ($result === TRUE){
        header('Location: home.php');
    }
    else {
        echo "Algo deu errado...";
    }

?>