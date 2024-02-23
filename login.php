<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="CSS/login.css">
    </head>
    <body>
        <?php 
            include("connection.php");
        ?>
        <div class="main-container">
            <img src="images/illu1.svg" alt="">
                <div class="Intro">
                    <h1>Seja bem-vindo!</h1>
                    <br>
                    <div class="status">
                        <div class="log-status">
                            <div class="log-overlay">
                                <a href="">Entrar</a>
                            </div>
                        </div>
                        <div class="cad-status">
                            <div class="cad-overlay">
                                <a href="./cadastro.php">Cadastrar</a>
                            </div>
                        </div>
                    </div>
                    <form name="login-form" id="login-form" action="login_php.php" method="POST" >
                        <br>
                        <div class="formall">
                            <div class="input-box">
                                <label for="email">Email:</label>
                                <input type="email" class="input" name="txtLogin" placeholder="Digite seu E-mail...">
                            </div>
                            <div class="input-box">
                                <label for="password">Senha:</label>
                                <input type="password" class="input" name="txtPassword" placeholder="Digite sua senha...">
                            </div>
                            <input class="logar" type="submit">
                        </div>
                    </form>
            </div>
        </div>

    </body>
</html>