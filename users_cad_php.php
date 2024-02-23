<?php 
    include("connection.php");

    $name = $_POST["txtName"];
    $nasc_date = $_POST["txtNasc"];
    $email = $_POST["txtEmail"];
    $senha = $_POST["txtSenha"];
    $sql = "INSERT INTO usuario (nome, data_nasc, email, senha) VALUES('$name','$nasc_date','$email', '$senha')";
    $result = $conn->query($sql);

    $sql2 = "SELECT ID_usuario FROM usuario WHERE email = '$email'";
    $result2 = $conn->query($sql2);

    if ($result === TRUE){
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                session_start();
                $_SESSION["ID_usuario"] = $row["ID_usuario"];
                header("Location: obrigado.php");
            }}
    }
    else {
        echo "Algo deu errado...";
    }

?>