<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('connection.php');
        $sql = "SELECT * FROM alimento";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<img src='data:image/jpeg;base64,=" . base64_encode($row["img"]) . "alt=''>";
            }
        } else {
            echo "No images found.";
        }
        $conn->close();
        ?>
</body>
</html>