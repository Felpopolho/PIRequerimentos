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
<?php
            session_start();
            include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
            extract($_GET);
            extract($_POST);

            if(isset($idCurso)){
                echo "
                    <form action='' method='POST'>
                        Confirma exclusão do curso $nomeCurso?
                        <input type='submit' name='sim' value='Sim'>
                        <input type='submit' name='nao' value='Não'>
                    ";

                    if(isset($sim)){
                        $consulta = "DELETE FROM `curso` WHERE idCurso = $idCurso";
                        banco($server, $user, $password, $db, $consulta);
                        header('Location: ../relatorios/relatorioCursos.php');
                    }elseif(isset($nao)){
                        header('Location: ../relatorios/relatorioCursos.php');
                    }
                

            }elseif(isset($matricula)){
                echo "
                    <form action='' method='POST'>
                        Confirma exclusão do aluno $nome?
                        <input type='submit' name='sim' value='Sim'>
                        <input type='submit' name='nao' value='Não'>
                    ";

                    if(isset($sim)){
                        $consulta = "DELETE FROM `aluno` WHERE matricula = $matricula";
                        banco($server, $user, $password, $db, $consulta);
                        header('Location: ../relatorios/relatorioAlunos.php');
                    }elseif(isset($nao)){
                        header('Location: ../relatorios/relatorioAlunos.php');
                    }
            }
        ?>
</div>       
        
    </body>
</html>