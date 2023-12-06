<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olá ADM</title>
    <link rel="stylesheet" href="../styleHome.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

    <div class='header'>
        <div class='welcome'>
            <img class='logo' src='../ifba_logo.png'>

            <img class='logo' src='../SAR_logo_2.png'>
    
            <h2>Olá, Admin!</h2>
        
            <a href='../sair.php' class='Btn'>
                <div class='sign'>
                    <span class='material-symbols-outlined'>logout</span>
                </div>
            </a>

        </div>
    </div>

    <div class='container'>
        <div class='bloco'>
            <div class='quantidade'>
                <h1>
                    <?php
                        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
                        $consulta = "SELECT COUNT(idCurso) FROM `curso`";
                        $result = banco($server, $user, $password, $db, $consulta);

                        echo $result->fetch_assoc()['COUNT(idCurso)'];
                    ?>
                </h1>
            </div>

            <h2>Cursos Cadastrados</h2>

            <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioCursos.php'><button class='bttn'>Visualizar</button></a>
        </div>

        <div class='bloco'>
            <div class='quantidade'>
                <h1>
                    <?php
                        $consulta = "SELECT COUNT(id_turma) FROM `turma`";
                        $result = banco($server, $user, $password, $db, $consulta);
                        echo $result->fetch_assoc()['COUNT(id_turma)'];
                    ?>
                </h1>
            </div>

            <h2>Turmas Cadastradas</h2>

            <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioTurmas.php'><button class='bttn'>Visualizar</button></a>
        </div>

        <div class='bloco'>
            <div class='quantidade'>
                <h1>
                    <?php
                        $consulta = "SELECT COUNT(SIAPE) FROM `coordenacao`";
                        $result = banco($server, $user, $password, $db, $consulta);

                        echo $result->fetch_assoc()['COUNT(SIAPE)'];
                    ?>
                </h1>
            </div>

            <h2>Coordenadores Cadastrados</h2>

            <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioCoordenadores.php'><button class='bttn'>Visualizar</button></a>
        </div>

        <div class='bloco'>
            <div class='quantidade'>
                <h1>
                    <?php
                        $consulta = "SELECT COUNT(matricula) FROM `aluno`";
                        $result = banco($server, $user, $password, $db, $consulta);

                        echo $result->fetch_assoc()['COUNT(matricula)'];
                    ?>
                </h1>
            </div>

            <h2>Alunos Cadastrados</h2>

            <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioAlunos.php'><button class='bttn'>Visualizar</button></a>
        </div>
    </div>";

</body>
</html>