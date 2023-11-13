<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Calendário</title>
    <script src="../JavaScript/calendar.js" defer></script>
    <link rel="stylesheet" href="../CSS/calendar.css">
</head>
<body>
    <?php
        include('connection.php');
        include('bdFunctions.php');
        $alimentos_lst = json_encode(getAlimentos_nameID($conn));
        $alimentos_info = json_encode(getAlimentos($conn));
    ?>
    <script>
        const alimentos_lst = <?php echo $alimentos_lst ?>;
        const alimentos_info = <?php echo $alimentos_info ?>;
    </script>

    <div class="container">
        <div id="calendar-container">
            <div id="header">
                <button id="backButton">Back</button>
                <div id="monthDisplay"></div>
                <button id="nextButton">Next</button>
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

            <div id="calendar-days"></div>
        </div>

        <div class="information">
            <div class="date">
                <div id="dayDate"></div>
                <div id="month"></div>
            </div>
            <div class="calories">
                <div class="cal-icon"><img src="../assets/incendio.png" alt=""></div>
                <div class="cal-count">2142</div>
                <p>calorias</p>
            </div>
            <div class="nutrients">
                <div class="carbs">61%</div>
                <div class="proteinas">24%</div>
                <div class="gorduras">15%</div>
            </div>
            <div class="legenda">
                <div class="legendaCarbs">
                    <div id="c-circle"></div><p>carboidratos</p>
                </div>
                <div class="legendaProt">
                    <div id="p-circle"></div><p>Proteinas</p>
                </div>
                <div class="legendaGord">
                    <div id="g-circle"></div><p>Gorduras</p>
                </div>
            </div>
        </div>
    </div>

    <div id="newRefeicaoModal">
        <div id="close-div">
            <button id="closeModal-btn" onclick="closeModal()">X</button>
        </div>
        <div class="top-part">
            <div class="leftModal-container">
                SELECIONE UM HORÁRIO
            </div>
            <div class="rightModal-container">
                
                <h2>Nova Refeição</h2>
                <div class="container2">
                    <div class="search-box">
                        <input type="text" name="user_query" id="search-bar" placeholder="Pesquisar alimento..." autocomplete="off">
                        <div class="filter">
                            <ul class="options"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kanban">
            <div class="board">
            </div>
        </div>
    </div>

    <div id="modalBackDrop"></div>

</body>
</html>