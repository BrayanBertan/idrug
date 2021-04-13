<?php
	include('../../conexao.php');
    
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
                        for($i =0; $i < 15; $i++){
                         
                        ?>
                         
                                <div class="itens">
                                <img src="../../assets/imagens/geral/carts.png" alt="meu carrinho">
                                <p><?php echo 'xddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'?></p>
                                <p id="preco"><?php echo 'R$15,00 R$15,00'?></p>
                                <button class="quantidade">-</button>
                                <div class="quantidade"><p>1</p></div>
                                <button class="quantidade">+</button>
                                <a href=""><img src="../../assets/imagens/geral/deletar.png" alt="deletar item"></a>
                                </div>
                          
                        <?php
                            } 
                        ?>
        </div>
        <div id="infos">
            <a href="../home/"><h3>Continuar comprando</h3></a>
            <h3>Total: R$225,00</h3>
            <a href=""><h3>Finalizar compra</h3></a>
        </div>
    </body>

</html>

<?php
	mysqli_close($conexao);
?>