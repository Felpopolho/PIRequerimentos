<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se!</title>
    <link rel="stylesheet" href="styleCadastro.css">

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

            $_SESSION['msgCadastro'] = "As senhas não conferem.<br/>";

            }else{
                $senha = password_hash($senha, PASSWORD_DEFAULT);

                $consulta = "INSERT INTO `aluno`(`matricula`, `nome`, `email`, `curso`, `turma`, `telefone`, `senha`) VALUES ('$matricula','$nome','$email', '$curso', '$turma', '$telefone', '$senha')";
                banco($server, $user, $password, $db, $consulta);
                $_SESSION['msgCadastro'] = "Cadastro realizado com sucesso.<br/>";
            }   
        }
    ?>

    <div class="error-msg">
        <?php
        
        if (isset($_SESSION['msgCadastro'])){
            echo $_SESSION['msgCadastro'];
            unset($_SESSION['msgCadastro']);
        }

        ?>
    </div>

    <div class="container">

        Crie uma nova conta:
        
        <form action="cadastro.php" method="post">

            Matrícula: <input type="text" name="matricula" class="input"><br>
            Nome completo: <input type="text" name="nome" class="input"><br>
            Email: <input type="text" name="email" class="input"><br>

            Curso: <br>
            <div class="input-curso">
                <input type="radio" name="curso" id="ei" value="ei" onchange="MudarTurma()"> <label for="ei">Informática</label> <br>
                <input type="radio" name="curso" id="ed" value="ed" onchange="MudarTurma()"> <label for="ed">Edificações</label> <br>
                <input type="radio" name="curso" id="ema" value="ema" onchange="MudarTurma()"> <label for="ema">Meio Ambiente</label> <br>
            </div>

            Turma:
                <select name="turma">
                    <option value="">--Selecione a sua turma.--</option>
                    
                        <option id="x11" value="x11">11</option>
                        <option id="x12" value="x12">12</option>
                        <option id="x21" value="x21">21</option>
                        <option id="x22" value="x22">22</option>
                        <option id="x31" value="x31">31</option>
                        <option id="x32" value="x32">32</option>
                        <option id="x41" value="x41">41</option>

                </select><br>
                
            Telefone: <input type="text" name="telefone" class="input" minlength="10" maxlength="12" onkeypress="$(this).mask('(00) 00000-0000')"><br>

            Senha: <input type="password" name="senha" class="input"><br>
            Repita a senha: <input type="password" name="senha2" class="input"><br>

            <input type="submit" name="botaoCadastro" value="Criar conta">
        </form>

        <p>
            Já tem uma conta? 
            <a href="login.php">Faça login.</a>
        </p>
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