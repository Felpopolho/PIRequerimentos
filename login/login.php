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

        if (isset($_SESSION['idMaster'])){
            header('Location: masterLogin.php');
        }elseif (isset($_SESSION['SIAPE'])){
            header('Location: coordLogin.php');
        }elseif (isset($_SESSION['matricula'])){
            header('Location: alunoLogin.php');
        }

        if (isset($botaoLogin)){

            if (empty($usuario) or empty($userSenha)){

                $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                
            }else{
                switch (strlen($usuario)){
                    case (5);
                        $consulta = "SELECT `idMaster`, `senha` FROM `sisadmin` WHERE idMaster='$usuario' LIMIT 1";
                        $result = banco($server, $user, $password, $db, $consulta);

                        if ($result->num_rows > 0){
                            $linha = $result->fetch_assoc();
                            extract($linha);
                            if(password_verify($userSenha, $senha)){
                                $_SESSION['idMaster'] = $idMaster;	
                                header('Location: masterLogin.php');
                            }else{
                                $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                        }
                        break;
                        
    
                    case (7);
                        $consulta = "SELECT `SIAPE`, `senha` FROM `adm/cores` WHERE SIAPE='$usuario' LIMIT 1";
                        $result = banco($server, $user, $password, $db, $consulta);

                        if ($result->num_rows > 0){
                            $linha = $result->fetch_assoc();
                            extract($linha);
                            if(password_verify($userSenha, $senha)){
                                $_SESSION['SIAPE'] = $SIAPE;	
                                header('Location: coordLogin.php');
                            }else{
                                $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                        }
                        break;
    
                    case (12);
                        $consulta = "SELECT `matricula`, `senha` FROM `aluno` WHERE matricula='$usuario' LIMIT 1";
                        $result = banco($server, $user, $password, $db, $consulta);

                        if ($result->num_rows > 0){
                            $linha = $result->fetch_assoc();
                            extract($linha);
                            if(password_verify($userSenha, $senha)){
                                $_SESSION['matricula'] = $matricula;	
                                header('Location: alunoLogin.php');
                            }else{
                                $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                        }
                        break;
                    
                    default;
                        $_SESSION['msgLogin'] = "Usuário ou senha incorretos.</br>";
                        break;
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