<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleLoginPage.css">
    
    <title>Faça login!</title>
    
    <meta name="description" id="description" 
    content="Bem-vindo! Faça login no sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">

</head>
<body>
    <?php
        session_start();
        extract($_POST);
        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

        if (isset($_SESSION['idMaster'])){
            header('Location: ../home/home.php');
        }elseif (isset($_SESSION['SIAPE'])){
            header('Location: ../home/home.php');
        }elseif (isset($_SESSION['matricula'])){
            header('Location: ../home/home.php');
        }elseif (isset($_SESSION['SIAPEcores'])){
            header('Location: ../home/home.php');
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
                                header('Location: login.php');
                            }else{
                                $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                        }
                        break;
                        
    
                    case (7);
                        $consulta = "SELECT `SIAPE`, `senha`, `coord` FROM `coordenacao` WHERE SIAPE='$usuario' LIMIT 1";
                        $result = banco($server, $user, $password, $db, $consulta);

                        if ($result->num_rows > 0){
                            $linha = $result->fetch_assoc();
                            extract($linha);
                            if(password_verify($userSenha, $senha)){

                                if($coord == 0){
                                    $_SESSION['SIAPEcores'] = $SIAPE;
                                    header('Location: login.php');
                                }else{
                                    $_SESSION['SIAPE'] = $SIAPE;
                                    header('Location: login.php');
                                }
                            }else{
                                $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                            }
                        }else{
                            $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                        }
                        break;
    
                    case (12);
                        $consulta = "SELECT `matricula`, `senha`, `status` FROM `aluno` WHERE matricula='$usuario' LIMIT 1";
                        $result = banco($server, $user, $password, $db, $consulta);
                        
                        if ($result->num_rows > 0){
                            $linha = $result->fetch_assoc();

                            if ($linha['status'] == 1){    

                                if(password_verify($userSenha, $linha['senha'])){
                                
                                    $_SESSION['matricula'] = $linha['matricula'];
                                    header('Location: login.php');	
                                
                                }else{
                                    $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
                                }
                            }else{
                                $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Verifique a sua conta para continuar.</div>";
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
        }

    ?>

    <div class='header'>
        <div class='welcome'>
            <img class='logo' src='ifba_logo.png'>

            <img class='logo' src='SAR_logo_2.png'>
        </div>
    </div>

    <div class='container'>

        <br>

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