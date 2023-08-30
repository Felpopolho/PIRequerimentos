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

                $consulta = "INSERT INTO `aluno`(`matricula`, `nome`, `email`, `idCursos`, `idTurma`, `telefone`, `senha`) VALUES ('$matricula','$nome', '$email', '$cursor', '$turma', '$telefone', '$senha')";
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

            <?php
                $consulta = "SELECT idCursos, nomeCurso FROM `curso` WHERE 1";
                banco($server, $user, $password, $db, $consulta);
                $result = banco($server, $user, $password, $db, $consulta);


                $qtdCursos = $result->num_rows;

                echo "Curso: <br>
                <div class='input-curso'>";
                    

                for ($i=0; $i < $qtdCursos; $i++) { 
                    $linha = $result->fetch_assoc();
                    $idCurso = $linha['idCursos'];
                    $Curso = $linha['nomeCurso'];
                    $idcurso = $idCurso;
                    $curso = $Curso;

                    echo "<input type='radio' name='cursor' id='$idcurso' value='$idcurso' onchange='mudarTurma()'> <label for='$idcurso'>$curso</label> <br>";

                }

                echo "</div></br>";
            ?>

            Turma: <br>
            <select  id='seletor_turma' name='turma'>
                <script>
                    function mudarTurma() { 
                        var selectElement = document.getElementById("seletor_turma");

                        while (selectElement.options.length > 0) {
                            selectElement.remove(0);
                        }

                        const idCurso = document.querySelector('input[name="cursor"]:checked').value;
                        
                        fetch(`consulta.php?idCurso=${idCurso}`)
                            .then((response) => response.json())
                            .then((listaTurmas) => {
                                for (let i = 0; i < listaTurmas.length; i+=2) {
                                    var option = document.createElement("option");
                                    option.text = listaTurmas[i];
                                    option.value = listaTurmas[i+1];
                                    selectElement.appendChild(option);
                                }

                                console.log(listaTurmas);
                            })
                            .catch(error => console.error('Erro:', error));
                    }
                </script>
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