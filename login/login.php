<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça login!</title>
</head>
<body>
    <?php
        session_start();
        extract($_POST);
        include "/xampp/htdocs/pirequerimentos-git/PIRequerimentos/const.php";

        if (isset($botaoLogin)){

            if (empty($usuario) or empty($userSenha)){

                $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
    
            }else{
                switch (strlen($usuario)){
                    case (5);
                            $consulta = "SELECT `idMaster`, `userSenha` FROM `sisadmin` WHERE idMaster='$usuario'";
                            $result = banco($server, $user, $password, $db, $consulta);
                    
                            while ($linha = $result->fetch_assoc()){
                                if ($linha['idMaster'] == $usuario){
                                    if($linha['userSenha'] == $userSenha){
                                        header('Location: menuMaster.php');
                                    }
                                }
                        }
    
                    case (7);
                            $consulta = "SELECT `SIAPE`, `userSenha` FROM `adm/cores` WHERE SIAPE='$usuario'";
                            $result = banco($server, $user, $password, $db, $consulta);
                    
                            while ($linha = $result->fetch_assoc()){
                                if ($linha['SIAPE'] == $usuario){
                                    if($linha['userSenha'] == $userSenha){
                                        if($linha['coord'] == 'cores'){
                                            header('Location: menuCores.php');
                                        }else{
                                            header('Location: menuAdm.php');
                                        }
                                    }
                                }
                        }
    
                    case (12);
                            $consulta = "SELECT `matricula`, `senha` FROM `aluno` WHERE matricula='$usuario'";
                            $result = banco($server, $user, $password, $db, $consulta);
                            $linha = $result->fetch_assoc();
                            extract($linha);
    
                            if ($matricula == $usuario){
                                if($senha == $userSenha){
                                    header('Location: menuUser.php');
                                }else{
                                    header('Location: login.php');
                                }
                            }else{
                                header('Location: login.php');
                        }
                }
            }
        }

        if (isset($_SESSION['msgLogin'])){
            echo $_SESSION['msgLogin'];
            unset($_SESSION['msgLogin']);
        }
    ?>

    Faça login!
    <form action="login.php" method="post">
        <input type="text" name="usuario">
        <input type="text" name="userSenha">
        
        <input type="submit" name="botaoLogin">
    </form>

    <a href="cadastro.php">Ainda não tem uma conta? Cadastre-se.</a>
</body>
</html>