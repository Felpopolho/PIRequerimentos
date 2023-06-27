<?php
    extract($_POST);
    include "/xampp/htdocs/pirequerimentos-git/PIRequerimentos/const.php";

    switch (strlen($usuario)){
        case (5);
            if (isset($botaoLogin)){
                $consulta = "SELECT `idMaster`, `senha` FROM `sisadmin` WHERE idMaster='$usuario'";
                $result = banco($server, $user, $password, $db, $consulta);
        
                while ($linha = $result->fetch_assoc()){
                    if ($linha['idMaster'] == $usuario){
                        if($linha['senha'] == $senha){
                            header('Location: menuMaster.php');
                        }
                    }
                }
            }

        case (7);
            if (isset($botaoLogin)){
                $consulta = "SELECT `SIAPE`, `senha` FROM `adm/cores` WHERE SIAPE='$usuario'";
                $result = banco($server, $user, $password, $db, $consulta);
        
                while ($linha = $result->fetch_assoc()){
                    if ($linha['SIAPE'] == $usuario){
                        if($linha['senha'] == $senha){
                            if($linha['coord'] == 'cores'){
                                header('Location: menuCores.php');
                            }else{
                                header('Location: menuAdm.php');
                            }
                        }
                    }
                }
            }

        case (12);
            if (isset($botaoLogin)){
                $consulta = "SELECT `matricula`, `senha` FROM `user` WHERE matricula='$usuario'";
                $result = banco($server, $user, $password, $db, $consulta);
        
                while ($linha = $result->fetch_assoc()){
                    if ($linha['matricula'] == $usuario){
                        if($linha['senha'] == $senha){
                            header('Location: menuUser.php');
                        }
                    }
                }
            }

        default;
            header('Location: login.html');
            echo "Usuário ou senha incorretos";
            exit;
    }
    
?>