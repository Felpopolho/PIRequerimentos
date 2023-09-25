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
            
                <a href='../home.php' class='Btn'>
                    <div class='sign'>
                        sair
                    </div>
                </a>

            </div>
        </div>

        <div class='container'>
            <div class='bloco'>
            <table id='table'>
                <thead>
                   <tr>
                        <th scope='col' onclick='sortTable(0)'>SIAPE</th>
                        <th scope='col' onclick='sortTable(1)'>Nome</th>
                        <th scope='col' onclick='sortTable(2)'>Email</th>
                        <th scope='col' onclick='sortTable(2)'>Coordenação</th>
                    </tr>
                </thead>

                <?php
                    include "../../../const.php";

                    $consulta = "SELECT SIAPE,nome,email FROM coordenacao";
                    $result = banco($server, $user, $password, $db, $consulta);

                    while ($linha = $result->fetch_assoc()){

                        $consulta2 = "SELECT nomeCurso FROM curso WHERE coordenador = $linha[SIAPE]";
                        $result2 = banco($server, $user, $password, $db, $consulta2);

                        echo "
                            <tr>
                                <td>" . $linha['SIAPE'] . "</td>
                                <td>" . $linha['nome'] . "</td>
                                <td>" . $linha['email'] . "</td>
                                ";
                                
                                if($result2->num_rows > 0){
                                    echo "<td>" . $result2->fetch_assoc()['nomeCurso'] . "</td>";
                                }

                                echo "<form action='editar.php' method='get'>
                                    <td><input name='siape' type='hidden' value='".$linha['SIAPE']."'></td>
                                    <td><input type='submit' value='Editar'></td>
                                </form>
                            </tr>
                            ";
                        }
                ?>
            </table>

            <?php
                echo "<a href='incluirCoordenador.php'><button>Adicionar novo coordenador</button></a>"
            ?>

        </div>

    </body>
</html> 