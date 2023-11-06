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
            <div class="banner-div">
                <img src="assets/ilustração.jpg" alt="">
            </div>
            <div class="register-div">
                <div class="formulario">
                    <h1>Seja
                    bem-vindo!</h1>
                    <br>
                    <div class="status">
                        <div class="log-status">
                            <div class="log-overlay">
                                <a href=""> Login</a>
                            </div>
                        </div>
                        <div class="cad-status">
                            <div class="cad-overlay">
                                <a href="cadastro.php">  Cadastre-se</a>
                            </div>
                            </div>
                    </div>
                    <form name="form1" id="form1" method="post" action="login_php.php">
                        <div class="input-box">
                            <input type="email" class="input" name="txtLogin" placeholder="Digite seu E-mail...">
                        </div>
                        <div class="input-box">
                            <input type="password" class="input" name="txtPassword" placeholder="Digite sua senha...">
                        </div>
                        <input type="submit" value="Entrar" id="entrar-btn">
                    </form>
                </div>
                
            </div>
        </div>

    </body>
</html>