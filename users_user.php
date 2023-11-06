<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("connection.php");

        session_start();
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }
        
        $id = $_GET["ID"];
        $sql = "SELECT nome, DATE_FORMAT(data_nasc, '%d/%m/%Y') AS 'nasc_date', papel FROM usuario WHERE ID_usuario = $id";
        $result = $conn->query($sql);

        
        $user_id = $_SESSION["ID_usuario"];
        $sqlAdm = "SELECT papel FROM usuario WHERE ID_usuario = $user_id";
        $resultAdm = $conn->query($sqlAdm);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: $id <br>";
                echo "Nome: {$row['nome']}<br>";
                echo "Data de Nascimento: {$row['nasc_date']}<br>";
                echo "Papel: {$row['papel']}<br>";
            }
        }


        echo '<a href="users_edit.php?ID=' . $id . '"> Editar perfil <br><br> </a>';
        echo '<a href="pratos_interface.php?ID=' . $id . '"> + Criar prato <br><br> </a>';
        echo $_SESSION["ID_usuario"];

        if ($resultAdm->num_rows > 0) {
            while ($row = $resultAdm->fetch_assoc()) {
                if ($row['papel'] == 'adm') {
                    echo "<a href='users_lst.php'> Listagem de usuários <br><br> </a>";
                }
            }
        }
    ?>
</body>
</html>