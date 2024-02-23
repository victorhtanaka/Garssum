<?php
    include('connection.php');
    session_start();
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }
    $id = $_SESSION["ID_usuario"]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="alimento.js" defer></script>
    <style>
        .imagemSelecionada{
            height: 300px;
            width: auto;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form id="formulario" action="alimento_php.php" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <label for="nome">Nome do alimento</label>
                <input id="nome" name="nome" type="text">
            </div>
            <div class="input-box">
                <label for="">Porção (g):</label>
                <input id="porcao" name="porcao" type="text">
            </div>
            <div class="input-box">
                <label for="">Proteinas:</label>
                <input id="proteinas" name="proteinas" type="text">
            </div>
            <div class="input-box">
                <label for="">Gorduras:</label>
                <input id="gorduras" name="gorduras" type="text">
            </div>
            <div class="input-box">
                <label for="">Carboidratos</label>
                <input id="carboidratos" name="carboidratos" type="text">
            </div>
            
            <div class="input-box">
                <label for="">Kcal:</label>
                <input id="kcal" name="kcal" type="text">
            </div>
            <div class="input-box">
                <h3>SELECIONE UMA IMAGEM</h3>
                <img id="imagemSelecionada" src="../assets/kiwi.jpeg">
                <input type="file" name="Imagem" accept="image/*" onchange="validaImagem(this)">
            </div>
            <br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>