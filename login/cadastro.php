<?php
    extract($_POST);
    include "/xampp/htdocs/pirequerimentos-git/PIRequerimentos/const.php";

    $cadastrado = False;

    $consulta = "SELECT * FROM `user` WHERE `email` = '$email'";
            $result = banco($server, $user, $password, $db, $consulta);
            
            while ($linha = $result->fetch_assoc()){
                if ($linha['email'] == $email){
                    $cadastrado = True;
                }
            }

    if (isset($botaoCadastro)){

        if(strlen($matricula)!=12){
          echo "Número de matrícula incorreto.";
            }elseif($cadastrado == True){
                echo "Email já cadastrado.";
                }elseif($senha != $senha2){
                    echo "As senhas não conferem";
                    }else{
                        $consulta = "INSERT INTO `user`(`matricula`, `nome`, `email`, `curso`, `turma`, `telefone`, `senha`) VALUES ('$matricula','$nome','$email', '$curso', '$turma', '$telefone', '$senha')";
                        banco($server, $user, $password, $db, $consulta);
                        header('Location: cadastro.html');
                    }   
    }
?>


