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

    $sql = "SELECT ID_alimento AS id, nome, proteinas, gorduras, carboidratos, kcal FROM alimento;";
    $sqlName = "SELECT ID_alimento AS id, nome FROM alimento";
    $result = $conn->query($sql);
    $resultName = $conn->query($sqlName);
    
    
    $id = $_GET["ID"];
    ?>
    <?php
    
    
    
    ?>
    <a href="users_user.php?ID=<?php echo $id ?>">←</a> <br><br>
    Número de registros: <?php echo $result->num_rows?><br><br>
    <table class="allTable">
        <tr>
            
            <td class="dishTd">
                <table class="dishTable">
                    <tr>
                        <th class="dishHead1">Seu prato</th>
                        <th class="dishHead2">Quantidade</th>
                    </tr>
                    <?php
        if ($resultName->num_rows > 0) {
            ?>
            <form name="form1" id="form1" action="pratos_interface_php.php" method="post">
            <tr><td class='dish2' colspan=2><input type="text" name="txtName" placeholder="Digite o nome do prato..."></td></tr>
            <input type="hidden" name="foodArray" id="foodArray">
            <input type="hidden" name="qtdArray" id="qtdArray">
            
<?php
            while ($row = $resultName->fetch_assoc()) {
?> 
                    <tr>
                        <td class="dish1"><?php echo $row["nome"]?></td>
                        <td class="dish2" id="<?php echo $row["id"] . "txt"?>">0</td>
                    </tr>
                    <?php
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
            while ($row = $result->fetch_assoc()) {
?>          
            <tr>
                <td class="infoAdd"><button id="<?php echo $row["id"]?>" onclick="foodOnClick(<?php echo $row['id']?>)">+</button></td>
                <td class="info"><?php echo $row["nome"]?></td>
                <td class="info"><?php echo $row["kcal"]?>kcal</td>
                <td class="info"><?php echo $row["carboidratos"]?>g</td>
                <td class="info"><?php echo $row["gorduras"]?>g</td>
                <td class="info"><?php echo $row["proteinas"]?>g</td>
                <td class="info"><?php echo $row["id"]?></td>
                
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
</td>
</tr>
</table>
</body>

<script>

    let inputHid = document.getElementById('foodArray')
    let foodArray = []
    let inputHidQtd = document.getElementById('qtdArray')
    let qtdArray = []

    function foodOnClick(id) {
        let foodB = document.getElementById(id)
        let foodN = document.getElementById(id + "txt")
        changeColor(foodB)
        addFoodN(foodN)
        addFoodA(id)
        
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


    function addFoodA(id) {
        if (!foodArray.includes(id)) {
            foodArray.push(id)
        }
        inputHid.value = foodArray

        
        

    }

</script>
</html>