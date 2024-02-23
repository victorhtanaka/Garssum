<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/graph.css">
    <title>Gráficos</title>
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <a href="home.php"><img src="images/logo.svg" alt="logo"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="graph.php">Gráfico</a></li>
                <li><a href="refeicao.php">Nova Refeição</a></li>
                <li><a href="calendar.php">Calendário</a></li>
                <li><a href="game.php">Higher or Lower</a></li>
                <li><a href="pratos_interface.php">Meus Pratos</a></li>
            </ul>
        </nav>
        <img class="profilepicture" src="images/Vector (1).svg" alt="">
    </header>


    <!-- Container 1 -->
    <section class="container1">
        <div class="canvas-1">
            <canvas class="Semester-Chart" id="Semester-Chart"></canvas>
            <div class="">

            </div>
        </div>
    </section>


    <!--Import de biblioteca de charts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="graph.js"></script>
</body>
</html>