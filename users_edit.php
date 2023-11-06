<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include ("connection.php");

        session_start();
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }

        $id = $_GET["ID"];
        $sql = "SELECT ID_usuario AS id, nome, data_nasc, email, peso, altura FROM usuario WHERE ID_usuario = $id;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row["nome"];
                $nasc = $row["data_nasc"];
                $email = $row["email"];
                $peso = $row["peso"];
                $altura = $row["altura"];
            }
        }
    ?>
    <h1>Editar Usuário</h1>
    <form name="form1" id="form1" method="post" action="users_edit_php.php">
        <b>Nome:</b><br>
        <input type="text" name="txtName" value="<?php echo $name ?>"> <br><br>
        <b>Data de nascimento: (yyyy-mm-dd)</b><br>
        <input type="text" name="txtNasc" value="<?php echo $nasc ?>"><br><br>
        <b>E-Mail:</b><br>
        <input type="email" name="txtEmail" value="<?php echo $email ?>"> <br><br>
        <b>Peso: (kg)</b><br>
        <input type="text" name="txtPeso" value="<?php echo $peso ?>"><br><br>
        <b>Altura: (cm)</b><br>
        <input type="text" name="txtAltura" value="<?php echo $altura ?>"> <br><br>
        <input type="hidden" name="hidId" value="<?php echo $id ?>">
        <input type="submit" value="Confirmar">
</body>
</html>