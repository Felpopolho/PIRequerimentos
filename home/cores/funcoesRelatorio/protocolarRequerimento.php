<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação</title>
</head>
<body>
    Confirma protocolização do requerimento?
    
    <form action='' method='post'>
        <button class='action-bttn' type='submit' name='protocolar'> <span class='material-icons'>Sim</span> </button>
    </form>

    <a href='../relatorios/relatorioRequerimentos.php'><button class='action-bttn'> <span class='material-icons'>Não</span> </button></a>

    <?php
        session_start();
        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
        
        $idRequerimento = $_GET['idRequerimento'];

        if(isset($_POST['protocolar'])){
            $data = date('Y-m-d H:i:s');
            $consulta = "UPDATE `requerimentos` SET `status`='2', `registroProtocolado`='$data' WHERE `idRequerimentos`='$idRequerimento'";
            banco($server, $user, $password, $db, $consulta);
            header('Location: ../relatorios/relatorioRequerimentos.php');
        }
    ?>
    
</body>
</html>

