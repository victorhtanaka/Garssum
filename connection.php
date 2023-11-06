<?php
    $servername = "localhost";
    $username = "root";
    $password = "PUC@1234";
    $dbname = "garssum";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha: " . $conn->connect_error);
    }
    ?>