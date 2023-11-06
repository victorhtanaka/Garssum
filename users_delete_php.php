<?php 
    include("connection.php");

    session_start();
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }

    $id = $_POST["hidId"];

    $sql = "DELETE FROM usuario WHERE ID_usuario = $id";
    $result = $conn->query($sql);

    if ($result === TRUE){
        header("Location: users_lst.php");
    }
    else {
        echo "Algo deu errado...";
    }

?>