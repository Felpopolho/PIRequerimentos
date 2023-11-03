<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cursos Cadastrados</title>
        <link rel="stylesheet" href="../styleAdmFunctions.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
    </head>

    <body>
        <div class='header'>
            <div class='welcome'>
                <img class='logo' src='ifba_logo.png'>

                <img class='logo' src='SAR_logo_2.png'>
                    
                <h2>Cursos Cadastrados</h2>
                        
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

        <div class='container'>
            <div class='bloco'>
                <table id='table'>
                    <thead>
                        <tr>
                            <th scope='col' onclick='sortTable(0)'>ID</th>
                            <th scope='col' onclick='sortTable(1)'>Nome</th>
                            <th scope='col' onclick='sortTable(2)'>Coordenador</th>
                        </tr>
                    </thead>

                    <?php
                        include $_SERVER['DOCUMENT_ROOT'].'/PIRequerimentos/const.php';

                        $consulta = "SELECT * FROM curso";
                        $result = banco($server, $user, $password, $db, $consulta);

                        while ($linha = $result->fetch_assoc()){

                            $consulta2 = "SELECT nome FROM coordenacao WHERE SIAPE = $linha[coordenador]";
                            $result2 = banco($server, $user, $password, $db, $consulta2);

                            echo "
                                <tr>
                                    <td>" . $linha['idCurso'] . "</td>
                                    <td>" . $linha['nomeCurso'] . "</td>
                                    <td>" . $result2->fetch_assoc()['nome'] . "</td>
                                    
                                    <td>
                                    <form action='../funcoesRelatorio/admEditar.php' method='get'>
                                        <input name='idCurso' type='hidden' value='".$linha['idCurso']."'>
                                        <button class='action-bttn' type='submit'> <span class='material-icons md-36'>edit</span> </button>
                                    </form>
                                    </td>

                                    <td>
                                        <form action='../funcoesRelatorio/admDeletar.php' method='get'>
                                            <input name='idCurso' type='hidden' value='".$linha['idCurso']."'>
                                            <input name='nomeCurso' type='hidden' value='".$linha['nomeCurso']."'>
                                            <button class='action-bttn' type='submit'> <span class='material-icons'>delete</span> </button>
                                        </form>
                                    </td>
                                </tr>
                                ";
                            }
                        
                    ?>
                    <script src="/PIRequerimentos/scripts/sortTable.js"></script>
                </table>

            <?php
                echo "<a class='link' href='../funcoesRelatorio/incluirCurso.php'><button class='bttn'>Adicionar novo curso</button></a>"
            ?>

        </div>

    </body>
</html> 