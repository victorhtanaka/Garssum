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
            header("Location: index.php?");
        }
        
    ?>
    <h1>Deletar Usuário</h1>
    <form name="form1" id="form1" method="post" action="users_delete_php.php">
        <input type="hidden" name="hidId" value="<?php echo $id ?>">
        <input type="submit" value="Deletar">
</body>
</html>