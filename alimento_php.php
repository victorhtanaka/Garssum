<?php
    include("connection.php");

    session_start();
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }
    $id = $_SESSION["ID_usuario"];


    $nome = $_POST['nome'];
    $proteinas = $_POST['proteinas'];
    $gorduras = $_POST['gorduras'];
    $carboidratos = $_POST['carboidratos'];
    $porcao = $_POST['porcao'];
    $kcal = $_POST['kcal'];

    $kcal = $kcal / $porcao;
    $proteinas = $proteinas / $porcao;
    $gorduras = $gorduras / $porcao;
    $carboidratos = $carboidratos / $porcao;

    $image_data = addslashes(file_get_contents($_FILES["Imagem"]["tmp_name"]));

    $sql = "INSERT INTO alimento (nome, fk_usuario_ID_usuario, proteinas, gorduras, carboidratos, porcao, kcal, img) VALUES ('$nome', $id, $proteinas, $gorduras, $carboidratos, $porcao, $kcal, '$image_data')";
    $result = $conn->query($sql);

    if ($result === TRUE){
        ?>
        <script>
        alert("Alimento cadastrado");
        window.location = "alimento_list.php";
        </script>
        <?php
    }

?>