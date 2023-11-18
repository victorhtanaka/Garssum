<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <title>Home</title>
</head>
<body>
    <?php 
    include("connection.php");

    session_start();
    
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }

    $id = $_SESSION["ID_usuario"];

    $sql = "SELECT nome, peso, altura, img FROM usuario WHERE ID_usuario = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { 
        while ($row = $result->fetch_assoc()) { 
            $username = $row["nome"];
            $peso = $row["peso"];
            $altura = $row["altura"] / 100;
            $img_perfil = $row["img"];
        }
    }

    ?>


    <!--Navigation Bar-->
    <header>
        <a href="index.php"><img src="images/logo.svg" alt="logo"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="graph.php">Gráfico</a></li>
                <li><a href="refeicao.php">Nova Refeição</a></li>
                <li><a href="calendar.php">Calendário</a></li>
                <li><a href="game.php">Higher or Lower</a></li>
                <li><a href="pratos_interface.php">Meus Pratos</a></li>
            </ul>
        </nav>
        <img class="profilepicture" src="data:image/png;base64,<?php echo base64_encode($img_perfil)?>" onclick="redirect('perfil.php')" alt="">
    </header>

    <div class="container">
        <div class="leftdiv">


            <div class="row1">
                <div>
                    <h1 class="text1">Bem-vindo ao seu painel,</h1>
                    <h1 class="text2">
                        <?php echo $username . "!"?>
                    </h1>
                </div>
                <div class="rowimg">
                    <img src="images/comida.svg" alt="">
                </div>
            </div>


            <div class="row2">
                <div onclick="redirect('graph.php')">
                    <img src="images/icon Gráfico (1).svg" alt="">
                    <p>Gráfico</p>
                </div>
                <div onclick="redirect('refeicao.php')">
                    <img src="images/Frame 21.svg" alt="">
                    <p>Novo prato</p>
                </div>
            </div>


            <div class="row3">
                <div onclick="redirect('calendar.php')">
                    <img src="images/Icon Calendário (1).svg" alt="">
                    <p>Calendário</p>
                </div>
                <div onclick="redirect('game.php')">
                    <img src="images/lower.svg" alt="">
                    <p>Higher or Lower</p>
                </div>
                <div onclick="redirect('pratos_interface.php')">
                    <img src="images/Icon visualizar meus pratos (1).svg" alt="">
                    <p>Meus Pratos</p>
                </div>
            </div>
        </div>


        <div class="rightdiv">
            <div class="right-top-div">
                <img src="data:image/png;base64,<?php echo base64_encode($img_perfil)?>" onclick="redirect('perfil.php')" alt="">
                <p><?php echo $username?></p>
            </div>
            <div class="right-bottom-div">

                <div class="top-info">
                    <div>
                        <img src="images/balanca.svg" alt="">
                        <p class="top-info-p">Peso atual</p>
                        <p class="kilo"><?php echo $peso . "kg" ?></p>
                    </div>
                    <div>
                        <img src="images/meta.svg" alt="">
                        <p class="top-info-p">IMC</p>
                        <p class="kilo"><?php echo number_format($peso / ($altura * $altura), 2, ',', '.')?></p>
                    </div>
                </div>


                <div class="bottom-info">
                    <div>
                        <p>INFO#1</p>
                    </div>
                    <div>
                        <p>INFO#2</p>
                    </div>
                </div>


            </div>
        </div>

    </div>
</body>
<script>


    function redirect(link) {
        window.location.href = link
    }
</script>
</html>