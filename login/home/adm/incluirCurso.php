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
            if(isset($_SESSION['coordMsg'])){
                echo $_SESSION['coordMsg'];
                unset($_SESSION['coordMsg']);
            }
        ?>

        <form action="" method='POST'>
            <input name="nome" type="text" placeholder="Nome do curso"> <br/>
            <input name="coordenador" type="text" placeholder="SIAPE do Coordenador do curso"> <br/>
            <input name="addBtn" type="submit" value="Adicionar">
            <a href="relatorioCoordenadores.php">Cancelar</a>
        </form>

        <?php
            include "../../../const.php";
            extract($_POST);
            $consulta1 = "SELECT * FROM coordenacao WHERE SIAPE = '$coordenador'";
            $result1 = banco($server, $user, $password, $db, $consulta1);

            if(!isset($nome)){
                $_SESSION['coordMsg'] = "Insira o nome!";
            }elseif(!isset($coordenador)){
                $_SESSION['coordMsg'] = "Insira o SIAPE do coordenador!";
            }elseif(!is_numeric($coordenador)){
                $_SESSION['coordMsg'] = "O SIAPE deve conter apenas números!";
            }elseif($result1->num_rows == 0){
                $_SESSION['coordMsg'] = "Coordenador não encontrado, cadastre o coordenador antes de cadastrar um novo curso!";
            }else{
                $consulta = "INSERT INTO `curso`(`idCurso`, `coordenador`, `nomeCurso`) VALUES ('NULL','$coordenador','$nome')";
                banco($server, $user, $password, $db, $consulta);
                header('Location: relatorioCursos.php');
            }
        ?>
    </body>
</html>