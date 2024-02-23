<?php
    include("connection.php");

    session_start();
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }
    $id = $_SESSION["ID_usuario"];

    $idAlimento = $_POST["id"];

    $sql = "SELECT nome, porcao, proteinas, gorduras, carboidratos, kcal FROM alimento WHERE ID_alimento = $idAlimento";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nome = $row["nome"];
            $porcao = $row["porcao"];
            $proteinas = $row["proteinas"];
            $gorduras = $row["gorduras"];
            $carboidratos = $row["carboidratos"];
            $kcal = $row["kcal"];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="alimento.js" defer></script>
</head>
<body>
    <div class="form-container">
        <form id="formulario" action="alimento_edit_php.php" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <label for="nome">Nome do alimento</label>
                <input id="nome" name="nome" type="text" value="<?php echo $nome?>">
            </div>
            <div class="input-box">
                <label for="">Porção (g):</label>
                <input id="porcao" name="porcao" type="text" value="<?php echo $porcao?>">
            </div>
            <div class="input-box">
                <label for="">Proteinas:</label>
                <input id="proteinas" name="proteinas" type="text" value="<?php echo $proteinas * $porcao?>">
            </div>
            <div class="input-box">
                <label for="">Gorduras:</label>
                <input id="gorduras" name="gorduras" type="text" value="<?php echo $gorduras * $porcao?>">
            </div>
            <div class="input-box">
                <label for="">Carboidratos</label>
                <input id="carboidratos" name="carboidratos" type="text" value="<?php echo $carboidratos * $porcao?>">
            </div>
            
            <div class="input-box">
                <label for="">Kcal:</label>
                <input id="kcal" name="kcal" type="text" value="<?php echo $kcal * $porcao?>">
            </div>
            <div class="input-box">
                <h3>SELECIONE UMA IMAGEM</h3>
                <img id="imagemSelecionada" src="../assets/kiwi.jpeg">
                <input type="file" name="Imagem" accept="image/*" onchange="validaImagem(this)">
            </div>
            <input type="hidden" name="idAlimento" value="<?php echo $idAlimento?>">
            <br>
            <input type="submit" value="Confirmar edição">
        </form>
    </div>
</body>
</html>