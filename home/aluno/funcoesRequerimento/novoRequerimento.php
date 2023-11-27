<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../styleAlunoFunctionsPage.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Novo Requerimento!</title>
</head>
<body>  
    
    <div class='header'>
        <div class='welcome'>
            <img class='logo' src='../../ifba_logo.png'>

            <img class='logo' src='../../SAR_logo_2.png'>
                
            <h2>Crie um novo Requerimento!</h2>
                    
            <a href='../../home.php' class='Btn'>
                <div class='sign'>
                    <span class='material-symbols-outlined'>arrow_back</span>
                </div>
            </a>
        </div>
    </div>

    <div class="container">
        
        <h1>Faça um novo requerimento:</h1><br>

        <div class="error-msg">
            <?php
                session_start();
                if (isset($_SESSION['msgRequerimento'])){
                echo $_SESSION['msgRequerimento'];
                unset($_SESSION['msgRequerimento']);
                }
            ?>
        </div>

        <form action="novoRequerimento.php" method="post" enctype="multipart/form-data">
            
            <input type="date" name="dataInicio" class="input" placeholder="Data de início"><br>
            <input type="date" name="dataFinal" class="input" placeholder="Data de término"><br>
            <input type="text" name="endereco" class="input" placeholder="Endereço"><br>
            <input type="number" name="numero" class="input" placeholder="Número"><br>
            <input type="text" name="bairro" class="input" placeholder="Bairro"><br>
            <input type="text" name="cidade" class="input" placeholder="Cidade"><br>

            <input type="file" name="anexo" accept=".pdf"><br>

            <textarea name="obs" id="" cols="30" rows="10" placeholder="Observações"></textarea><br>

            <input type="checkbox" name="justificativaFalta" class="checkbox" value="jusFalta">Justificativa de Falta<br>
            <input type="checkbox" name="segundaChamada" class="checkbox" value="segChamada">Segunda Chamada<br>

            <input type="hidden" name="status" value="1">

            <button type="submit" name="submitButton" class="submit_bttn">Enviar Requerimento</button>

        </form>
        
    </div>

    <?php
        extract($_POST);
        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

        if(!$_SESSION['matricula']){
            $_SESSION['msgLogin'] = "<div class='alert alert-danger' role='alert'>Nem tenta.</div>";
            header('Location: '.$_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/login/login.php'); #Sim, eu sei que isso dá erro, é o objetivo
        }

        $consulta = "SELECT matricula,nome,email,idCursos,telefone FROM aluno WHERE matricula = '$_SESSION[matricula]'";
        $result = banco($server, $user, $password, $db, $consulta)->fetch_assoc();
        
        if(isset($_POST['submitButton'])){

            $matricula = $result['matricula'];
            $nome = $result['nome'];   
            $email = $result['email'];
            $idCursos = $result['idCursos'];
            $telefone = $result['telefone'];

            if(empty($dataInicio)){

                $_SESSION['msgRequerimento'] = "Informe a data de início do requerimento!";
                header('Location: novoRequerimento.php');

            }elseif(empty($dataFinal)){

                $_SESSION['msgRequerimento'] = "Informe a data de término do requerimento!";
                header('Location: novoRequerimento.php');

            }elseif(empty($endereco)){

                $_SESSION['msgRequerimento'] = "Informe o endereço completo!";
                header('Location: novoRequerimento.php');

            }elseif(empty($numero)){

                $_SESSION['msgRequerimento'] = "Informe o endereço completo!";
                header('Location: novoRequerimento.php');

            }elseif(empty($bairro)){

                $_SESSION['msgRequerimento'] = "Informe o endereço completo!";
                header('Location: novoRequerimento.php');

            }elseif(empty($cidade)){

                $_SESSION['msgRequerimento'] = "Informe o endereço completo!";
                header('Location: novoRequerimento.php');

            }elseif(!isset($_FILES['anexo'])){

                $_SESSION['msgRequerimento'] = "Anexe o documento!";
                header('Location: novoRequerimento.php');

            }elseif($_FILES['anexo']['size'] >= 4194304 || $_FILES['anexo']['size'] == 0){

                $_SESSION['msgRequerimento'] = "Tamanho máximo suportado: 4MB!";
                header('Location: novoRequerimento.php');

            }elseif($_FILES['anexo']['type'] != 'application/pdf'){

                $_SESSION['msgRequerimento'] = "Formato não suportado. Anexe um PDF!";
                header('Location: novoRequerimento.php');

            }elseif((!isset($justificativaFalta)) and (!isset($segundaChamada))){

                $_SESSION['msgRequerimento'] = "Informe o objeto do requerimento requerimento!";
                header('Location: novoRequerimento.php');

            }else{
                $temporario = explode(".", $_FILES['anexo']['name']);
                $nomeAnexo = $_SESSION['matricula'] . "_" . date('Y-m-d H:i:s') . "." . end($temporario);
                $nomeAnexo = preg_replace("/[^a-zA-Z0-9_.]/", "_", $nomeAnexo);
                
                $destino = $_SERVER['DOCUMENT_ROOT'] . "/PIRequerimentos/anexos/" . $nomeAnexo;

                move_uploaded_file($_FILES['anexo']['tmp_name'], $destino);

                isset($segundaChamada) ? $objeto = 2 : $objeto = 1;
                $data = date('Y-m-d H:i:s');

                $consulta = "INSERT INTO `requerimentos`(`idRequerimentos`,`idAluno`, `idCurso`, `objReq`, `dataInicio`, `dataFim`, `obs`, `anexos`, `status`, `registroEnviado`) VALUES ('NULL','$matricula','$idCursos','$objeto','$dataInicio','$dataFinal','$obs','$destino','$status','$data')";
                banco($server, $user, $password, $db, $consulta);
            }

        }
    ?>

</body>
</html>