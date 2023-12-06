<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <meta name="description" id="description" 
        content="Edição de dados">

        <link rel="stylesheet" href="../styleAdmFunctions.css">
    </head>

    <body>
        <div class='header'>
            <div class='welcome'>
                <img class='logo' src='../relatorios/ifba_logo.png'>

                <img class='logo' src='../relatorios/SAR_logo_2.png'>
                    
                <h2>Incluir nova turma</h2>
                        
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
                <?php
                    session_start();
                    if(isset($_SESSION['coordMsg'])){
                        echo $_SESSION['coordMsg'];
                        unset($_SESSION['coordMsg']);
                    }
                ?>

                <form action="" method='POST'>
                    <h2>Preencha os dados da nova turma:</h2>
                    <label for="curso">Curso: </label><br>
                    <select name='curso' id='curso''>
                        <option value=''>Selecione o curso</option>

                        <?php
                            include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

                            $consulta = "SELECT idCurso, nomeCurso FROM `curso` WHERE 1";
                            $result = banco($server, $user, $password, $db, $consulta);
                            $qtdCursos = $result->num_rows;

                            for ($i=0; $i < $qtdCursos; $i++) { 
                                $linha = $result->fetch_assoc();
                                $idCurso = $linha['idCurso'];
                                $Curso = $linha['nomeCurso'];
                                $idcurso = $idCurso;
                                $curso = $Curso;

                                echo "<option name='curso' value='$idcurso'>$curso</option>";
                            }
                            ?>

                    </select> <br/>

                    <input name="nome" type="text" placeholder="Nome"> <br/>
                    <input name="addBtn" type="submit" value="Adicionar">
                    <button><a href="../relatorios/relatorioTurmas.php">Cancelar</a></button>
                </form>

            </div>
        </div>



<?php
            extract($_POST);
            
            if(isset($addBtn)){
                if(!isset($nome)){
                    $_SESSION['coordMsg'] = "Insira o nome!";
                }else{
                    $consulta = "INSERT INTO `turma`(`id_curso`, `nome_turma`) VALUES ('$curso', '$nome')";
                    banco($server, $user, $password, $db, $consulta);
                    header('Location: ../relatorios/relatorioTurmas.php');
                }
            }
        ?>
    </body>
</html>