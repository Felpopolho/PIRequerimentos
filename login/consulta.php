<?php
    // consulta.php
    include "../const.php";

    // Receber o parâmetro idCurso da solicitação
    $idCurso = $_GET['idCurso'];

    // Consulta SQL
    $consulta = "SELECT idTurmas, nomeTurma FROM turmas WHERE idCurso = '$idCurso'";
    $result = banco($server, $user, $password, $db, $consulta);
    
    //Preparar os resultados em um array
    $listaTurmas = array();
    if ($result->num_rows > 0) {
        for ($i = 0; $i < $result->num_rows*2; $i+=2) {
            $row = $result->fetch_assoc();
            $listaTurmas[$i] = $row['nomeTurma'];
            $listaTurmas[$i+1] = $row['idTurmas']; 
        }
    }
    
    //Enviar os resultados como JSON
    header('Content-Type: application/json');
    echo json_encode($listaTurmas); //Echo aqui

    // Remova qualquer outro conteúdo HTML ou PHP após o echo acima.
?>