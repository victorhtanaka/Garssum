<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login do Sistema</h1>
    <form id="form1" name="form1" method="post" action="login_php.php">
        <tr>
            <td style="width: 50x; text-align: right">Login: </td>
            <td>
                <input type="text" name="txtLogin">
            </td>
        </tr>
        <tr>
            <td>Senha: </td>
            <td>
                <input type="password" name="txtPassword">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="enviar">
            </td>
        </tr>

    </form>
</body>
</html>