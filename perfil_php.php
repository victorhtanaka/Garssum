<?php 
    include("connection.php");

    $id = $_GET["ID"];

    $name = $_POST["name"];
    $bio = $_POST["bio"];

    $sql = "UPDATE usuario SET nome = '$name', bio = '$bio' WHERE ID_usuario = $id";
    $result = $conn->query($sql);

    if ($result === TRUE){
        session_start();
        header('Location: perfil.php?ID=' . $_SESSION["ID_usuario"]);
    }
    else {
        echo "Algo deu errado...";
    }

?>