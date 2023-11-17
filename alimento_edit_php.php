<?php
    include("connection.php");

    session_start();
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }
    $id = $_SESSION["ID_usuario"];

    $idAlimento = $_POST['idAlimento'];
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

    $sql = "UPDATE alimento SET nome = '$nome', proteinas = $proteinas, gorduras = $gorduras, carboidratos = $carboidratos, porcao = $porcao, kcal = $kcal, img = '$image_data' WHERE ID_alimento = $idAlimento";
    $result = $conn->query($sql);

    if ($result === TRUE){
        ?>
        <script>
        alert("Alimento alterado com sucesso");
        window.location.href = "alimento_list.php";
        </script>
        <?php
    }

?>