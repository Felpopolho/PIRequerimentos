<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <meta name="description" id="description" 
        content="Edição de dados">

        <link rel="stylesheet" href="../styleAdmFunctions.css">
    </head>

    <body>
        <div class='header'>
            <div class='welcome'>
                <img class='logo' src='../relatorios/ifba_logo.png'>

                <img class='logo' src='../relatorios/SAR_logo_2.png'>
                    
                <h2>Incluir novo coordenador</h2>
                        
                <a href='../../home.php' class='Btn'>
                    <div class='sign'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                            <g clip-path="url(#clip0_161_37)">
                                <path d="M83.3332 45.8333H32.6248L55.9165 22.5416L49.9998 16.6666L16.6665 50L49.9998 83.3333L55.8748 77.4583L32.6248 54.1666H83.3332V45.8333Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_161_37">
                                    <rect width="100" height="100" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        

        <div class="container">
            <div class="bloco">
                <?php
                    session_start();
                    if(isset($_SESSION['coordMsg'])){
                        echo $_SESSION['coordMsg'];
                        unset($_SESSION['coordMsg']);
                    }
                ?>

                <form action="" method='POST'>
                    <h2>Preencha os dados do novo coordenador:</h2>
                    <input name="siape" type="text" placeholder="SIAPE"> <br/>
                    <input name="nome" type="text" placeholder="Nome"> <br/>
                    <input name="email" type="text" placeholder="Email"> <br/>
                    <input name="senha" type="password" placeholder="Senha"> <br/>
                    <input name="resenha" type="password" placeholder="Confirmar senha"> <br/>
                    <input name="addBtn" type="submit" value="Adicionar">
                    <button><a href="../relatorios/relatorioCoordenadores.php">Cancelar</a></button>
                </form>

            </div>
        </div>

        

        <?php
            include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';
            extract($_POST);

            if(isset($addBtn)){
                if(strlen($siape)<7){
                    $_SESSION['coordMsg'] = "SIAPE inválido!";
                }elseif(!isset($nome)){
                    $_SESSION['coordMsg'] = "Insira o nome!";
                }elseif(!isset($email)){
                    $_SESSION['coordMsg'] = "Insira o email!";
                }elseif(!isset($senha)){
                    $_SESSION['coordMsg'] = "Insira a senha!";
                }elseif(!$senha == $resenha){
                    $_SESSION['coordMsg'] = "As senhas não coincidem!";
                }else{
                    $consulta = "INSERT INTO `coordenacao`(`SIAPE`, `nome`, `email`, `senha`) VALUES ('$siape','$nome','$email','password_hash($senha, PASSWORD_DEFAULT)')";
                    try{
                        banco($server, $user, $password, $db, $consulta);
                    }catch(Exception $e){
                        $_SESSION['coordMsg'] = "Erro ao cadastrar coordenador!";
                    }
                    header('Location: ../relatorios/relatorioCoordenadores.php');
                }
            }
        ?>
    </body>
</html>