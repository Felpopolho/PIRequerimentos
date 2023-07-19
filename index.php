<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ignite: Master</title>
    <meta name="description" id="description" 
    content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
</head>
<body>
    <?php
        session_start();
        include "const.php";

        $consulta = "SELECT COUNT(senha) AS total FROM `sisadmin`";
        $result = banco($server, $user, $password, $db, $consulta);
        $row = mysqli_fetch_assoc($result);
        if($row['total'] != 0) {
            header('Location: login/login.php');
            exit;
        }
    ?>

    <div class="msgIndex">
        <?php
            if(isset($_SESSION['msgIndex'])){
                echo $_SESSION['msgIndex'];
                unset($_SESSION['msgIndex']);
            }
        ?>
    </div>

    Crie o usuário administrador de sistema.

    <form action="signMasterIn.php" method="post">
        <input type="text" name="usuario">
        <input type="password" name="senha">
        
        <input type="submit" name="botaoCadastro">
    </form>
</body>
</html>