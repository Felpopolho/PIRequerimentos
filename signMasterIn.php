<?php
    extract($_POST);
    include "index.php";

    if (empty($usuario)){

        $_SESSION['msgIndex'] = "<div class='alert alert-danger' role='alert'>Informe o usuário.</div></br>";

    }elseif(strlen($usuario) != 5){

        $_SESSION['msgIndex'] = "<div class='alert alert-warning' role='alert'>O número do usuário deve conter 5 digitos.</div><br/>";

    }elseif(!is_numeric($usuario)){

        $_SESSION['msgIndex'] = "<div class='alert alert-warning' role='alert'>O usuário deve conter apenas números.</div></br>";

    }elseif(empty($senha)){

        $_SESSION['msgIndex'] = "<div class='alert alert-danger' role='alert'>Informe a senha.</div></br>";

    }else{
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO `sisadmin`(`idMaster`, `senha`) VALUES ('$usuario','$senha')";
        banco($server, $user, $password, $db, $consulta);
        header('Location: index.php');
        exit;

    }

    header('Location: index.php');
    exit;
?>