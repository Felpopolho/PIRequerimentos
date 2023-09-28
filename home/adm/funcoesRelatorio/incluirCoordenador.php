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
        <form action="" method='POST'>
            <input name="siape" type="text" placeholder="SIAPE"> <br/>
            <input name="nome" type="text" placeholder="Nome"> <br/>
            <input name="email" type="text" placeholder="Email"> <br/>
            <input name="senha" type="password" placeholder="Senha"> <br/>
            <input name="resenha" type="password" placeholder="Confirmar senha"> <br/>
            <input name="addBtn" type="submit" value="Adicionar">
            <a href="../relatorios/relatorioCoordenadores.php">Cancelar</a>
        </form>

        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
            extract($_POST);

            if(!isset($nome)){
                $_SESSION['coordMsg'] = "Insira o nome!";
            }elseif(!isset($email)){
                $_SESSION['coordMsg'] = "Insira o email!";
            }elseif(!isset($senha)){
                $_SESSION['coordMsg'] = "Insira a senha!";
            }elseif(!$senha == $resenha){
                $_SESSION['coordMsg'] = "As senhas não coincidem!";
            }else{
                $consulta = "INSERT INTO `coordenacao`(`SIAPE`, `nome`, `email`, `senha`) VALUES ('$siape','$nome','$email','password_hash($senha, PASSWORD_DEFAULT)')";
                banco($server, $user, $password, $db, $consulta);
                header('Location: ../relatorios/relatorioCoordenadores.php');
            }
        ?>
    </body>
</html>