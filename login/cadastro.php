<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleCadastro.css">

    <title>Cadastre-se!</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <meta name="description" id="description" 
    content="Bem-vindo! Cadastre-se no sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">

</head>
<body>
    

    <?php
        session_start();
        extract($_POST);
        include "../const.php";

        if (isset($botaoCadastro)){
            $cadastrado = False;
            $consulta = "SELECT * FROM `aluno` WHERE `matricula` = '$matricula'";
            $result = banco($server, $user, $password, $db, $consulta);
              
            while ($linha = $result->fetch_assoc()){
                if ($linha['matricula'] == $matricula){
                    $cadastrado = True;
                }
            }

            if(strlen($matricula)!=12){

            $_SESSION['msgCadastro'] = "<div class='alert alert-danger' role='alert'>Número de matrícula incorreto.</div>";
            
            }elseif($cadastrado == True){

            $_SESSION['msgCadastro'] = "<div class='alert alert-warning' role='alert'>Usuário já cadastrado.</div>";

            }elseif($senha != $senha2){

            $_SESSION['msgCadastro'] = "<div class='alert alert-danger' role='alert'>As senhas não conferem.</div>";

            }else{

                $senha = password_hash($senha, PASSWORD_DEFAULT); 
                $email = $matricula."@ifba.edu.br";

                $consulta = "INSERT INTO `aluno`(`matricula`, `nome`, `email`, `idCursos`, `telefone`, `senha`) VALUES ('$matricula','$nome', '$email', '$cursor', '$telefone', '$senha')";
                banco($server, $user, $password, $db, $consulta);
                $_SESSION['msgLogin'] = "<div class='alert alert-success' role='alert'>Cadastro realizado com sucesso!</div>";
                header("Location: login.php");
            }   
        }
    ?>

    <div class='header'>
        <div class='welcome'>
            <img class='logo' src='ifba_logo.png'>

            <img class='logo' src='SAR_logo_2.png'>
        </div>
    </div>

    <div class="container">
        
        <h1>Crie uma nova conta:</h1><br>

        <div class="error-msg">
            <?php
                if (isset($_SESSION['msgCadastro'])){
                echo $_SESSION['msgCadastro'];
                unset($_SESSION['msgCadastro']);
                }
            ?>
        </div>

        <form action="cadastro.php" method="post">
            
            <input type="text" name="matricula" class="input" placeholder="Matrícula"><br>
            <input type="text" name="nome" class="input" placeholder="Nome completo"><br>

            Curso: <br/>
            <select name='curso' id='curso' onchange='mudarTurma()'>
            <option value=''>Selecione o curso</option>
            <?php
                $consulta = "SELECT idCurso, nomeCurso FROM `curso` WHERE 1";
                $result = banco($server, $user, $password, $db, $consulta);

                $qtdCursos = $result->num_rows;

                for ($i=0; $i < $qtdCursos; $i++) { 
                    $linha = $result->fetch_assoc();
                    $idCurso = $linha['idCurso'];
                    $Curso = $linha['nomeCurso'];
                    $idcurso = $idCurso;
                    $curso = $Curso;

                    echo "<option name='cursor' value='$idcurso'>$curso</option>";
                }

                echo "</br>";
            ?>
            </select>

            <br>
                
            <input type="text" name="telefone" class="input" placeholder="Telefone" minlength="10" maxlength="12" onkeypress="$(this).mask('(00) 00000-0000')"><br>

            <input type="password" name="senha" class="input" placeholder="Senha"><br>
            <input type="password" name="senha2" class="input" placeholder="Repita a senha"><br>

            <input type="submit" name="botaoCadastro" value="Criar conta">

            <p>
                Já tem uma conta? 
                <a href="login.php">Faça login.</a>
            </p>
        </form>
    </div>
     
</body>
</html>