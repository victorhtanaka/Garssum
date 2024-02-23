<?php 
    include("connection.php");

    session_start();
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }

    $id = $_SESSION["ID_usuario"];
    $name = $_POST["txtName"];
    $foodArrayStr = $_POST["foodArray"];
    $qtdArrayStr = $_POST["qtdArray"];
    $foodArray = explode(',', $foodArrayStr);
    $qtdArray = explode(',', $qtdArrayStr);





    $sql = "INSERT INTO prato (Nome, fk_usuario_ID_usuario) VALUES ('$name', $id)";
    $result = $conn->query($sql);

    $sql2 = "SELECT ID_prato FROM prato WHERE Nome = '$name'";
    $result2 = $conn->query($sql2);

    
    if ($result2->num_rows > 0) {
        $rep = count($foodArray);
        while ($row = $result2->fetch_assoc()) {
            for ($i = 0; $i < $rep; $i++) {
                echo count($foodArray) . " ";
                if ($qtdArray[0] != 0) {
                    $sql3 = "INSERT INTO alimento_prato (fk_alimento_ID_alimento, fk_prato_ID_prato, qtd) VALUES ($foodArray[0], $row[ID_prato], $qtdArray[0])";
                    $result3 = $conn->query($sql3);
                }
                array_shift($foodArray);
                array_shift($qtdArray);
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