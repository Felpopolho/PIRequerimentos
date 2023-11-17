<!DOCTYPE html>
<html lang="pt-BR">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Requerimentos enviados</title>
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
        <link rel="stylesheet" href="../styleAlunoFunctions.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
        <div class='header'>
            <div class='welcome'>
                <img class='logo' src='../../ifba_logo.png'>

                <img class='logo' src='../../SAR_logo_2.png'>
                    
                <h2>Requerimentos</h2>
                        
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

        <div class='container'>
            <div class='bloco'>
            <table id='table'>
                <thead>
                   <tr>
                        <th scope='col' onclick='sortTable(0)'>ID</th>
                        <th scope='col' onclick='sortTable(1)'>Matrícula</th>
                        <th scope='col' onclick='sortTable(2)'>Obj. de Requerimento</th>
                        <th scope='col' onclick='sortTable(3)'>Data início</th>
                        <th scope='col' onclick='sortTable(4)'>Data Final</th>
                        <th scope='col' onclick='sortTable(5)'>Observações</th>
                        <th scope='col' onclick='sortTable(6)'>Anexo</th>
                        <th scope='col' onclick='sortTable(7)'>Status</th>
                    </tr>
                </thead>

                <?php
                    session_start();
                    include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

                    if(!$_SESSION['matricula']){
                        $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Nem tenta.</div>";
                        header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/login/login.php'); #Sim, eu sei que isso dá erro, é o objetivo
                    }

                    $matricula = $_SESSION['matricula'];

                    $consulta = "SELECT * FROM `requerimentos` WHERE idAluno='$matricula'";
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

                        echo "
                            <tr>
                                <td>" . $idRequerimentos . "</td>
                                <td>" . $idAluno . "</td>
                                <td>" . $objeto . "</td>
                                <td>" . $dataInicio . "</td>
                                <td>" . $dataFim . "</td>
                                <td>" . $obs . "</td>
                                <td onclick=openFile($anexos)>" . "Atestado" . "</td>
                                <td>" . $status . "</td>
                            </tr>
                            ";
                        }
                ?>

                <script>
                    
                    function openFile($arquivo){
                        window.open($arquivo);
                    }

                </script>

                <script type="text/javascript" src="/PIRequerimentos/scripts/sortTable.js"></script>
            </table>
        </div>

    </body>
</html>