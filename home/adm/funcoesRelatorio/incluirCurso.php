<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <meta name="description" id="description" 
        content="Edição de dados">

        <link rel="stylesheet" href="../styleAdmFunctionsPage.css">
    </head>

    <body>

        <div class='header'>
            <div class='welcome'>
                <img class='logo' src='../relatorios/ifba_logo.png'>

                <img class='logo' src='../relatorios/SAR_logo_2.png'>
                    
                <h2>Incluir novo curso</h2>
                        
                <a href='../../home.php' class='Btn'>
                    <div class='sign'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                            <g clip-path="url(#clip0_161_37)">
                                <path d="M83.3332 45.8333H32.6248L55.9165 22.5416L49.9998 16.6666L16.6665 50L49.9998 83.3333L55.8748 77.4583L32.6248 54.1666H83.3332V45.8333Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_161_37">
                                    <rect width="100" height="100" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <div class="container">
            <div class="bloco">

                <h2>Preencha os dados do novo curso:</h2>
                <?php
                    session_start();
                    if(isset($_SESSION['cursoMsg'])){
                        echo $_SESSION['cursoMsg'];
                        unset($_SESSION['cursoMsg']);
                    }
                ?>

                <form action="" method='POST'>
                    <input name="nome" type="text" class="input" placeholder="Nome do curso"> <br/>
                    <input name="coordenador" type="text" class="input" placeholder="SIAPE do Coordenador do curso"> <br/>
                    <input name="addBtn" type="submit" class="bttn" value="Adicionar">
                    <button class="cancel_bttn"><a href="../relatorios/relatorioCursos.php">Cancelar</a></button>
                </form>
            </div>
        </div>
                    
            <?php

            include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

            if(isset($addBtn)){
                $consulta1 = "SELECT * FROM coordenacao WHERE SIAPE = '$coordenador'";
                $result1 = banco($server, $user, $password, $db, $consulta1);
            
                if(!isset($nome)){
                    $_SESSION['cursoMsg'] = "Insira o nome do curso!";
                }elseif(!isset($coordenador)){
                    $_SESSION['cursoMsg'] = "Insira o SIAPE do coordenador!";
                }elseif($result1->num_rows == 0){
                    $_SESSION['cursoMsg'] = "Coordenador não encontrado, cadastre o coordenador antes de cadastrar um novo curso!";
                }elseif(!is_numeric($coordenador)){
                    $_SESSION['cursoMsg'] = "O SIAPE deve conter apenas números!";
                }else{
                    $consulta = "INSERT INTO `curso`(`coordenador`, `nomeCurso`) VALUES ('$coordenador','$nome')";
                    banco($server, $user, $password, $db, $consulta);
                    header('Location: ../relatorios/relatorioCursos.php');
               }
            }
            ?>
        </div>    
    </body>
</html>