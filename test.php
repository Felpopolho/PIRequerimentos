<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <button name="botao">Botão</button>
    </form>
<?php
    include "const.php";
        // Configuração de envio de e-mail

        if (isset($_POST['botao'])){
        $remetente = 'pirequerimentos@gmail.com';
        $assunto = 'Verificação de Nova Conta';
        $mensagem = '
            <html>
            <body>
                <p>Olá,</p>
                <p>Por favor, clique no link abaixo para verificar seu e-mail:</p>
                <a href="localhost/pirequerimentos/login/verificar.php?hash=' . 'hello world' . '">Verificar E-mail</a>
            </body>
            </html>
        ';
    
        // Cabeçalhos do e-mail
        $cabecalhos = array(
            'From' => $remetente,
            'Reply-To' => $remetente,
            'Content-Type' => 'text/html',
        );
    
        // Envie o e-mail
        // string $to,
        // string $subject,
        // string $message,
        // array|string $additional_headers = [],
        // string $additional_params = ""
    
        if (mail('202013600012@ifba.edu.br', $assunto, $mensagem, $cabecalhos)) {
            echo 'E-mail enviado com sucesso para ' . 'lipeoliveiratigre@gmail.com';
        } else {
            echo 'Erro ao enviar o e-mail';
        }
    
    // Exemplo de uso
}
    
?>
    
</body>
</html>