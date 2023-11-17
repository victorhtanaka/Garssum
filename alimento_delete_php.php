<?php 
    include("connection.php");

    session_start();
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }

    $id = $_POST["idAlimento"];

    $sql = "DELETE FROM alimento WHERE ID_alimento = $id";
    $result = $conn->query($sql);

    if ($result === TRUE){
        ?>
        <script>
            alert("Alimento deletado com sucesso")
            window.location = "alimento_list.php";
        </script>
        <?php
    }
    else {
        echo "Algo deu errado...";
    }

?>