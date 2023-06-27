<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ignite: Master</title>
</head>
<body>
    <?php
        include "const.php";

        $consulta = "select count(*) as total from adm/cores";
        $result = banco($server, $user, $password, $db, $consulta);
        $row = mysqli_fetch_assoc($result);
        
        if($row['total'] != 0) {
            header('Location: login.php');
            exit;
        }
    ?>

    Crie o usuário administrador de sistema.

    <form action="signSisAdminIn.php" method="post">
        <input type="text" name="usuario">
        <input type="text" name="senha">
    </form>

</body>
</html>