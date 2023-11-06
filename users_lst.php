<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes</title>
    <style>
        table {
            border: #000 1px solid;
            width: 100%;
        }
        table td {
            border: #000 1px solid;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    include ("connection.php");
    session_start();
    
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }

    $sql = "SELECT ID_usuario AS id, nome, (YEAR(NOW()) - YEAR(data_nasc) - CASE WHEN (MONTH(NOW()) * 100 + DAY(NOW())) > (MONTH(data_nasc) * 100 + DAY(data_nasc)) THEN 0 ELSE 1 END) AS idade, email, CONVERT(peso, DECIMAL(10,2)) AS peso, CONVERT(altura/100, DECIMAL(10,2)) AS altura FROM usuario;";
    $result = $conn->query($sql);
?>
    <a href="index.php"> Ir para o login <br><br> </a>
    Número de registros: <?php echo $result->num_rows?><br><br>
    <a href="users_cad.php"> + Adicionar registro <br><br> </a>
    <table>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>E-Mail</th>
            <th>Peso</th>
            <th>Altura</th>
            <th colspan=2>Ações</th>
        </tr>
<?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
?>          
            <tr>
                <td>
                    <a href="users_user.php?ID=<?php echo $row["id"]?>">
                        <?php echo $row["id"]?>
                    </a>
                </td>
                <td><?php echo $row["nome"]?></td>
                <td><?php echo $row["idade"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["peso"]?>kg</td>
                <td><?php echo $row["altura"]?>m</td>
                <td>
                    <a href="users_edit.php?ID=<?php echo $row["id"]?>">
                        Editar
                    </a>
                </td>
                <td>
                    <a href="users_delete.php?ID=<?php echo $row["id"]?>">
                        Excluir
                    </a>
                </td>
            </tr>
<?php
            }
        } 
        else {
?>
        <tr>
            <td colspan="5">Não há registros nesta tabela a exibir</td>
        </tr>
            
<?php
        }
?>
</table>
</body>
</html>


