<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ignite: Master</title>
</head>
<body>
    <?php
        include "const.php";

        $consulta = "select count(senha) as total from `sisadmin`";
        $result = banco($server, $user, $password, $db, $consulta);
        $row = mysqli_fetch_assoc($result);
        
        if($row['total'] != 0) {
            header('Location: login/login.html');
            exit;
        }
    ?>

    Crie o usuário administrador de sistema.

    <form action="signMasterIn.php" method="post">
        <input type="text" name="usuario">
        <input type="text" name="senha">
        
        <input type="submit" name="botaoCadastro">
    </form>

</body>
</html>