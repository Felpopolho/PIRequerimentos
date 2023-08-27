<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
        <link rel="stylesheet" href="style.css">
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
    </head>

    <body>

    <?php
        session_start();
        if (isset($_SESSION['idMaster'])){
            echo   "<div class='titulo'>
                        <h1>Bem vindo, Admin!</h1>
                    </div>
                    <div class='sair'>
                        <a href='sair.php' class='botaosuperior'>Sair</a>
                    </div>

                    <div class='container'>
                        <div class='quantidade'>
                        <h2>cursos cadastrados</h2>
                        <a href='relatorio'><button class='meubotao'>Visualizar</button></a>
                        </div>
                        <div class='coordenadores'>
                        <h2>Coordenadores cadastrados</h2>
                        <a href='relatorio'><button class='meubotao'>Visualizar</button></a>
                        </div>
                        <div class='coordenadorees'>
                        <h2>turmas cadastradas</h2>
                        <a href='relatorio'><button class='meubotao'>Visualizar</button></a>
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