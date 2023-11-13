<html>
    <head>
        <title>Cadastro</title>
        <link rel="stylesheet" type="text/css" href="../CSS/cadastro.css">
    </head>
    <body>
        <?php
            include("connection.php");
        ?>
        <div class="main-container">
            <div class="banner-div">
                <img src="../assets/ilustração_cad.png" alt="">
            </div>
            <div class="register-div">
                <div class="Intro">
                    <h1>Cadastre-se!</h1>
                    <br>
                    <div class="status">
                        <div class="log-status">
                            <div class="log-overlay">
                                <a href="./login.php"> Login</a>
                            </div>
                        </div>
                        <div class="cad-status">
                            <div class="cad-overlay">
                                <a href="">Cadastre-se</a>
                            </div>
                            </div>
                    </div>
                    <form name="cad-form" id="cad-form" action="inicio.php" method="post">
                        <br>
                        <div class="input-box">
                            <label for="name">Nome:</label><br>
                            <input type="text" class="input" name="name" id="name" placeholder="Digite seu nome completo...">
                        </div>
                        <div class="input-box">
                            <label for="email">Email:</label><br>
                            <input type="email" class="input" name="email" id="email" placeholder="Digite seu E-mail...">
                        </div>
                        <div class="input-box">
                            <label for="senha">Senha:</label><br>
                            <input type="password" class="input" name="senha" id="senha" placeholder="Digite sua senha...">
                        </div>
                        <div class="input-box">
                            <label for="senha_conf">Confirme sua senha:</label><br>
                            <input type="password" class="input" name="senha_conf" id="senha_conf" placeholder="confirme sua senha...">
                        </div>
                        <div class="input-box">
                            <label for="dtNasc" class="label">Data de nascimento:</label><br>
                            <input type="text" class="input" name="dtNasc" id="dtNasc" placeholder="DD/MM/AAAA">
                        </div>
                        <input type="button" onclick="cad_check()" id="cadastrar-btn" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>