<!DOCTYPE html>
<html lang="pt-BR">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
        <link rel="stylesheet" href="../styleAlunoFunctionsPage.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Requerimentos enviados</title>
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
                        <th scope='col' onclick='sortTable(2)'>Obj. de Requerimento</th>
                        <th scope='col' onclick='sortTable(3)'>Data início</th>
                        <th scope='col' onclick='sortTable(4)'>Data Final</th>
                        <th scope='col' onclick='sortTable(5)'>Observações</th>
                        <th scope='col' onclick='sortTable(6)'>Anexo</th>
                        <th scope='col' onclick='sortTable(7)'>Status</th>
                    </tr>
                </thead>

                <?php
                    include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
                    session_start();

                    $matricula = $_SESSION['matricula'];

                    $consulta = "SELECT * FROM `requerimentos` WHERE idAluno='$matricula'";
                    $result = banco($server, $user, $password, $db, $consulta);

                    while ($linha = $result->fetch_assoc()){
                        extract($linha);
                        $caminho = "/../../../" . $anexos;

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
                                <td>" . "<a href='$caminho' target='_blank'>Atestado</a>" . "</td>
                                <td>" . $status . "</td>
                            </tr>
                            ";
                        }
                ?>

                <script type="text/javascript" src="/PIRequerimentos/scripts/sortTable.js"></script>
            </table>
        </div>

    </body>
</html>