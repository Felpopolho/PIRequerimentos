<?php
    extract($_POST);

    include "index.php";
    include "const.php";
    $consulta = "INSERT INTO `sisadmin`(`idMaster`, `senha`) VALUES ('$usuario','$senha')";
    
    banco($server, $user, $password, $db, $consulta);
?>