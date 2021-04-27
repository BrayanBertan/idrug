<?php
  setcookie('carrinho');
    $carrinho = [];
    if(isset($_COOKIE['carrinho'])){
        $carrinho = json_decode($_COOKIE['carrinho'],true);
        //echo count($carrinho);
    }

	if(isset($_POST['acao_add'])){
        $novoProdutoCarrinho = [
            'id' => $_POST['id'],
            'foto' => $_POST['foto'],
            'nome' => $_POST['nome'],
            'preco' => $_POST['preco'],
            'quantidade' => $_POST['quantidade'],
            'receita' => $_POST['receita']
        ];
        $carrinho[] = $novoProdutoCarrinho;
        setcookie('carrinho', json_encode($carrinho), 0, '/');
    }

    
	if(isset($_GET['acao_delete'])){
        unset($carrinho[$_GET['acao_delete']]);
        setcookie('carrinho', json_encode($carrinho), 0, '/');
    }


    if(count($carrinho) == 0){
        header('Location: ../');
        return;
    }
    $total = 0;
    // echo "<pre>";
    //     print_r($carrinho);
    // echo "</pre>";

    
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="carrinho.css">
        <title>Meu carrinho</title>
    </head>
    <body>
        <h1>Meu Carrinho</h1>
        <div class="carrinho">
               
                    <?php
                        foreach($carrinho as $key => $item){
                            $total += ($item['preco'] * $item['quantidade']);
                        ?>
                         
                                <div class="itens">
                                    <img src="../../<?php echo $item['foto']?>" alt="meu carrinho">
                                    <p><?php echo $item['nome']?></p>
                                    <p id="preco">Unitário:<?php echo $item['preco'].' - Valor total:'.($item['preco'] * $item['quantidade'])?></p>
                                    <button class="quantidade">-</button>
                                    <div class="quantidade"><p>1</p></div>
                                    <button class="quantidade">+</button>
                                    <a href="carrinho.php?acao_delete=<?php echo $key?>"><img src="../../assets/imagens/geral/deletar.png" alt="deletar item"></a>
                                </div>
                                <hr style="background-color:black;height:2px;">
                        <?php
                            } 
                        ?>
        </div>
        <div id="infos">
            <a href="../"><h3>Continuar comprando</h3></a>
            <h3>Total:<?php echo $total?></h3>
            <a href="../tela_pedido/tela_pedido.php"><h3>Finalizar compra</h3></a>
        </div>
    </body>

</html>