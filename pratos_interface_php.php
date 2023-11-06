<?php 
    include("connection.php");

    session_start();
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }

    $name = $_POST["txtName"];
    $foodArrayStr = $_POST["foodArray"];
    $foodArray = array_map('intval', explode(',', $foodArrayStr));

    $sql = "INSERT INTO prato (Nome) VALUES ('$name')";
    $result = $conn->query($sql);

    $sql2 = "SELECT ID_prato FROM prato WHERE Nome = '$name'";
    $result2 = $conn->query($sql2);

    
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            for ($i = 0; $i < count($foodArray); $i++) {
                echo $foodArray;
                $sql3 = "INSERT INTO alimento_prato (fk_alimento_ID_alimento, fk_prato_ID_prato) VALUES ($foodArray[$i], $row[ID_prato])";
                $result3 = $conn->query($sql3);
            }
        }
    }
    if ($result === TRUE){
        ?>
        <script>
        alert("Prato cadastrado");
        history.go(-1);
        </script>
        <?php
    }
    else {
        echo "Algo deu errado...";
    }
?>