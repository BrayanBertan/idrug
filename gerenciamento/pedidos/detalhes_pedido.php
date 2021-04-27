<?php
    include('../../conexao.php');
    $pedido = $_GET['id'];
    $total = $_GET['total'];
    $endereco = $_GET['endereco'];
    $status = $_GET['status'];
   
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login_cadastro/login.php?msgErro=Entre para acessar o painel!');
        return;
    }

    if(isset($_GET['status_pedido'])){
        $sql = "UPDATE pedido SET status = {$_GET['status_pedido']} WHERE id = '$pedido'";
        $query = mysqli_query($conexao, $sql);
        $status = '';
        switch($_GET['status_pedido']){
            case  1 : $status = 'Em Análise';
            break;
            case  2 : $status = 'Em Produção';
            break;
            case  3 : $status = 'Enviado';
            break;
            case  4 : $status = 'Saiu para entrega';
            break;
            case  6 : $status = 'Pedido cancelado';
        }
    }


    $usuario =  $_SESSION['usuario'];

    $sql = "SELECT a.*,b.nome,b.foto FROM item as a INNER JOIN produto AS b ON b.id = a.produto WHERE a.pedido = '$pedido'";
    //echo $sql;
    $query = mysqli_query($conexao, $sql);
    $itens = [];
    while($item= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $itens[] = $item;
    }
    $quantidade_itens = mysqli_num_rows($query);

//    echo "<pre>";
//         print_r($itens);
//     echo "</pre>";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../site/meus_pedidos/meus_pedidos.css">
        <title>Detalhes do pedido</title>
    </head>
    <body>
        <div class="conteudo">
            <h1>Pedido #<?php echo $pedido?></h1>
            <ul>
                <?php 
                    foreach($itens as $produto){
                ?>
                    <li><img src="../../<?php echo $produto['foto']?>" alt=""><?php echo $produto['nome'].'   R$'.$produto['preco_pago_unitario'].'   x'.$produto['quantidade'].' =   R$'.($produto['quantidade']*$produto['preco_pago_unitario'])?></li>
                <?php 
                        
                    }
                ?>
            </ul>
            <h3>Total:R$<?php echo $total?></h3>
            <p><?php echo $status?></p>
            <a href="pedidos.php">Pedidos</a>       
            <a href="detalhes_pedido.php?id=<?php echo $pedido?>&total=<?php echo $total?>&endereco=<?php echo $endereco?>&status=<?php echo $status?>&status_pedido=6"><button type="button">Cancelar Pedido</button></a>
            <a href="detalhes_pedido.php?id=<?php echo $pedido?>&total=<?php echo $total?>&endereco=<?php echo $endereco?>&status=<?php echo $status?>&status_pedido=1"><button type="button">Voltar para Analise</button></a>
            <a href="detalhes_pedido.php?id=<?php echo $pedido?>&total=<?php echo $total?>&endereco=<?php echo $endereco?>&status=<?php echo $status?>&status_pedido=2"><button type="button">Iniciar produção</button></a>
            <a href="detalhes_pedido.php?id=<?php echo $pedido?>&total=<?php echo $total?>&endereco=<?php echo $endereco?>&status=<?php echo $status?>&status_pedido=3"><button type="button">Enviar</button></a>
            <a href="detalhes_pedido.php?id=<?php echo $pedido?>&total=<?php echo $total?>&endereco=<?php echo $endereco?>&status=<?php echo $status?>&status_pedido=4"><button type="button">Saiu para entrega</button></a>

        </div>
    </body>
    </html>
<?php
	mysqli_close($conexao);
?>