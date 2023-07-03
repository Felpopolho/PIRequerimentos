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
                        $consulta = "SELECT `idMaster`, `senha` FROM `sisadmin` WHERE idMaster='$usuario'";
                        $result = banco($server, $user, $password, $db, $consulta);
                        $linha = $result->fetch_assoc();
                        extract($linha);

                        if ($idMaster == $usuario){
                            if(password_verify($userSenha, $senha)){
                                echo "Funfou";
                                header('Location: menuMaster.php');
                            }else{
                                header('Location: login.php');
                            }
                        }else{
                            echo "nem achou o usuario";
                            header('Location: login.php');
                        }
    
                    case (7);
                        $consulta = "SELECT `SIAPE`, `senha` FROM `adm/cores` WHERE SIAPE='$usuario'";
                        $result = banco($server, $user, $password, $db, $consulta);
                        $linha = $result->fetch_assoc();
                        extract($linha);

                        if ($SIAPE == $usuario){
                            if(password_verify($userSenha, $senha)){
                                header('Location: menuAdm.php');
                            }else{
                                header('Location: login.php');
                            }
                        }else{
                            header('Location: login.php');
                        }
    
                    case (12);
                        $consulta = "SELECT `matricula`, `senha` FROM `aluno` WHERE matricula='$usuario'";
                        $result = banco($server, $user, $password, $db, $consulta);
                        $linha = $result->fetch_assoc();
                        extract($linha);

                        if ($matricula == $usuario){
                            if(password_verify($userSenha, $senha)){
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

    ?>

    <?php
        if (isset($_SESSION['msgLogin'])){
            echo $_SESSION['msgLogin'];
            unset($_SESSION['msgLogin']);
        }
    ?>

    Faça login!
    <form action="login.php" method="post">
        <input type="text" name="usuario">
        <input type="password" name="userSenha">
        
        <input type="submit" name="botaoLogin">
    </form>

    <a href="cadastro.php">Ainda não tem uma conta? Cadastre-se.</a>
</body>
</html>