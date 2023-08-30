<?php
    extract($_POST);
    include "index.php";

    if (empty($usuario)){

        $_SESSION['msgIndex'] = "<div class='alert alert-danger' role='alert'>Informe o usuário.</div>";
        header('Location: index.php');

    }elseif(strlen($usuario) != 5){

        $_SESSION['msgIndex'] = "<div class='alert alert-warning' role='alert'>O número do usuário deve conter 5 digítos.</div><br/>";
        header('Location: index.php');

    }elseif(!is_numeric($usuario)){

        $_SESSION['msgIndex'] = "<div class='alert alert-warning' role='alert'>O usuário deve conter apenas números.</div></br>";
        header('Location: index.php');

    }elseif(empty($senha)){

        $_SESSION['msgIndex'] = "<div class='alert alert-danger' role='alert'>Informe a senha.</div></br>";
        header('Location: index.php');

    }else{
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO `sisadmin`(`idMaster`, `senha`) VALUES ('$usuario','$senha')";
        banco($server, $user, $password, $db, $consulta);
        header('Location: index.php');
        exit;

    }
?>