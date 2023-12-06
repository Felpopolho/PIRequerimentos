<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olá CORES</title>
    <link rel="stylesheet" href="../styleHome.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<div class='header'>
        <div class='welcome'>
            <img class='logo' src='../ifba_logo.png'>

            <img class='logo' src='../SAR_logo_2.png'>
    
            <h2>Olá, CORES!</h2>
        
            <a href='../sair.php' class='Btn'>
                <div class='sign'>
                    <span class='material-symbols-outlined'>logout</span>
                </div>
            </a>

        </div>
    </div>
    <div class="container">
        <div class='bloco'>
            <div class='quantidade'>
                <h1>
                    <?php
                        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
                        $consulta = "SELECT COUNT(idRequerimentos) FROM `requerimentos` WHERE `status` = '1'";
                        $result = banco($server, $user, $password, $db, $consulta);

                        echo $result->fetch_assoc()['COUNT(idRequerimentos)'];
                    ?>
                </h1>
            </div>

            <h2>Requerimentos não protocolados</h2>

            <a class='link_aluno' href='/pirequerimentos/home/cores/relatorios/relatorioRequerimentos.php'><button class='bttn_aluno'>Visualizar Requerimentos</button></a>
        </div>
    </div>
    
</body>
</html>