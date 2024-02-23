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
    $resultName = $conn->query($sqlName);
    $resultId = $conn->query($sql);
    $nRows = $resultId->num_rows;
    
    
    $id = $_SESSION["ID_usuario"]; 
    ?>
    <a href="home.php">←</a> <br><br>
    Número de registros: <?php echo $result->num_rows?><br><br>
    <table class="allTable">
        <tr>
            
            <td class="dishTd">
                <table class="dishTable">
                    <tr>
                        <th class="dishHead1">Sua refeição</th>
                        <th class="dishHead2">Quantidade</th>
                    </tr>
                    <?php
        if ($resultName->num_rows > 0) {
            ?>
            <form name="form1" id="form1" action="pratos_interface_php.php" method="post">
            <tr><td class='dish2' colspan=2><input type="text" name="txtDay" id="day" placeholder="Insira a data de sua refeição"></td></tr>
            <tr>
                <td class='dish2' colspan=2>
                    <select name="txtHour">
                        <option value="6:00">Café da manhã (6:00 - 9:30)</option>
                        <option value="9:30" selected>Lanche da manhã (9:30 - 11:30)</option>
                        <option value="11:30">Al' Mosso (11:30 - 15:00)</option>
                        <option value="15:00">Lanche da Tarde (15:00 - 18:00)</option>
                        <option value="18:00">Jantar (18:00 - 23:00)</option>
                        <option value="23:00">Lanche da noite (23:00 - 6:00)</option>
                    </select>
                </td>
            </tr>
            <input type="hidden" name="refArray" id="refArray">
            <input type="hidden" name="qtdArray" id="qtdArray">
            
<?php
            $buttonIndex = 0;
            while ($row = $resultName->fetch_assoc()) {
?> 
                <tr>
                    <td class="dish1"><?php echo $row["Nome"]?></td>
                    <td class="dish2" id="<?php echo $buttonIndex . "txt"?>">0</td>
                </tr>
                <?php
                $buttonIndex += 1;
            }
            
            ?>
            <tr><td class='dish2' id="" colspan=2><button>Registrar refeição</button></td></tr>
            </form>
            <?php
        } 
?>
                </table>
            </td>
            
            <td class="infoTd">
                <table class="infoTable">
        <tr>
            <th>Adicionar à refeição</th>
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
                <td class="infoAdd"><button id="<?php echo $buttonIndex?>" onclick="foodOnClick(<?php echo $buttonIndex?>)">+</button></td>
                <td class="info"><?php echo $row["nome"]?></td>
                <td class="info"><?php echo $row["kcal"]?>kcal</td>
                <td class="info"><?php echo $row["carboidratos"]?>g</td>
                <td class="info"><?php echo $row["gorduras"]?>g</td>
                <td class="info"><?php echo $row["proteinas"]?>g</td>
                <td class="info"><?php echo $row["id"]?></td>
                
            </tr>
<?php       $buttonIndex += 1;
            }
            
        } 
        else {
?>
        <tr>
            <td colspan="5">Você ainda não tem pratos cadastrados 😔</td>
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

    let inputHid = document.getElementById('refArray')
    let refArray = []
    <?php 
    if ($resultId->num_rows > 0) {
        while ($row = $resultId->fetch_assoc()) {
    ?>
    refArray.push(<?php echo $row["id"] ?>)
    <?php
        }
    }
    ?>
    let inputHidQtd = document.getElementById('qtdArray')
    let qtdArray = []
    
    for (let i = 0; i < <?php echo $nRows?>; i++) {
        qtdArray.push(0)
    }

    function foodOnClick(id) {
        let foodB = document.getElementById(id)
        let foodN = document.getElementById(id + "txt")
        let nameInput = document.getElementById("refArray")
        let qtdInput = document.getElementById("qtdArray")
        changeColor(foodB)
        addFoodN(foodN)
        addFoodA(id, nameInput, qtdInput)
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


    function addFoodN(text) {
        number = parseInt(text.textContent)
        number += 1
        text.textContent = number
    }


    function addFoodA(id, nameInput, qtdInput) {
        qtdArray[id] += 1
        nameInput.value = refArray
        qtdInput.value = qtdArray
    }


    function show(msg) {
        alert(document.getElementById(msg).value)
    }
</script>
</html>