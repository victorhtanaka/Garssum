<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .allTable{
            width: 100%;
        }
        .dishTd {
            vertical-align: top;
            width: 50%;
        }
        .infoTd{
            width: 50%;
        }
        .infoTable {
            width: 100%;
        }
        .dishTable {
            
            width: 100%;
        }
        .info{
            border: #000 1px solid;
            text-align: center;
        }
        .dish1{
            text-align: right;
            width: 55%;
        }
        .dish2{
            text-align: center;
        }
        .dishHead1{
            text-align: right;
            width: 55%;
        }
        .dishHead2{
            text-align: center;
        }
        .infoAdd{
            text-align: center;
        }
        .dishHead{
            text-align: center;
        }
        #img{
            visibility : hidden;
        }
        .imgAlimento {
            height: 40px;
            width: auto;
        }
    </style>
</head>
<body>
    <?php
    include("connection.php");

    session_start();
    
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }
    $id = $_SESSION["ID_usuario"];

    $sql = "SELECT P.Nome AS nome,CONVERT(SUM(A.carboidratos * AP.qtd), DECIMAL(10,2))  AS carboidratos, CONVERT(SUM(A.proteinas* AP.qtd) , DECIMAL(10,2))  AS proteinas, CONVERT(SUM(A.gorduras * AP.qtd), DECIMAL(10,2)) AS gorduras, CONVERT(SUM(A.kcal* AP.qtd) , DECIMAL(10,2)) AS kcal, CONVERT(AVG(P.ID_prato), DECIMAL(10)) AS id FROM prato AS P, usuario AS U, alimento AS A, alimento_prato AS AP WHERE P.fk_usuario_ID_usuario = U.ID_usuario AND AP.fk_prato_ID_prato = P.ID_prato AND AP.fk_alimento_ID_alimento = A.ID_alimento AND U.ID_usuario = $id GROUP BY P.Nome;";
    $sqlName = "SELECT ID_prato AS id, Nome FROM prato WHERE fk_usuario_ID_usuario = $id";
    $result = $conn->query($sql);
    ?>

    <a href="home.php">←</a> <br><br>
    Número de registros: <?php echo $result->num_rows?><br><br>
    <a href="alimento.php">+ Cadastrar novo alimento</a> <br><br>
    <table class="infoTable">
        <tr>
            <th colspan="2">Ações</th>
            <th>Nome</th>
            <th>Calorias</th>
            <th>Carboidratos</th>
            <th>Gorduras</th>
            <th>Proteínas</th>
            
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $buttonIndex = 0;
            while ($row = $result->fetch_assoc()) {
?>          
            <tr>
                <td class="infoAdd"><button onclick="foodOnClick(<?php echo $row['id'];?>, false)">Editar</button></td>
                <td class="infoAdd"><button onclick="foodOnClick(<?php echo $row['id'];?>, true)">Excluir</button></td>
                <td class="info"><?php echo $row["nome"]?></td>
                <td class="info"><?php echo $row["kcal"]?>kcal</td>
                <td class="info"><?php echo $row["carboidratos"]?>g</td>
                <td class="info"><?php echo $row["gorduras"]?>g</td>
                <td class="info"><?php echo $row["proteinas"]?>g</td>  
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
<form id="form1" action="alimento_edit.php" method="post">
<input type="hidden" name="id" id="hidId">
</form>

</body>

<script>

    function foodOnClick(id, ver) {
        let input = document.getElementById("hidId")
        let form = document.getElementById("form1")
        input.value = id
        if (ver) {
            form.action = "alimento_delete.php"
        }
        form.submit()

    }

</script>
</html>