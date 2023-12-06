<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
        <link rel="stylesheet" href="styleHome.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
    </head>

    <body>
    <?php
        session_start();
        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

        if (isset($_SESSION['idMaster'])){
            header('Location: /PIRequerimentos/home/adm/homeAdm.php');
            exit();

        }elseif (isset($_SESSION['SIAPE'])){
            header('Location: /PIRequerimentos/home/coordenador/homeCoordenador.php');
            exit();

        }elseif (isset($_SESSION['matricula'])){
            header('Location: /PIRequerimentos/home/aluno/homeAluno.php');
            exit();

        }elseif (isset($_SESSION['SIAPEcores'])){
            header('Location: /PIRequerimentos/home/cores/homeCores.php');
            exit();

        }else{
            header('Location: ../login/login.php');
        }

    ?>
    </body>
</html>