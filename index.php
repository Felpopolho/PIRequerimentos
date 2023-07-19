<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleIndexPage.css">
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

    
    
    <div class="container">

        <h3>Crie o usuário administrador de sistema.</h3> <br>

        <div class="error-msg">
            <?php
                if(isset($_SESSION['msgIndex'])){
                    echo $_SESSION['msgIndex'];
                    unset($_SESSION['msgIndex']);
                }
            ?>
        </div>

        <form action="signMasterIn.php" method="post">
            <input type="text" name="usuario" class="input" placeholder="Usuário"> <br>
            <input type="password" name="senha" class="input" placeholder="Senha"> <br> <br>
            
            <input type="submit" name="botaoCadastro" value="Criar">
        </form>

    </div>
</body>
</html>