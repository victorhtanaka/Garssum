<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Calendário</title>
    <script src="calendar.js" defer></script>
    <link rel="stylesheet" href="calendar.css">
</head>
<body>
    <?php
        include('connection.php');

        session_start();
    
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }

        $id = $_SESSION["ID_usuario"];

        $sql = "SELECT nome, peso, img FROM usuario WHERE ID_usuario = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) { 
            while ($row = $result->fetch_assoc()) { 
                $username = $row["nome"];
                $img_perfil = $row["img"];
            }
        }


        include('bdFunctions.php');
        $alimentos_lst = json_encode(getAlimentos_nameID($conn));
        $alimentos_info = json_encode(getAlimentos_proper($conn));
    ?>
    <script>
        const alimentos_lst0 = <?php echo $alimentos_lst ?>;
        const alimentos_info0 = <?php echo $alimentos_info ?>;
    </script>

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
        <img class="profilepicture" src="data:image/png;base64,<?php echo base64_encode($img_perfil)?>" alt="">
    </header>

    <div class="even-bigger-container-lol">
        <div class="container">
            <div id="calendar-container">
                <div id="header">
                    <button id="backButton">◀</button>
                    <div id="monthDisplay">
                        <div class="ano">
                            <p>Ano:</p>
                            <div class="ano-num"></div>
                        </div>
                        <div class="month-long"></div>
                    </div>
                    <button id="nextButton">▶</button>
                    <hr>
                </div>

                <div id="weekdays">
                    <div>Dom</div>
                    <div>Seg</div>
                    <div>Ter</div>
                    <div>Qua</div>
                    <div>Qui</div>
                    <div>Sex</div>
                    <div>Sáb</div>
                </div>

                <div id="calendar-days"></div>
            </div>

            <div class="information">
                <div class="date">
                    <div id="month"></div>
                    <div id="dayDate"></div>
                </div>
                <div class="nutrients">
                    <div class="carbs">
                        <div class="c-porcentage">
                            61%
                        </div>
                        <p>Carboidratos</p>
                    </div>
                    <div class="proteinas">
                        <div class="p-porcentage">
                            24%
                        </div>
                        <p>Proteínas</p>
                    </div>
                    <div class="gorduras">
                        <div class="g-porcentage">
                            15%
                        </div>
                        <p>Gorduras</p>
                    </div>
                    <div class="calories">
                        <p>Calorias</p>
                        <div class="cal-count">
                            <p>2142</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="newRefeicaoModal">
            <h1>Registro de Refeição</h1>
            <button id="closeModal-btn" onclick="closeModal()">X</button>
            <div class="top-part">
                <form id="form" action="calendar_php.php" method="post">
                    <label for="horario">Horário da Refeição:</label>
                    <input name="horario" id="horario" type="text">
                    <div class="table-div">
                        <table id="food-table">
                            <thead>
                                <tr>
                                    <th>Alimento</th>
                                    <th>Quantidade(g)</th>
                                    <th>Calorias</th>
                                    <th>Carboidratos</th>
                                    <th>Proteínas</th>
                                    <th>Gorduras</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="total-row">
                                    <td>TOTAL</td>
                                    <td id="total-qntd"></td>
                                    <td id="total-cals"></td>
                                    <td id="total-carbs"></td>
                                    <td id="total-proteins"></td>
                                    <td id="total-fats"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="tableData" id="tableData">
                    <input type="hidden" name="Dia" id="Dia">
                    <input type="hidden" name="fk_prato" id="fk_prato" value=''>
                    <button id="submitModal-btn" onclick="submitForm()">Registrar!</button>
                </form>
            </div>

            <div class="kanban">
                <div class="search-box">
                    <input type="text" name="user_query" id="search-bar" placeholder="Pesquisar alimento..." autocomplete="off">
                </div>
                <div class="board">
                    
                </div>
            </div>
            <button id="submitModal-btn" onclick="submitForm()">Registrar!</button>
        </div>

        <div id="modalBackDrop"></div>
    </div>
    

</body>
</html>