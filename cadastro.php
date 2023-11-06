<html>
    <head>
        <title>Cadastro</title>
        <link rel="stylesheet" type="text/css" href="cadastro.css">
    </head>
    <body>
        <?php
            include("connection.php");
        ?>
        <div class="main-container">
            <div class="banner-div">
                <img src="assets/ilustração_cad.jpg" alt="">
            </div>
            <div class="register-div">
                <div class="Intro">
                    <h1>Cadastre-se!</h1>
                    <br>
                    <div class="status">
                        <div class="log-status">
                            <div class="log-overlay">
                                <a href="login.php"> Login</a>
                            </div>
                        </div>
                        <div class="cad-status">
                            <div class="cad-overlay">
                                <a href="">  Cadastre-se</a>
                            </div>
                            </div>
                    </div>
                    <form name="form1" id="form1" action="users_cad_php.php" method="post">
                        <br>
                        <div class="input-box">
                            <label for="name">Nome: </label>
                            <input type="text" class="input" name="txtName" id="name" placeholder="Digite seu nome completo...">
                        </div>
                        <div class="input-box">
                            <label for="email">Email:</label><br>
                            <input type="email" class="input" name="txtEmail" id="email" placeholder="Digite seu E-mail...">
                        </div>
                        <div class="input-box">
                            <label for="senha">Senha:</label><br>
                            <input type="password" class="input" name="txtSenha" id="senha" placeholder="Digite sua senha...">
                        </div>
                        <div class="input-box">
                            <label for="senha_conf">Confirme sua senha:</label><br>
                            <input type="password" class="input" name="senha_conf" id="senha_conf" placeholder="confirme sua senha...">
                        </div>
                        <div class="input-box">
                            <label for="dtNasc" class="label">Data de nascimento:</label><br>
                            <input type="text" class="input" name="txtNasc" id="dtNasc" placeholder="AAAA-MM-DD">
                        </div>
                        <input type="submit" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>