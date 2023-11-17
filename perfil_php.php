<?php 
    include("connection.php");

    session_start();
    
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }
    $id = $_SESSION["ID_usuario"];

    $name = $_POST["name"];
    $bio = $_POST["bio"];

    
    $img_banner = addslashes(file_get_contents($_FILES["img_banner"]["tmp_name"]));
    $img_perfil = addslashes(file_get_contents($_FILES["Imagem"]["tmp_name"]));


    $sql = "UPDATE usuario SET nome = '$name', bio = '$bio', img = '$img_perfil', banner_img = '$img_banner' WHERE ID_usuario = $id";
    $result = $conn->query($sql);

    if ($result === TRUE){
        header('Location: perfil.php');
    }
    else {
        echo "Algo deu errado...";
    }

?>