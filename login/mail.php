<?php
    include_once "cadastro.php";
        // Configuração de envio de e-mail
        $matricula = $_GET['matricula'];

        $consulta = "SELECT `codigo` FROM `aluno` WHERE matricula = $matricula";
        $result = banco($server, $user, $password, $db, $consulta);
        $codigo = $result->fetch_assoc()['codigo'];

        $email = $_GET['email'];
        $remetente = 'pirequerimentos@gmail.com';
        $assunto = 'Validação de novo usuário';
        $mensagem = '
            <html>
            <body>
                <p>Olá aluno,</p>
                </br>
                <p>Este é o seu código de validação para criar sua conta no sistema de requerimentos institucionais: </p>
                <h1>'.$codigo.'</h1>
                </br>
                <p>Atenciosamente,</p>
                <p>Equipe de desenvolvimento do sistema de requerimentos institucionais</p>
            </body>
            </html>
        ';
        // Cabeçalhos do e-mail
        $cabecalhos = array(
            'From' => $remetente,
            'Reply-To' => $remetente,
            'Content-Type' => 'text/html',
        );

        

        echo $codigo;

        // Envie o e-mail
        if (mail($email, $assunto, $mensagem, $cabecalhos)) {
            $consulta = "UPDATE `aluno` SET `status`= 2 WHERE matricula = $matricula";
            banco($server, $user, $password, $db, $consulta);
            header('Location: ../verificar.php/?&matricula='.$matricula.'');
        } else {
            $_SESSION['msgLogin'] = "<div class='alert alert-warning' role='alert'>Email não encontrado, confira seus dados e tente novamente!</div>";
            header('Location: ../login.php');
        }
        
?>