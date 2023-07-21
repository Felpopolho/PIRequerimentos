<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleCadastroPage.css">

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
            $consulta = "SELECT * FROM `aluno` WHERE `email` = '$email'";
            $result = banco($server, $user, $password, $db, $consulta);
            while ($linha = $result->fetch_assoc()){
                if ($linha['email'] == $email){
                    $cadastrado = True;
                }
            }

            if(strlen($matricula)!=12){

            $_SESSION['msgCadastro'] = "<div class='alert alert-danger' role='alert'>Número de matrícula incorreto.</div>";
            }elseif($cadastrado == True){

            $_SESSION['msgCadastro'] = "<div class='alert alert-warning' role='alert'>Email já cadastrado.</div>";

            }elseif($senha != $senha2){

            $_SESSION['msgCadastro'] = "<div class='alert alert-danger' role='alert'>As senhas não conferem.</div>";

            }else{
                $senha = password_hash($senha, PASSWORD_DEFAULT);

                $consulta = "INSERT INTO `aluno`(`matricula`, `nome`, `email`, `curso`, `turma`, `telefone`, `senha`) VALUES ('$matricula','$nome','$email', '$curso', '$turma', '$telefone', '$senha')";
                banco($server, $user, $password, $db, $consulta);
                $_SESSION['msgCadastro'] = "<div class='alert alert-success' role='alert'>Cadastro realizado com sucesso!</div>";
            }   
        }
    ?>

    

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
            <input type="text" name="email" class="input" placeholder="Email"><br>

            Curso: <br>
            <div class="input-curso">
                <input type="radio" name="curso" id="ei" value="ei" onchange="MudarTurma()"> <label for="ei">Informática</label> <br>
                <input type="radio" name="curso" id="ed" value="ed" onchange="MudarTurma()"> <label for="ed">Edificações</label> <br>
                <input type="radio" name="curso" id="ema" value="ema" onchange="MudarTurma()"> <label for="ema">Meio Ambiente</label> <br>
            </div> 
                
            <br>
            
             Turma: <br>
            <select name="turma" >
                <option id="x11" value="x11">11</option>
                <option id="x12" value="x12">12</option>
                <option id="x21" value="x21">21</option>
                <option id="x22" value="x22">22</option>
                <option id="x31" value="x31">31</option>
                <option id="x32" value="x32">32</option>
                <option id="x41" value="x41">41</option>
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
     
    <script>
        function MudarTurma(){
            var isEi = document.getElementById("ei");
            var isEd = document.getElementById("ed");
            var isEma = document.getElementById("ema");

            var x11 = document.getElementById("x11");
            var x12 = document.getElementById("x12");
            var x21 = document.getElementById("x21");
            var x22 = document.getElementById("x22");
            var x31 = document.getElementById("x31");
            var x32 = document.getElementById("x32");
            var x41 = document.getElementById("x41");

            if(isEi.checked == true){
                x11.innerHTML = "EI-11";
                x12.innerHTML = "EI-12";
                x21.innerHTML = "EI-21";
                x22.innerHTML = "EI-22";
                x31.innerHTML = "EI-31";
                x32.innerHTML = "EI-32";
                x41.innerHTML = "EI-41";

                x11.value = "EI11";
                x12.value = "EI12";
                x21.value = "EI21";
                x22.value = "EI22";
                x31.value = "EI31";
                x32.value = "EI32";
                x41.value = "EI41";
            }else if(isEd.checked == true){
                x11.innerHTML = "ED-11";
                x12.innerHTML = "ED-12";
                x21.innerHTML = "ED-21";
                x22.innerHTML = "ED-22";
                x31.innerHTML = "ED-31";
                x32.innerHTML = "ED-32";
                x41.innerHTML = "ED-41";

                x11.value = "ED11";
                x12.value = "ED12";
                x21.value = "ED21";
                x22.value = "ED22";
                x31.value = "ED31";
                x32.value = "ED32";
                x41.value = "ED41";
            }else if(isEma.checked == true){
                x11.innerHTML = "EMA-11";
                x12.innerHTML = "EMA-12";
                x21.innerHTML = "EMA-21";
                x22.innerHTML = "EMA-22";
                x31.innerHTML = "EMA-31";
                x32.innerHTML = "EMA-32";
                x41.innerHTML = "EMA-41";

                x11.value = "EMA11";
                x12.value = "EMA12";
                x21.value = "EMA21";
                x22.value = "EMA22";
                x31.value = "EMA31";
                x32.value = "EMA32";
                x41.value = "EMA41";
            }
        }
    </script>
</body>
</html>