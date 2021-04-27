<?php
    include('../../conexao.php');
    $pedido = $_GET['id'];
    $total = $_GET['total'];
    $endereco = $_GET['endereco'];
    $status = $_GET['status'];
    $status_id = $_GET['status_id'];
   
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login_cadastro/login.php?msgErro=Entre para acessar o painel!');
        return;
    }

    if(isset($_GET['entregue'])){
        $sql = "UPDATE pedido SET status = 6 WHERE id = '$pedido'";
        $query = mysqli_query($conexao, $sql);
        $status_id = 5;
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

        $statusLista = 
        ['Em Análise',
        'Em Produção',
        'Enviado',
        'Saiu para entrega',
        'Entregue'
        ];

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
        <link rel="stylesheet" href="meus_pedidos.css">
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
            <div class="andamento">
                <?php
                for($i=0;$i< 5;$i++){
                ?>
                    <div class=<?php echo ($i+1 == $status_id)?  'status_ativo':'status' ?>>
                        <p><?php echo $statusLista[$i]?></p>
                    </div>
                   
                <?php
                    if($i!=4)
                        echo " <img src='../../assets/imagens/geral/right-arrow.png' alt='andamento'>";
                    }
                ?>
            </div><br><br><br>
            <?php
                if($status != 'Entregue' && $status != 'Pedido cancelado'){

              
            ?>
                <a href="detalhes_pedido.php?id=<?php echo $pedido?>&status_id=5&total=<?php echo $total?>&endereco=<?php echo $endereco?>&status=<?php echo $status?>&entregue=true"><button type="button">Confirmar recebimento</button></a>
            <?php 
                }
            ?>
            <a href="meus_pedidos.php">Meus pedidos</a>       
        </div>
    </body>
    </html>
<?php
	mysqli_close($conexao);
?>