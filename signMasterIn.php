<?php
    extract($_POST);
    include "index.php";

    if (empty($usuario)){

        $_SESSION['msgIndex'] = "Informe o usuário.</br>";

    }elseif(strlen($usuario) != 5){

        $_SESSION['msgIndex'] = "O número do usuário deve conter 5 digítos.<br/>";

    }elseif(!is_numeric($usuario)){

        $_SESSION['msgIndex'] = "O usuário deve conter apenas números.</br>";

    }elseif(empty($senha)){

        $_SESSION['msgIndex'] = "Informe a senha.</br>";

    }else{

        $consulta = "INSERT INTO `sisadmin`(`idMaster`, `senha`) VALUES ('$usuario','$senha')";
        banco($server, $user, $password, $db, $consulta);
        header('Location: index.php');
        exit;

    }

    header('Location: index.php');
    exit;
?>