<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
        <meta name="description" id="description" 
        content="Bem-vindo! Sistema integrado de requerimentos estudantis do IFBA Campus Eunápolis">
    </head>

    <body>
        <div class='header'>
            <div class='welcome'>
                <h2>Olá, Admin!</h2>
            
                <a href='../../home.php' class='Btn'>
                    <div class='sign'>
                        Sair
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
                                    <input type='submit' value='Editar'>
                                </form>
                                </td>

                                <td>
                                    <form action='../funcoesRelatorio/admDeletar.php' method='get'>
                                        <input name='idCurso' type='hidden' value='".$linha['idCurso']."'>
                                        <input name='nomeCurso' type='hidden' value='".$linha['nomeCurso']."'>
                                        <input type='submit' value='Deletar'>
                                    </form>
                                </td>
                            </tr>
                            ";
                        }
                    
                ?>
                <script src="/PIRequerimentos/scripts/sortTable.js"></script>
            </table>

            <?php
                echo "<a href='../funcoesRelatorio/incluirCurso.php'><button>Adicionar novo curso</button></a>"
            ?>

        </div>

    </body>
</html> 