<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Cadastrar Usuário</h1>
    <form name="form1" id="form1" method="post" action="users_cad_php.php">
        <b>Nome:</b><br>
        <input type="text" name="txtName"> <br><br>
        <b>Data de nascimento: (yyyy-mm-dd)</b><br>
        <input type="text" name="txtNasc"><br><br>
        <b>E-Mail:</b><br>
        <input type="email" name="txtEmail"> <br><br>
        <b>Peso: (kg)</b><br>
        <input type="text" name="txtPeso"><br><br>
        <b>Altura: (cm)</b><br>
        <input type="text" name="txtAltura"> <br><br>
        <input type="hidden" name="hidId">
        <input type="submit" value="Cadastrar">
</body>
</html>