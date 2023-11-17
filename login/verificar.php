<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleLogin.css">
    
    <title>Verificação de conta!</title>
</head>
<body>

    <form action="" method="POST">
        <h2>Insira seu código de validação: </h2>
        <input type="text" name="codigo" placeholder="código">
        <input type="submit" name="botaoVerificar">
    </form>

    <?php
        session_start();
        extract($_POST);
        include "../const.php";

        if (isset($_SESSION['msgVerificar'])){
            echo $_SESSION['msgVerificar'];
            unset($_SESSION['msgVerificar']);
        }

        if (isset($botaoVerificar)){
            $consulta = "SELECT `codigo` FROM `aluno` WHERE matricula = $_GET[matricula]";
            $result = banco($server, $user, $password, $db, $consulta);
            $codigobanco = $result->fetch_assoc()['codigo'];

            if ($codigo == $codigobanco){
                $consulta = "UPDATE `aluno` SET `status`= 1 WHERE matricula = $_GET[matricula]";
                if(banco($server, $user, $password, $db, $consulta)){
                    $_SESSION['msgLogin'] = "<div class='alert alert-success' role='alert'>Cadastro realizado com sucesso!</div>";
                }
                header('Location: ../login.php');
            }else{
                $_SESSION['msgVerificar'] = "<div class='alert alert-danger' role='alert'>Código incorreto.</div>";
                header('Location: ../verificar.php/?&matricula='.$_GET['matricula'].'');
            }
        }
    ?>

</body>
</html>