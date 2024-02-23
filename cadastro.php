<html>
    <head>
        <title>Cadastro</title>
        <link rel="stylesheet" type="text/css" href="CSS/cadastro.css">
    </head>
    <body>
        <div class="main-container">
            <img src="images/illu2 (1).svg" alt="">
                <div class="Intro">
                    <h1>Cadastre-se!</h1><br>
                    <br>
                    <div class="status">
                        <div class="log-status">
                            <div class="log-overlay">
                                <a href="login.php">Entrar</a>
                            </div>
                        </div>
                        <div class="cad-status">
                            <div class="cad-overlay">
                                <a href="">Cadastrar</a>
                            </div>
                            </div>
                    </div>
                    <form name="form1" id="form1" action="users_cad_php.php" method="post">
                        <br>
                        <div class="formall">
                            <div class="input-box">
                                <label for="name">Nome: </label>
                                <input type="text" class="input" name="txtName" id="name" placeholder="Digite seu nome completo...">
                            </div>
                            <div class="input-box">
                                <label for="email">Email:</label>
                                <input type="email" class="input" name="txtEmail" id="email" placeholder="Digite seu E-mail...">
                            </div>
                            <div class="input-box">
                                <label for="senha">Senha:</label>
                                <input type="password" class="input" name="txtSenha" id="senha" placeholder="Digite sua senha...">
                            </div>
                            <div class="input-box">
                                <label for="senha_conf">Confirme sua senha:</label>
                                <input type="password" class="input" name="senha_conf" id="senha_conf" placeholder="Confirme sua senha...">
                            </div>
                            <div class="input-box">
                                <label for="dtNasc" class="label">Data de nascimento:</label>
                                <input type="text" class="input" name="txtNasc" id="dtNasc" placeholder="AAAA-MM-DD">
                            </div>
                            <input class="registrar" type="submit" value="Cadastrar">
                        </div>
                    </form>
                </div>
        </div>

    </body>
</html>