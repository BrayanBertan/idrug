<?php
	include('../../conexao.php');

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login_cadastro/login.php?msgErro=Entre para acessar o painel!');
        return;
    }

    $usuario =  $_SESSION['usuario'];

    $sql = "SELECT a.id, a.status,a.endereco,
    (CASE
        WHEN a.status = 1 THEN 'Em Análise'
        WHEN a.status = 2 THEN 'Pedido cancelado'
        WHEN a.status = 3 THEN 'Em Produção'
        WHEN a.status = 4 THEN 'Enviado'
        WHEN a.status = 5 THEN 'Saiu para entrega'
        WHEN a.status = 6 THEN 'Entregue'
        ELSE 'Status desconhecido'
    END) AS status_desc,
    (SELECT SUM(b.preco_pago_unitario * b.quantidade) FROM item AS b WHERE b.pedido = a.id)	AS total 
    FROM pedido AS a WHERE usuario = {$usuario['id']}";
    //echo $sql;
    $query = mysqli_query($conexao, $sql);
    $pedidos = [];
    while($pedido= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $pedidos[] = $pedido;
    }
    $quantidade_pedidos = mysqli_num_rows($query);

//    echo "<pre>";
//         print_r($pedidos);
//     echo "</pre>";
    
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="meus_pedidos.css">
        <title>Meus Pedidos</title>
    </head>
    <body>
    <div class="conteudo">
        <div class="lista-pedidos">
                <h3>Meus Pedidos</h3>
                <table>
                    <thead>
                        <tr>
                            <th>
                                Pedido
                            </th>
                            <th>
                                Total
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach($pedidos as $item){
                         
                        ?>
                            <tr>
                                <td >#<?php echo $item['id']?></td>
                                <td >R$<?php echo $item['total']?></td>
                                <td ><?php echo $item['status'].' '.$item['status_desc']?></td>
                                <td >
                                    <a href="detalhes_pedido.php?id=<?php echo $item['id']?>&total=<?php echo $item['total']?>&endereco=<?php echo $item['endereco']?>&status=<?php echo $item['status_desc']?>"><img src="../../assets/imagens/geral/pedidos.png"  alt="datalhes"></a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <p><?php echo $quantidade_pedidos.' pedido(s)' ?></p>
            </div>
            <a href="../home_usuario/home_usuario.php">Minha Conta</a>
        </div>
    </body>

</html>

<?php
	mysqli_close($conexao);
?>