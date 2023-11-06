<?php 
    include("connection.php");

    $sexo = $_POST["sexo"];
    $objetivo = $_POST["objetivo"];
    $peso = $_POST["txtPeso"];
    $altura = $_POST["txtAltura"];
    $atividade = $_POST["atividade"];

    $sql = "UPDATE usuario SET sexo = '$sexo', objetivo = '$objetivo', peso = $peso, altura = $altura, atividade = '$atividade'";
    $result = $conn->query($sql);

    if ($result === TRUE){
        session_start();
        header('Location: users_user.php?ID=' . $_SESSION["ID_usuario"]);
    }
    else {
        echo "Algo deu errado...";
    }

?>