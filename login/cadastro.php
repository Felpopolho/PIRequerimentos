<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se!</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body>
    <?php
        session_start();
        extract($_POST);
        include "/xampp/htdocs/pirequerimentos-git/PIRequerimentos/const.php";

        if (isset($botaoCadastro)){
            $cadastrado = False;
            $consulta = "SELECT * FROM `aluno` WHERE `email` = '$email'";
            $result = banco($server, $user, $password, $db, $consulta);
            while ($linha = $result->fetch_assoc()){
                if ($linha['email'] == $email){
                    $cadastrado = True;
                }
            }

            if(strlen($matricula)!=12){

            $_SESSION['msgCadastro'] = "Número de matrícula incorreto.<br/>";

            }elseif($cadastrado == True){

            $_SESSION['msgCadastro'] = "Email já cadastrado.<br/>";

            }elseif($senha != $senha2){

            $_SESSION['msgCadastro'] = "As senhas não conferem<br/>";

            }else{

            $consulta = "INSERT INTO `aluno`(`matricula`, `nome`, `email`, `curso`, `turma`, `telefone`, `senha`) VALUES ('$matricula','$nome','$email', '$curso', '$turma', '$telefone', '$senha')";
            banco($server, $user, $password, $db, $consulta);
            header('Location: cadastro.php');

            }   
        }

        if (isset($_SESSION['msgCadastro'])){
            echo $_SESSION['msgCadastro'];
            unset($_SESSION['msgCadastro']);
        }
    ?>

    Crie uma nova conta:
    <form action="cadastro.php" method="post">
        Matrícula: <input type="text" name="matricula"><br>
        Nome completo: <input type="text" name="nome"><br>
        Email: <input type="text" name="email"><br>

        Curso: <br>
        <input type="radio" name="curso" id="ei" value="ei"> <label for="ei">Informática</label> <br>
        <input type="radio" name="curso" id="ed" value="ed"> <label for="ed">Edificações</label> <br>
        <input type="radio" name="curso" id="ema" value="ema"> <label for="ema">Meio Ambiente</label> <br>

        Turma:
        <select name="turma">
            <option value="">--Selecione a sua turma.--</option>
            <optgroup label="Informática">
                <option value="EI11">EI11</option>
                <option value="EI12">EI12</option>
                <option value="EI21">EI21</option>
                <option value="EI22">EI22</option>
                <option value="EI31">EI31</option>
                <option value="EI32">EI32</option>
                <option value="EI41">EI41</option>
            </optgroup>

            <optgroup label="Edificações">
                <option value="ED11">ED11</option>
                <option value="ED12">ED12</option>
                <option value="ED21">ED21</option>
                <option value="ED22">ED22</option>
                <option value="ED31">ED31</option>
                <option value="ED32">ED32</option>
                <option value="ED41">ED41</option>
            </optgroup>

            <optgroup label="Meio Ambiente">
                <option value="EMA11">EMA11</option>
                <option value="EMA12">EMA12</option>
                <option value="EMA21">EMA21</option>
                <option value="EMA22">EMA22</option>
                <option value="EMA31">EMA31</option>
                <option value="EMA32">EMA32</option>
                <option value="EMA41">EMA41</option>
            </optgroup>
        </select><br>

        Telefone: <input type="text" name="telefone" minlength="10" maxlength="12" onkeypress="$(this).mask('(00) 00000-0000')"><br>
        Senha: <input type="password" name="senha"><br>
        Repita a senha: <input type="password" name="senha2"><br>

        <input type="submit" name="botaoCadastro" value="Criar conta">
    </form>

    <a href="login.php">Já tem uma conta? Faça login.</a>
    
</body>
</html>