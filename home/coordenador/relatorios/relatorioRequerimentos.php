<!DOCTYPE html>
<html lang="pt-BR">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
        <title>Requerimentos protocolados</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>

    <body>
        <div class='header'>
            <div class='welcome'>
                <img class='logo' src='../../ifba_logo.png'>

                <img class='logo' src='../../SAR_logo_2.png'>
                    
                <h2>Visualizar Requerimentos</h2>
                        
                <a href='../../home.php' class='Btn'>
                    <div class='sign'>
                        <span class='material-symbols-outlined'>arrow_back</span>
                    </div>
                </a>
            </div>
        </div>

        <div class='container'>
            <div class='bloco'>
                <table id='table'>
                    <thead>
                        <tr>
                            <th scope='col' onclick='sortTable(0)'>ID</th>
                            <th scope='col' onclick='sortTable(1)'>Matrícula</th>
                            <th scope='col' onclick='sortTable(2)'>Curso</th>
                            <th scope='col' onclick='sortTable(3)'>Turma</th>
                            <th scope='col' onclick='sortTable(4)'>Obj. de Requerimento</th>
                            <th scope='col' onclick='sortTable(5)'>Data início</th>
                            <th scope='col' onclick='sortTable(6)'>Data Final</th>
                            <th scope='col' onclick='sortTable(7)'>Observações</th>
                            <th scope='col' onclick='sortTable(8)'>Anexo</th>
                            <th scope='col' onclick='sortTable(9)'>Status</th>
                            <th scope='col' onclick='sortTable(10)'>Data de Envio</th>
                            <th scope='col' onclick='sortTable(11)'>Data de Protocolização</th>
                        </tr>
                    </thead>

                    <?php
                        session_start();
                        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

                        if(!$_SESSION['SIAPE']){
                            header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/login/login.php'); #Sim, eu sei que isso dá erro, é o objetivo
                        }

                        $consulta = "SELECT * FROM `requerimentos` WHERE `status`='2'";
                        $result = banco($server, $user, $password, $db, $consulta);

                        while ($linha = $result->fetch_assoc()){
                            extract($linha);
                            $caminho = $anexos;

                            if ($objReq == 1){
                                $objeto = "Justificativa de falta";
                            }else if ($objReq == 2){
                                $objeto = "2ª Chamada";
                            }

                            if ($status == 1){
                                $status = "Enviado";
                            }else if ($status == 2){
                                $status = "Protocolado";
                            }else if ($status == 3){
                                $status = "Deferido";
                            }else if ($status == 4){
                                $status = "Indeferido";
                            }else if ($status == 5){
                                $status = "Concluído";
                            }

                            $consulta = "SELECT nomeCurso FROM `curso` WHERE `idCurso`='$idCurso'";
                            $curso = banco($server, $user, $password, $db, $consulta);
                            $curso = $curso->fetch_assoc();

                            $consulta = "SELECT nome_turma FROM `turma` WHERE `id_turma`='$id_turma'";
                            $turma = banco($server, $user, $password, $db, $consulta);
                            $turma = $turma->fetch_assoc();

                            echo "
                                <tr>
                                    <td>" . $idRequerimentos . "</td>
                                    <td>" . $idAluno . "</td>
                                    <td>" . $curso['nomeCurso'] . "</td>
                                    <td>" . $turma['nome_turma'] . "</td>
                                    <td>" . $objeto . "</td>
                                    <td>" . $dataInicio . "</td>
                                    <td>" . $dataFim . "</td>
                                    <td>" . $obs . "</td>
                                    <td><a href='$anexos'>" . "Atestado" . "</a></td>
                                    <td>" . $status . "</td>
                                    <td>" . $registroEnviado . "</td>
                                    <td>" . $registroProtocolado . "</td>

                                    <td>
                                        <form action='../funcoesRelatorio/deferirRequerimento.php' method='GET'>
                                            <input name='idRequerimento' type='hidden' value='".$idRequerimentos."'>

                                            <button class='action-bttn' type='submit'> <span class='material-icons'>Deferir</span> </button>
                                        </form>

                                        <form action='../funcoesRelatorio/indeferirRequerimento.php' method='GET'>
                                            <input name='idRequerimento' type='hidden' value='".$idRequerimentos."'>

                                            <button class='action-bttn' type='submit'> <span class='material-icons'>Indeferir</span> </button>
                                        </form>
                                    </td>
                                </tr>
                                ";
                        }
                    ?>

                    <script>
                        
                        function openFile($arquivo){
                            tela = window.open($arquivo);
                        }

                    </script>

                    <script type="text/javascript" src="/PIRequerimentos/scripts/sortTable.js"></script>
                </table>
            </div>
        </div>

    </body>
</html>