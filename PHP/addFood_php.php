<?php
    include("connection.php");


    $nome = $_POST['nome'];
    $ID_usuario = $_POST['id_user'];
    $proteinas = $_POST['proteinas'];
    $gorduras = $_POST['gorduras'];
    $carboidratos = $_POST['carboidratos'];
    $porcao = $_POST['porcao'];
    $kcal = $_POST['kcal'];

    $kcal = $kcal / $porcao;
    $proteinas = $proteinas / $porcao;
    $gorduras = $gorduras / $porcao;
    $carboidratos = $carboidratos / $porcao;

    $image_name = $_FILES["file"]["name"];
    $image_data = file_get_contents($_FILES["file"]["tmp_name"]);
    
    $stmt = $conn->prepare("INSERT INTO alimento (nome, fk_usuario_ID_usuario, proteinas, gorduras, carboidratos, kcal, porcao, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siddddis", $nome, $ID_usuario, $proteinas, $gorduras, $carboidratos, $kcal, $porcao, $image_data);
    $stmt->execute();
    $stmt->close();

?>