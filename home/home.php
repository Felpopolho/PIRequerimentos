<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
        <link rel="stylesheet" href="styleHomePage.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
    </head>

    <body>
    <?php
        session_start();
        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

        if (isset($_SESSION['idMaster'])){
            echo   "
                <div class='header'>
                    <div class='welcome'>
                        <img class='logo' src='ifba_logo.png'>

                        <img class='logo' src='SAR_logo_2.png'>
                
                        <h2>Olá, Admin!</h2>
                    
                        <a href='sair.php' class='Btn'>
                            <div class='sign'>
                                <span class='material-symbols-outlined'>logout</span>
                            </div>
                        </a>

                    </div>
                </div>

                <div class='container'>
                    <div class='bloco'>
                        <div class='quantidade'>
                            <h1>";

                            $consulta = "SELECT COUNT(idCurso) FROM `curso`";
                            $result = banco($server, $user, $password, $db, $consulta);

                            echo $result->fetch_assoc()['COUNT(idCurso)'];

                      echo "</h1>
                        </div>
                        <h2>Cursos Cadastrados</h2>
                        <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioCursos.php'><button class='bttn'>Visualizar</button></a>
                    </div>

                    <div class='bloco'>
                        <div class='quantidade'>
                            <h1>";

                            $consulta = "SELECT COUNT(id_turma) FROM `turma`";
                            $result = banco($server, $user, $password, $db, $consulta);
                            echo $result->fetch_assoc()['COUNT(id_turma)'];

                      echo "</h1>
                        </div>
                        <h2>Turmas Cadastradas</h2>
                        <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioTurmas.php'><button class='bttn'>Visualizar</button></a>
                    </div>

                    <div class='bloco'>
                        <div class='quantidade'>
                            <h1>";

                            $consulta = "SELECT COUNT(SIAPE) FROM `coordenacao`";
                            $result = banco($server, $user, $password, $db, $consulta);

                            echo $result->fetch_assoc()['COUNT(SIAPE)'];
                            
                    echo "</h1>
                        </div>
                        <h2>Coordenadores Cadastrados</h2>
                        <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioCoordenadores.php'><button class='bttn'>Visualizar</button></a>
                    </div>

                    <div class='bloco'>
                        <div class='quantidade'>
                            <h1>";

                            $consulta = "SELECT COUNT(matricula) FROM `aluno`";
                            $result = banco($server, $user, $password, $db, $consulta);

                            echo $result->fetch_assoc()['COUNT(matricula)'];
                            
                       echo"</h1>
                        </div>
                        <h2>Alunos Cadastrados</h2>
                        <a class='link' href='/pirequerimentos/home/adm/relatorios/relatorioAlunos.php'><button class='bttn'>Visualizar</button></a>
                    </div>
                </div>";

        }elseif (isset($_SESSION['SIAPE'])){
            echo "<div class='titulo'>
                    <h1>Bem vindo, Coordenador!</h1>
                </div>

                <div class='sair'>
                    <a href='sair.php'>Sair</a>
                </div>

                <div class='bloco'>
                    <div class='quantidade'>
                        <h2>TEXTO COORDENADOR1</h2>
                    </div>

                    <div class='subtitulo'>
                        <h2>TEXTO COORDENADOR2</h2>
                    </div>

                    <a href='relatorio'><button>Visualizar</button></a>
                </div>";

        }elseif (isset($_SESSION['matricula'])){
            echo "
                <div class='header'>
                    <div class='welcome'>
                        <img class='logo' src='ifba_logo.png'>

                        <img class='logo' src='SAR_logo_2.png'>
                
                        <h2>Olá, Aluno!</h2>
                    
                        <a href='sair.php' class='Btn'>
                            <div class='sign'>
                                <span class='material-symbols-outlined'>logout</span>
                            </div>
                        </a>

                    </div>
                </div>

                <div class='container'>

                    <div class='bloco'>
                        <a class='link_aluno' href='/pirequerimentos/home/aluno/funcoesRequerimento/novoRequerimento.php'><button class='bttn_aluno'>Novo Requerimento</button></a>
                        <a class='link_aluno' href='/pirequerimentos/home/aluno/relatorios/relatorioRequerimentos.php'><button class='bttn_aluno'>Visualizar Requerimentos</button></a>
                    </div>

                </div>
                ";
        }else{
            $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Nem tenta.</div>";
            header('Location: ../login/login.php');
        }

    ?>
    </body>
</html>