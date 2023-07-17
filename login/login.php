<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleLoginPage.css">
    
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

                $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                
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
                            }else{
                                $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
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
                            }else{
                                $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
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
                            }else{
                                $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                        }
                        break;
                    
                    default;
                        $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                        break;
                }
            }
            header('Location: login.php');
        }

    ?>
    <div class='container'>

        <h1>Faça login!</h1><br>

        <div class="error-msg">
            <?php
                if (isset($_SESSION['msgLogin'])){
                    echo $_SESSION['msgLogin'];
                    unset($_SESSION['msgLogin']);
                }
            ?>
        </div>
        
        <form action="login.php" method="post">
            <input type="text" name="usuario" class="input" placeholder="Usuário"><br>
            <input type="password" name="userSenha" class="input" placeholder="Senha"><br>
            
            <input type="submit" name="botaoLogin" value="Login">
        </form>

        <p>
            Ainda não tem uma conta?
            <a href="cadastro.php">Cadastre-se.</a>
        </p>

    </div>
</body>
</html>