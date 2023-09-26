<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <meta name="description" id="description" 
        content="Edição de dados">
    </head>

    <body>
    <?php
        session_start();
        include "../../../const.php";
        extract($_GET);

        if(isset($idCurso)){

            $consulta = "DELETE FROM `curso` WHERE idCurso = $idCurso";
            banco($server, $user, $password, $db, $consulta);
            header('Location: relatorioCursos.php');

        }elseif(isset($matricula)){

            $consulta = "DELETE FROM `aluno` WHERE matricula = $matricula";
            banco($server, $user, $password, $db, $consulta);
            header('Location: relatorioAlunos.php');

        }

    ?>
    </body>
</html>