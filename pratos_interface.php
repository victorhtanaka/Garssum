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

    $sql = "SELECT ID_alimento AS id, nome, proteinas, gorduras, carboidratos, kcal, porcao, img FROM alimento WHERE fk_usuario_ID_usuario = 1 OR $id";
    $sqlName = "SELECT ID_alimento AS id, nome FROM alimento WHERE fk_usuario_ID_usuario = 1 OR $id";
    $result = $conn->query($sql);
    $resultName = $conn->query($sqlName);
    $resultId = $conn->query($sql);
    $nRows = $resultId->num_rows;
    ?>

    <a href="home.php">←</a> <br><br>
    Número de registros: <?php echo $result->num_rows?><br><br>
    <a href="alimento_list.php">Editar alimentos</a> <br><br>
    <?php echo $id ?>
    <table class="allTable">
        <tr>
            
            <td class="dishTd">
                <table class="dishTable">
                    <tr>
                        <th class="dishHead1">Seu prato</th>
                        <th class="dishHead2">Quantidade (g)</th>
                    </tr>
                    <?php
        if ($resultName->num_rows > 0) {
            ?>
            <form name="form1" id="form1" action="pratos_interface_php.php" method="post">
            <tr><td class='dish2' colspan=2><input type="text" name="txtName" placeholder="Digite o nome do prato..."></td></tr>
            <input type="hidden" name="foodArray" id="foodArray">
            <input type="hidden" name="qtdArray" id="qtdArray">
            
<?php
            $buttonIndex = 0;
            while ($row = $resultName->fetch_assoc()) {
?> 
                    <tr>
                        <td class="dish1"><?php echo $row["nome"]?></td>
                        <td class="dish2" id="<?php echo $buttonIndex . "txt"?>">0</td>
                    </tr>
                    <?php
            $buttonIndex += 1;
            }
            ?>
            <tr><td class='dish2' colspan=2><button>Criar prato</button></td></tr>
            </form>
            <?php
        } 
?>
                </table>
            </td>
            
            <td class="infoTd">
                <table class="infoTable">
        <tr>
            <th>Adicionar ao prato</th>
            <th>Nome</th>
            <th>Calorias</th>
            <th>Carboidratos</th>
            <th>Gorduras</th>
            <th>Proteínas</th>
            <th>id</th>
            
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $buttonIndex = 0;
            while ($row = $result->fetch_assoc()) {
?>          
            <tr>
                <td class="infoAdd"><button id="<?php echo $buttonIndex?>" onclick="foodOnClick(<?php echo $buttonIndex?>,<?php echo $row['porcao']?>)">+</button></td>
                <td class="info"><?php echo $row["nome"] . " (" . $row["porcao"] . "g)"?></td>
                <td class="info"><?php echo $row["kcal"] * $row["porcao"]?>kcal</td>
                <td class="info"><?php echo $row["carboidratos"] * $row["porcao"]?>g</td>
                <td class="info"><?php echo $row["gorduras"] * $row["porcao"]?>g</td>
                <td class="info"><?php echo $row["proteinas"] * $row["porcao"]?>g</td>
                <td class="info"><img id="imagemSelecionada" class="imgAlimento" src="data:image/png;base64,<?php echo base64_encode($row['img'])?>"></td>
                
            </tr>
<?php       
            $buttonIndex += 1;
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
</td>
</tr>
</table>
</body>

<script>

    let inputHid = document.getElementById('foodArray')
    let foodArray = []
    <?php 
    if ($resultId->num_rows > 0) {
        while ($row = $resultId->fetch_assoc()) {
    ?>
    foodArray.push(<?php echo $row["id"] ?>)
    <?php
        }
    }
    ?>
    let inputHidQtd = document.getElementById('qtdArray')
    let qtdArray = []
    
    for (let i = 0; i < <?php echo $nRows?>; i++) {
        qtdArray.push(0)
    }

    function foodOnClick(id,porcao) {
        let foodB = document.getElementById(id)
        let foodN = document.getElementById(id + "txt")
        let nameInput = document.getElementById("foodArray")
        let qtdInput = document.getElementById("qtdArray")
        changeColor(foodB)
        addFoodN(foodN, porcao)
        addFoodA(id, porcao, nameInput, qtdInput)
        console.log(nameInput.value)
        console.log(qtdInput.value)
    }


    function changeColor(item) {
        if (item.style.color == 'red') {
            item.style.color = 'black'
        } else {
            item.style.color = 'red'
        }
    }


    function addFoodN(text, porcao) {
        number = parseInt(text.textContent)
        number += porcao
        text.textContent = number
    }


    function addFoodA(id, porcao, nameInput, qtdInput) {
        qtdArray[id] += porcao
        nameInput.value = foodArray
        qtdInput.value = qtdArray
    }

</script>
</html>