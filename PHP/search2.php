<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/search.css">
    <script src="../JavaScript/search2.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php
        include('connection.php');
        include('bdFunctions.php');
        $alimentos_lst = json_encode(getAlimentos_nameID($conn));
    ?>
    <script>const alimentos_lst = <?php echo $alimentos_lst ?>;</script>
    
    <form action="searchResult.php" method="get">
        <div class="container">
            <div class="search-box">
                <input type="text" name="user_query" id="search-bar" placeholder="Pesquisar alimento..." autocomplete="off">
                <div class="filter">
                    <ul class="options"></ul>
                </div>
            </div>
            <input type="submit" name="search" id="search-btn" value="pesquisar">
        </div>
    </form>
</body>
</html>