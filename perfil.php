<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/perfil.css">
    <script src="perfil.js"></script>
    <title>Configurações</title>
</head>
<body style="margin: 0;">


    <?php
        include ("connection.php");

        session_start();
        if (!isset($_SESSION["ID_usuario"])) {
            header("Location: index.php");
        }

        $id = $_GET["ID"];
        $sql = "SELECT ID_usuario AS id, nome, nome_user, bio, email FROM usuario WHERE ID_usuario = $id;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $nome = $row["nome"];
                $nome_user = $row["nome_user"];
                $email = $row["email"];
                $bio = $row["bio"];
            }
        }
    ?>

    <div class="container1">




        <!--Div da esquerda-->
        <!--Trocar cor dos icones das opções pra verde quando selecionadas(Nao sei fazer)-->
        <div class="leftdiv">
            <a href="users_user.php?ID=<?php echo $_SESSION["ID_usuario"]?>"><img src="images/logogreen.svg" alt=""></a>

            <div class="alloptions">
                <div class="op" onclick="changeop('p1')">
                    <img src="images/user.svg" alt="">
                    <p id="p1" class="p1">Editar perfil</p>
                </div>
                <div class="op" onclick="changeop('p2')">
                    <img src="images/lock.svg" alt="">
                    <p id="p2" class="p2">Alterar senha</p>
                </div>
                <div class="op" onclick="changeop('p3')">
                    <img src="images/comment.svg" alt="">
                    <p id="p3" class="p3">Chat</p>
                </div>
                <div class="op" onclick="changeop('p4')">
                    <img src="images/shield.svg" alt="">
                    <p id="p4" class="p4">Privacidade e Segurança</p>
                </div>
                <div class="op" onclick="changeop('p5')">
                    <img src="images/gear.svg" alt="">
                    <p id="p5" class="p5">Opções avançadas</p>
                </div>
            </div>
            <a class="sair" href="/"><img src="images/Icon Sair.svg" alt="">Sair</a>
        </div>

        <img src="images/Line 19.svg" alt="">






        <!--Div da direita-->
        <div id="rightdiv1" class="rightdiv1">
            <div class="banner">
                <!--Tem que receber imagem do banco de dados aqui-->
                <img class="bannerpicture" src="images/banner.png" alt="">
                <a href="/">Editar capa</a>
            </div>
            <div class="user">
                <!--Receber imagem do banco de dados aqui tbm-->
                <!-- Clicar aqui chama a funçao para alterar foto de perfil-->
                <img class="profilepicture" onclick="" src="images/profilepicture.png" alt="">
                <div class="alterimg"><img class="changeprofilepicture" src="images/change.svg" alt="">Trocar foto</div>
                <div class="usernames">
                    <h1><?php echo $nome; ?></h1>
                    <p><?php echo "@" . $id; ?></p>
                </div>
            </div>
            <form class="profileform" name="form1" method="POST" action="perfil_php.php?ID=<?php echo $_SESSION["ID_usuario"] ?>">
                <div class="profile-form-inputs">
                    <div class="user-input">
                        <label for="username">Nome de usuário</label>
                        <input type="username" class="input" name="username" value="<?php echo "@" . $id; ?>">
                    </div>
                    <div class="user-input">
                        <label for="name">Nome</label>
                        <input type="name" class="input" name="name" value="<?php echo $nome; ?>">
                    </div>
                    <div class="user-input">
                        <label for="bio">Bio</label>
                        <input type="bio" class="inputbio" name="bio" value="<?php echo $bio; ?>">
                    </div>
                    <div class="user-input">
                        <label for="email">Email</label>
                        <input type="email" class="input" name="email" value="<?php echo $email; ?>">
                    </div>
                </div><br>
                <div class="profile-form-buttons">
                    <input class="input1" type="submit" value="Salvar">
                    <input class="input2" type="reset" value="Cancelar">
                </div>
            </form>
        </div>

        <div id="rightdiv2" class="rightdiv2">
            <!--<img src="images/telafodaslaoq.svg" alt="">-->
            <form id="reset-password-form" action="">
                <div class="form2">
                    <h1>Alterar senha atual</h1>

                    <div class="user-input2">
                        <label for="current-password">Senha atual</label>
                        <input type="current-password" class="input3" name="current-password" placeholder="Sua senha">
                    </div>

                    <div class="user-input2">
                        <label for="new-password">Nova senha</label>
                        <input type="new-password" class="input3" name="new-password" placeholder="Nova senha">
                    </div>

                    <div class="user-input2">
                        <label for="repeat-new-password">Confirmar nova senha</label>
                        <input type="repeat-new-password" class="input3" name="repeat-new-password" placeholder="Repita a nova senha">
                    </div>
                </div>

            </form>
        </div>

        <div id="rightdiv3" class="rightdiv3">
            Lorem3
        </div>

        <div id="rightdiv4" class="rightdiv4">
            Lorem4
        </div>

        <div id="rightdiv5" class="rightdiv5">
            Lorem5
        </div>

    </div>
</body>
</html>