<?php
    extract($_POST);
    include "index.php";

    if (strlen($usuario) == 5){
        if (isset($botaoCadastro)){
            $consulta = "INSERT INTO `sisadmin`(`idMaster`, `senha`) VALUES ('$usuario','$senha')";
            banco($server, $user, $password, $db, $consulta);
            header('Location: index.php');
            exit;
        }
    }else{
        header('Location: index.php');
        exit;
    }
?>