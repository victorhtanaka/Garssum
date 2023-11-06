<?php 
    include("connection.php");

    session_start();
    if (!isset($_SESSION["ID_usuario"])) {
        header("Location: index.php");
    }

    $name = $_POST["txtName"];
    $nasc_date = $_POST["txtNasc"];
    $email = $_POST["txtEmail"];
    $peso = $_POST["txtPeso"];
    $altura = $_POST["txtAltura"];
    $id = $_POST["hidId"];

    $sql = "UPDATE usuario SET nome = '$name', data_nasc = '$nasc_date', email = '$email', peso = $peso, altura = $altura WHERE ID_usuario = $id";
    $result = $conn->query($sql);

    if ($result === TRUE){
        ?>
<script>
    alert("Perfil editado com sucesso");
    history.go(-2);
</script>
<?php
    }
    else {
        echo "Algo deu errado...";
    }

?>