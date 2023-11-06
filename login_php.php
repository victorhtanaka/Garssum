<?php 
    include("connection.php");

    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];

    $sql = "SELECT ID_usuario, senha, papel FROM usuario WHERE email = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["senha"] == $password) {
                session_start();
                $_SESSION["ID_usuario"] = $row["ID_usuario"];
                header("Location: users_user.php?ID=" . $_SESSION["ID_usuario"]);
            }

            else {
?>
<script>
    alert("Senha não confere!!!");
    history.go(-1);
</script>
<?php
            }
            
        } 
    } else {
?>
<script>
    alert("Usuário não cadastrado");
    window.location.href = "cadastro.php";
    
</script>
<?php
    }
?>