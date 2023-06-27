<?php
    extract($_POST);
    include "/xampp/htdocs/pirequerimentos-git/PIRequerimentos/const.php";

    switch (strlen($usuario)){
        case (5);
            if (isset($botaoLogin)){
                $consulta = "SELECT `idMaster`, `userSenha` FROM `sisadmin` WHERE idMaster='$usuario'";
                $result = banco($server, $user, $password, $db, $consulta);
        
                while ($linha = $result->fetch_assoc()){
                    if ($linha['idMaster'] == $usuario){
                        if($linha['userSenha'] == $userSenha){
                            header('Location: menuMaster.php');
                        }
                    }
                }
            }

        case (7);
            if (isset($botaoLogin)){
                $consulta = "SELECT `SIAPE`, `userSenha` FROM `adm/cores` WHERE SIAPE='$usuario'";
                $result = banco($server, $user, $password, $db, $consulta);
        
                while ($linha = $result->fetch_assoc()){
                    if ($linha['SIAPE'] == $usuario){
                        if($linha['userSenha'] == $userSenha){
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
                $consulta = "SELECT `matricula`, `senha` FROM `aluno` WHERE matricula='$usuario'";
                $result = banco($server, $user, $password, $db, $consulta);
                $linha = $result->fetch_assoc();
                extract($linha);

                if ($matricula == $usuario){
                    if($senha == $userSenha){
                        header('Location: menuUser.php');
                    }else{
                        header('Location: login.html');
                    }
                }else{
                    header('Location: login.html');
                }
            }
    }
?>