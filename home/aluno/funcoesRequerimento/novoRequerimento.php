<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styleAlunoFunctions.css">
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
        
        <h1>Faça um novo requerimento:</h1><br>

        <div class="error-msg">
            <?php
                if (isset($_SESSION['msgRequerimento'])){
                echo $_SESSION['msgRequerimento'];
                unset($_SESSION['msgRequerimento']);
                }
            ?>
        </div>

        <form action="novoRequerimento.php" method="post">
            
            <input type="text" name="nome" class="input" placeholder="Nome"><br>
            <input type="date" name="data" class="input" placeholder="Data"><br>
            <input type="text" name="endereco" class="input" placeholder="Endereço"><br>
            <input type="number" name="numero" class="input" placeholder="Número"><br>
            <input type="text" name="bairro" class="input" placeholder="Bairro"><br>
            <input type="text" name="cidade" class="input" placeholder="Cidade"><br>
            <input type="number" name="numero" class="input" placeholder="Número"><br>

            <input type="file" name="atestado" class="input" placeholder="Atestado"><br>

            <input type="textarea" name="obs" class="input" placeholder="Observações"><br>

            <input type="checkbox" name="justificativaFalta" value="1">Justificativa de Falta<br>
            <input type="checkbox" name="segundaChamada" value="2">Segunda Chamada<br>

            <input type="hidden" name="status" value="1">

            <button type="submit" name="abab">assdsa</button>
            

        </form>
        
    </div>

</body>
</html>