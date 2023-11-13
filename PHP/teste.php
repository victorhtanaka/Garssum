<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calendário</title>
        <script src="../JavaScript/teste.js" defer></script>
        <link rel="stylesheet" href="../CSS/teste.css">
    </head>
<body>
    <?php
        include('connection.php');
        include('gameFunctions.php');
        $alimentos = getAlimentos($conn);
        $json_alimentos = json_encode($alimentos);
    ?>
    <script>const js_alimentos = <?php echo $json_alimentos ?></script>
    
    <div class="main-content">
        <div class="refeicoes">
            <div class="refeicao" draggable='true'>Cafe da manha</div>
            <div class="refeicao" draggable='true'>lanche da manha</div>
            <div class="refeicao" draggable='true'>almoco da manha</div>
            <div class="refeicao" draggable='true'>lanche da tarde da manha</div>
            <div class="refeicao" draggable='true'>Janta</div>
            <div class="refeicao" draggable='true'>lanche da noite</div>
        </div>

        <div id="calendar-container">
            <div class="header-container">
                <div id="header">
                    <button id="backButton"><</button>
                    <div id="monthDisplay"></div>
                    <button id="nextButton">></button>
                </div>

                <div id="weekdays">
                    <div>Domingo</div>
                    <div>Segunda</div>
                    <div>Terça</div>
                    <div>Quarta</div>
                    <div>Quinta</div>
                    <div>Sexta</div>
                    <div>Sábado</div>
                </div>
            </div>

            <div id="calendar"></div>
        </div>

        <div id="day-info">
            <div class="dayDate"></div>

            <button id="saveButton">Save</button>
            <button id="cancelButton">Cancel</button>
        </div>
    </div>
    
    </body>
</html>