<?php
    include('../../conexao.php');
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login_cadastro/login.php?msgErro=Entre para finalizar a compra!&compra=true');
        return;
    }

    $usuario =  $_SESSION['usuario'];
    $carrinho = [];
    if(!isset($_COOKIE['carrinho']) || count(json_decode($_COOKIE['carrinho'],true)) == 0){
        header('Location: ../');
        return;
    }
    $total = 0;
    $itens = '';
    $carrinho = json_decode($_COOKIE['carrinho'],true);

    $modos_pagamento = [];
    $sql = "SELECT * FROM modos_pagamento";
    $query = mysqli_query($conexao, $sql);
    while($modo = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $modos_pagamento[] = $modo;
    }
   // echo count($carrinho);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tela_pedido.css">
    <title>Tela pedido</title>
</head>
<body>
    <div class="conteudo">
        <h1>Meu pedido</h1>
        <hr style="background-color:black;height:2px;">
        <div class="itens">
            <h3>Itens</h3>
            <?php
            foreach($carrinho as $item){
                $total += ($item['preco'] * $item['quantidade']);
                $itens .= ' | '.$item['nome'];
            } 
            ?>
            <p><?php echo $itens?></p>      
        </div>
        <hr style="background-color:black;height:2px;">
        <h3>Endereço de entrega</h3>
        <p><?php echo $usuario['endereco']?></p>
        <hr style="background-color:black;height:2px;">
        <h3>Modo de pagamento</h3>
       <form action="" method="post">
            <div class="modo-pagamento-aceito">
                <?php 
                foreach($modos_pagamento as $item){
                ?>
                <input type="radio" id="pagamento" name="pagamento" value=<?php echo $item['id']?> <?php if($item['id'] == 3 )echo 'checked="checked"'?>>
                <img src="../../<?php echo $item['foto']?>"  alt="modo pagamento">
                <?php 
                }
                ?>
            </div>
            <hr style="background-color:black;height:2px;">
            <button type="submit">Comprar</button>
       </form>
        <h2>Total:<?php echo $total?></h2>
        </div>
    </div>
</body>
</html>