<?php
	include('../../conexao.php');

    
    $sql = "SELECT a.*, b.nome FROM log AS a
    INNER JOIN usuario_gerenciamento AS b ON b.id = a.updatedBy";
    $query = mysqli_query($conexao, $sql);
    $logs = [];
    while($log= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $logs[] = $log;
    }
    $quantidade_logs = mysqli_num_rows($query);
    
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="log.css">
        <link rel="stylesheet" href="../menu/menu.css">
        <title>logs</title>
    </head>
    <body>
        <div class="conteudo">
            <div class="lista-logs">
                <h3>Logs</h3>
                <table>
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                atualizado em
                            </th>
                            <th>
                                atualizado por
                            </th>
                            <th>
                                tabela
                            </th>
                            <th>
                                ação
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach($logs as $item){
                         
                        ?>
                            <tr>
                                <td><?php echo $item['id']?></td>
                                <td><?php echo $item['updatedAt']?></td>
                                <td><?php echo $item['nome']?></td>
                                <td><?php echo $item['tabela']?></td>
                                <td><?php echo $item['tipo']?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <p><?php echo $quantidade_logs.' log(s)' ?></p>
            </div>
        </div>
    </body>

</html>