<html>
    <head>
        <title>GameStart</title>
    </head>
    <body>
        <button onclick="startGame()">Começar</button>
        <script>
        function startGame() {
            window.location.href = 'game.php';
        }
    </script>
    </body>
</html>

<?php
    include("connection.php")
?>