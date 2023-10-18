<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <meta name="description" id="description" 
        content="Edição de dados">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="styleIncluir.css">
    </head>

    <body>
        <?php
            session_start();
            if(isset($_SESSION['coordMsg'])){
                echo $_SESSION['coordMsg'];
                unset($_SESSION['coordMsg']);
            }
        ?>

        <div class='header'>
            <div class='welcome'>
                <img class='logo' src='ifba_logo.png'>

                <h2>Adicionar Curso</h2>

                <img class='logo' src='SAR_logo_2.png'>
            </div>
        </div>
        
        <div class='container'>
            <form action="" method='POST'>
                <input name="nome" type="text" placeholder="Nome do curso"> <br/>
                <input name="coordenador" type="text" placeholder="SIAPE do Coordenador do curso"> <br/>
                <input name="addBtn" type="submit" class="bttn" value="Adicionar">
                <a class="link" href="../relatorios/relatorioCursos.php"><button class="cancel_bttn"> Cancelar </button></a>
            </form>

            <?php
                include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
                extract($_POST);

                if(isset($addBtn)){
                    $consulta1 = "SELECT * FROM coordenacao WHERE SIAPE = '$coordenador'";
                    $result1 = banco($server, $user, $password, $db, $consulta1);
                
                    if(!isset($nome)){
                        $_SESSION['coordMsg'] = "Insira o nome!";
                    }elseif(!isset($coordenador)){
                        $_SESSION['coordMsg'] = "Insira o SIAPE do coordenador!";
                    }elseif(!isset($coordenador)){
                        $_SESSION['coordMsg'] = "Insira o Coordenador!";
                    }elseif($result1->num_rows == 0){
                        $_SESSION['coordMsg'] = "Coordenador não encontrado, cadastre o coordenador antes de cadastrar um novo curso!";
                    }elseif(!is_numeric($coordenador)){
                        $_SESSION['coordMsg'] = "O SIAPE deve conter apenas números!";
                    }else{
                        $consulta = "INSERT INTO `curso`(`coordenador`, `nomeCurso`) VALUES ('$coordenador','$nome')";
                        banco($server, $user, $password, $db, $consulta);
                        header('Location: ../relatorios/relatorioCursos.php');
                    }
                }
            ?>
        </div>    
    </body>
</html>