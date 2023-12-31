
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    </head>
    <body>
        <?php
            include("connection.php");
        ?>
        <div class="main-container">
            <div class="banner-div">
                <img src="../assets/ilustração.png" alt="">
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
                                <a href="./cadastro.php">  Cadastre-se</a>
                            </div>
                            </div>
                    </div>
                    <form name="login-form" id="login-form" action="post">
                        <div class="input-box">
                            <input type="email" class="input" name="email" placeholder="Digite seu E-mail...">
                        </div>
                        <div class="input-box">
                            <input type="password" class="input" name="senha" placeholder="Digite sua senha...">
                        </div>
                        <button id="entrar-btn">Entrar</button>
                    </form>
                </div>
                
            </div>
        </div>

    </body>
</html>