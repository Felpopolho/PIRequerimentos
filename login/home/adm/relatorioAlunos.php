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
                        <th scope='col' onclick='sortTable(0)'>Matrícula</th>
                        <th scope='col' onclick='sortTable(1)'>Nome</th>
                        <th scope='col' onclick='sortTable(2)'>Email</th>
                        <th scope='col' onclick='sortTable(2)'>Curso</th>
                        <th scope='col' onclick='sortTable(2)'>Telefone</th>
                    </tr>
                </thead>

                <?php
                    include "../../../const.php";

                    $consulta = "SELECT matricula,nome,email,idCursos,telefone FROM aluno";
                    $result = banco($server, $user, $password, $db, $consulta);

                    while ($linha = $result->fetch_assoc()){

                        $consulta2 = "SELECT nomeCurso FROM curso WHERE idCurso = $linha[idCursos]";
                        $result2 = banco($server, $user, $password, $db, $consulta2);

                        echo "
                            <tr>
                                <td>" . $linha['matricula'] . "</td>
                                <td>" . $linha['nome'] . "</td>
                                <td>" . $linha['email'] . "</td>
                                <td>" . $result2->fetch_assoc()['nomeCurso'] . "</td>
                                <td>" . $linha['telefone'] . "</td>

                                <form action='editar.php' method='get'>
                                    <td><input name='matricula' type='hidden' value='".$linha['matricula']."'></td>
                                    <td><input type='submit' value='Editar'></td>
                                </form>

                                <form action='deletar.php' method='get'>
                                    <td><input name='matricula' type='hidden' value='".$linha['matricula']."'></td>
                                    <td><input type='submit' value='Deletar'></td>
                                </form>
                            </tr>
                            ";
                        }
                    
                ?>
            </table>
        </div>

    </body>
</html> 