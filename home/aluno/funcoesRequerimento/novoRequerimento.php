<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../styleAlunoFunctions.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Novo Requerimento!</title>

    <script>
        // Função para adicionar um novo input de professor
        function adicionarInputProfessor() {
            // Cria um novo elemento de input

            var nomeLabel = document.createElement("label");
            nomeLabel.textContent = "Nome do Professor: ";

            var emailLabel = document.createElement("label");
            emailLabel.textContent = "Email do Professor: ";

            var nomeProfessor = document.createElement("input");
            nomeProfessor.setAttribute("type", "text");
            nomeProfessor.setAttribute("name", "professores[]"); // Utiliza um array para armazenar os valores dos inputs

            var emailProfessor = document.createElement("input");
            emailProfessor.setAttribute("type", "email");
            emailProfessor.setAttribute("name", "emails[]"); // Utiliza um array para armazenar os valores dos inputs

            // Cria um elemento <br> para adicionar uma quebra de linha
            var quebraLinha1 = document.createElement("br");
            var quebraLinha2 = document.createElement("br");
            var quebraLinha3 = document.createElement("br");

            // Obtém o elemento div onde os novos inputs serão adicionados
            var divProfessores = document.getElementById("divProfessores");

            // Adiciona o novo input e a quebra de linha à div
            divProfessores.appendChild(nomeLabel);
            divProfessores.appendChild(nomeProfessor);
            divProfessores.appendChild(quebraLinha1);
            divProfessores.appendChild(emailLabel);
            divProfessores.appendChild(emailProfessor);
            divProfessores.appendChild(quebraLinha2);
            divProfessores.appendChild(quebraLinha3);
        }
    </script>
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
            <div class="turma-select">
                <select name='turma' id='turma' style='text-align: center;width: 250px ';>
                    <option value=''>Selecione a turma</option>
                    
                
            

        
        
            <?php
                include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

                $consulta = "SELECT idCursos FROM aluno WHERE matricula = '$_SESSION[matricula]'";
                $result = banco($server, $user, $password, $db, $consulta)->fetch_assoc();
                $idCurso = $result['idCursos'];

                $consulta = "SELECT id_turma, nome_turma FROM `turma` WHERE id_curso = '$idCurso'";
                $result = banco($server, $user, $password, $db, $consulta);
                $qtdTurmas = $result->num_rows;

                for ($i=0; $i < $qtdTurmas; $i++) { 
                    $linha = $result->fetch_assoc();
                    $idTurma = $linha['id_turma'];
                    $Turma = $linha['nome_turma'];
                    $idturma = $idTurma;
                    $turma = $Turma;

                    echo "<option name='turma' value='$idturma'>$turma</option>";
                }
                ?>
        </select>
        </div> <br/>

        <input type="date" name="dataInicio" class="input" placeholder="Data de início"><br>
        <input type="date" name="dataFinal" class="input" placeholder="Data de término"><br>
        <input type="text" name="endereco" class="input" placeholder="Endereço"><br>
        <input type="number" name="numero" class="input" placeholder="Número"><br>
        <input type="text" name="bairro" class="input" placeholder="Bairro"><br>
        <input type="text" name="cidade" class="input" placeholder="Cidade"><br>

        <input type="file" name="anexo" accept=".pdf"><br>

        <textarea name="obs" id="" cols="30" rows="10" placeholder="Observações"></textarea><br>

        <div id="divProfessores">
            <!-- Inputs de professores serão adicionados aqui -->
        </div>

        <!-- Botão para adicionar um novo input de professor -->
        <button type="button"   style ='width: 250px;height: 40px;margin-top: 30px;margin-bottom: 20px;border: none;border-radius: 10px;background: linear-gradient(180deg, #5C606A 20.33%, #8d97a3 62.07%);
        box-shadow: 0px 4px 5px 1px #00000040;color: #FFF;transition-duration: .3s;font-family: Sora;
        font-size: 18px;cursor: pointer;                                      'onclick="adicionarInputProfessor()">Adicionar Professor</button>


        <div class="checkbox-group">
            <div class="checkbox-item">
                <input type="checkbox" name="justificativaFalta" class="checkbox" value="jusFalta" id="justificativaFalta">
                <label for="justificativaFalta">Justificativa de Falta</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="segundaChamada" class="checkbox" value="segChamada" id="segundaChamada">
                <label for="segundaChamada">Segunda Chamada</label>
            </div>
        </div>

        <button type="submit" name="submitButton" class="submit_bttn">Enviar Requerimento</button>
    </form>

        
    </div>

    <?php
        extract($_POST);

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
                
                
                $consulta = "INSERT INTO `requerimentos`(`idRequerimentos`,`idAluno`, `idCurso`, `id_turma`, `objReq`, `dataInicio`, `dataFim`, `obs`, `anexos`, `status`, `registroEnviado`) VALUES ('NULL','$matricula','$idCursos', '$turma','$objeto','$dataInicio','$dataFinal','$obs','$destino','1','$data')";
                $result = banco_last_id($server, $user, $password, $db, $consulta);
                $idRequerimento = $result[1];
                
                for($i = 0; $i < count($professores); $i++){
                    if(!empty($professores[$i])){
                        $consulta = "INSERT INTO `docentes`(`idRequerimento`, `nomeDocente`, `emailDocente`) VALUES ('$idRequerimento','$professores[$i]','$emails[$i]')";
                        banco($server, $user, $password, $db, $consulta);
                    }
                }
            }
        }
    ?>

</body>
</html>