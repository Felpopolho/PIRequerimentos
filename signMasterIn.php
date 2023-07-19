<?php
    extract($_POST);
    include "index.php";

    if (empty($usuario)){

        $_SESSION['msgIndex'] = "Informe o usuário.</br>";
        header('Location: index.php');

    }elseif(strlen($usuario) != 5){

        $_SESSION['msgIndex'] = "O número do usuário deve conter 5 digítos.<br/>";
        header('Location: index.php');

    }elseif(!is_numeric($usuario)){

        $_SESSION['msgIndex'] = "O usuário deve conter apenas números.</br>";
        header('Location: index.php');

    }elseif(empty($senha)){

        $_SESSION['msgIndex'] = "Informe a senha.</br>";
        header('Location: index.php');

    }else{
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $consulta = "INSERT INTO `sisadmin`(`idMaster`, `senha`) VALUES ('$usuario','$senha')";
        banco($server, $user, $password, $db, $consulta);
        header('Location: index.php');
        exit;

    }
?>