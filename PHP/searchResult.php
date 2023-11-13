<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da pesquisa</title>
    <style>
        #search-bar {
            width: 500px;
            height: 30px;
        }

        #search-btn {
            margin: 5px;
            width: 90px;
            height: 36px;
            /* background-color: ; */
            color: #000;
            border: 1px solid #000;
            cursor: pointer;
            /* border-radius: 5px; */
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <form action="searchResult.php" method="get">
        <input type="text" name="user_query" id="search-bar">
        <input type="submit" name="search" id="search-btn" value="pesquisar">
    </form>

    <?php
        include('connection.php');

        if(isset($_GET['search'])){
            $search_value = $_GET['user_query'];
            $sql = "SELECT * FROM alimento WHERE nome like '%$search_value%'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                // echo "<div class='results'>
                //                 $row['nome']</div>";
                echo $row['ID_alimento'], $row['nome'], $row['proteinas'], $row['gorduras'], $row['carboidratos'], $row['kcal'];
            }
        }
    ?>
</body>
</html>