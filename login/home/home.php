<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
        <link rel="stylesheet" href="styleHomePage.css">
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
    </head>

    <body>

    <?php
        session_start();
        if (isset($_SESSION['idMaster'])){
            echo   "<div class='header'>
                        <div class='welcome'>
                            <img id='ifLogo' src='ifba_logo.png'>

                            <img id='sarLogo' src='SAR_logo_2.png'>

                            <h2>Olá, Admin!</h2>
                        
                            <a href='sair.php' class='Btn'>
                                <div class='sign'>
                                    <svg viewBox='0 0 512 512'>
                                        <path d='M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z'></path>
                                    </svg>
                                </div>
                            </a>

                        </div>
                    </div>

                <div class='container'>
                    <div class='bloco'>
                        <div class='quantidade'>
                            <h2>cursos cadastrados</h2>
                        </div>
                            <a href='relatorio'><button class='meubotao'>Visualizar</button></a>
                    </div>

                    <div class='bloco'>
                        <div class='quantidade'>
                            <h2>Coordenadores cadastrados</h2>

                            <a href='relatorio'><button class='meubotao'>Visualizar</button></a>
                        </div>
                    </div>

                    <div class='bloco'>
                        <div class='quantidade'>
                            <h2>turmas cadastradas</h2>

                            <a href='relatorio'><button class='meubotao'>Visualizar</button></a>
                        </div>
                    </div>
                </div>";

        }elseif (isset($_SESSION['SIAPE'])){
            echo "<div class='titulo'>
                    <h1>Bem vindo, Coordenador!</h1>
                </div>

                <div class='sair'>
                    <a href='sair.php'>Sair</a>
                </div>

                <div class='bloco'>
                    <div class='quantidade'>
                        <h2>TEXTO COORDENADOR1</h2>
                    </div>

                    <div class='subtitulo'>
                        <h2>TEXTO COORDENADOR2</h2>
                    </div>

                    <a href='relatorio'><button>Visualizar</button></a>
                </div>";

        }elseif (isset($_SESSION['matricula'])){
            echo "<div class='titulo'>
                    <h1>Bem vindo, Aluno!</h1>
                </div>

                <div class='sair'>
                    <a href='sair.php'>Sair</a>
                </div>

                <div class='bloco'>
                    <div class='quantidade'>
                        <h2>TEXTO TEXTOALUNO1</h2>
                    </div>

                    <div class='subtitulo'>
                        <h2>TEXTO TEXTOALUNO2</h2>
                    </div>

                    <a href='relatorio'><button>Visualizar</button></a>
                </div>";
        }

    ?>

        

    </body>
</html>