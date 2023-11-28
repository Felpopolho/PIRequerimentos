<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <link rel="stylesheet" href="form.css">
        <meta name="description" id="description" 
        content="Edição de dados">
    </head>

    <body>
<div class="container">
    <div clas ="editar"></div>
<?php
        session_start();
        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
        extract($_GET);

        if (isset($siape)){
            $consulta = "SELECT * FROM coordenacao WHERE SIAPE = $siape";
            $result = banco($server, $user, $password, $db, $consulta);
            $linha = $result->fetch_assoc();
             

            echo "
                <form action='' method='post'>
                    <input name='siape' type='text' value='".$linha['SIAPE']."' disabled> <br/>
                    <input name='nome' type='text' value='".$linha['nome']."'> <br/>    
                    <input name='email' type='text' value='".$linha['email']."'> <br/>
                    <input name='editBtn' type='submit' value='Editar'>
                    <a href='../relatorios/relatorioCoordenadores.php'>Cancelar</a>
                </form>
            ";
            
            extract($_POST);

            if(isset($editBtn)){
                $consulta = "UPDATE coordenacao SET nome = '$nome', email = '$email' WHERE SIAPE = $siape";
                $result = banco($server, $user, $password, $db, $consulta);
                header('Location: ../relatorios/relatorioCoordenadores.php');
            }

        }elseif(isset($idCurso)){
            $consulta = "SELECT * FROM curso WHERE idCurso = $idCurso";
            $result = banco($server, $user, $password, $db, $consulta);
            $linha = $result->fetch_assoc();

            echo "
                <form action='' method='post'>
                    <input name='idCurso' type='text' value='".$linha['idCurso']."' disabled> <br/>
                    <input name='nome' type='text' value='".$linha['nomeCurso']."'> <br/>    
                    <input name='coordenador' type='text' value='".$linha['coordenador']."'> <br/>
                    <input name='editBtn' type='submit' value='Editar'>
                    <a href='../relatorios/relatorioCursos.php'>Cancelar</a>
                </form>
            ";

            extract($_POST);

            if(isset($editBtn)){

                $consulta1 = "SELECT nome FROM coordenacao WHERE SIAPE = '$coordenador'";
                $result1 = banco($server, $user, $password, $db, $consulta1);

                if($result1->num_rows != 0){
                    $consulta = "UPDATE curso SET nomeCurso = '$nome', coordenador = '$coordenador' WHERE idCurso = $idCurso";
                    banco($server, $user, $password, $db, $consulta);
                    header('Location: ../relatorios/relatorioCursos.php');  
                }else{
                    echo "Coordenador não encontrado.";
                }
            }

        }elseif(isset($matricula)){
            $consulta = "SELECT * FROM aluno WHERE matricula = $matricula";
            $result = banco($server, $user, $password, $db, $consulta);
            $linha = $result->fetch_assoc();

            echo "
                <form action='' method='post'>
                    <input name='idCurso' type='text' value='".$linha['matricula']."' disabled> <br/>
                    <input name='nome' type='text' value='".$linha['nome']."'> <br/>    
                    <input name='email' type='text' value='".$linha['email']."'> <br/>
                    <input name='curso' type='text' value='".$linha['idCursos']."'> <br/>
                    <input name='telefone' type='text' value='".$linha['telefone']."'> <br/>
                    <input name='editBtn' type='submit' value='Editar'>
                    <a href='../relatorios/relatorioAlunos.php'>Cancelar</a>
                </form>
            ";

            extract($_POST);

            if(isset($editBtn)){

                $consulta1 = "SELECT * FROM curso WHERE idCurso = '$curso'";
                $result1 = banco($server, $user, $password, $db, $consulta1);

                if($result1->num_rows != 0){
                    $consulta = "UPDATE aluno SET nome = '$nome', email = '$email', idCursos = '$curso', telefone = '$telefone' WHERE matricula = $matricula";
                    banco($server, $user, $password, $db, $consulta);
                    header('Location: ../relatorios/relatorioAlunos.php');  
                }else{
                    echo "Curso não encontrado.";
                }
            }

        }elseif(isset($id_turma)){
            $consulta = "SELECT * FROM turma WHERE id_turma = $id_turma";
            $result = banco($server, $user, $password, $db, $consulta);
            $linha = $result->fetch_assoc();

            echo "
                <form action='' method='post'>
                    <input name='idCurso' type='text' value='".$linha['id_turma']."' disabled> <br/>
                    <input name='nome' type='text' value='".$linha['nome_turma']."'> <br/>    
                    <input name='editBtn' type='submit' value='Editar'>
                    <a href='../relatorios/relatorioTurmas.php'>Cancelar</a>
                </form>
            ";

            extract($_POST);

            if(isset($editBtn)){
                    $consulta = "UPDATE turma SET nome = '$nome' WHERE id_turma = $id_turma";
                    banco($server, $user, $password, $db, $consulta);
                    header('Location: ../relatorios/relatorioAlunos.php');  
                }else{
                    echo "Curso não encontrado.";
                }
            }

    ?>
    </body>
</html>
</div>
    