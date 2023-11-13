    <html>
        <head>
            <title>slider</title>
            <link rel="stylesheet" href="../CSS/game.css">
            <script src="../JavaScript/game.js" defer></script>
        </head>
        <body>
            <?php
                include('connection.php');
                include('gameFunctions.php');

                $alimentos = getAlimentos($conn);
                $json_alimentos = json_encode($alimentos);
            ?>
            <script>const js_alimentos = <?php echo $json_alimentos ?></script>
            <div class="container">
                <button class="return-btn"><</button>
                <div class="controls overlay">
                    <button class="control" id="higher-btn" aria-label="higher button">
                    <span>Higher ▲</span>
                    </button><br>
                    <button class="control" id="lower-btn" aria-label="lower button">
                    <span class="button-text">Lower ▼</span>
                    </button>
                    <p class='context'></p>
                </div>
                <div class="gallery-wrapper">
                    <div class="gallery">
                        
                    </div>
                </div>
                <div class="circle-box overlay">
                    <div class="vs-circle" id="circle">
                        <span>VS</span>
                    </div>
                </div>
                <img id="icon" src="" alt="">
                <div class="highscore">HIGH SCORE: </div>
                <div class="score">SCORE: 0</div>
            </div>
        </body>
    </html>
