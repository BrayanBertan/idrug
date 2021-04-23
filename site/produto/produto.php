        <?php
        $conexaoPath="../../conexao.php";
        $cssPath="../menu/menu.css";
        $assetsPath="../../";
        $linksPath="../";
        include($conexaoPath);
        ?>
        


<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="produto.css">
        <link rel="stylesheet" href=<?php echo $cssPath?>>
        <title>Produto</title>
    </head>
    <body>
        <?php
         include('../menu/menu.php');

         $id = $_GET['id'];
         $sql = "SELECT a.*,b.nome AS nome_categoria,c.nome AS nome_unidade,(SELECT AVG(nota) FROM avaliacao WHERE produto = $id) AS nota FROM produto AS a
                 INNER JOIN categoria AS b ON b.id = a.categoria
                 INNER JOIN unidade AS c ON c.id = a.unidade
                 WHERE a.id = $id";


               
        $query = mysqli_query($conexao, $sql);
        $produto = mysqli_fetch_array($query, MYSQLI_ASSOC);


         $sql = "SELECT foto FROM modos_pagamento";
         $query = mysqli_query($conexao, $sql);
         while($modo = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
             $modos_pagamento[] = $modo;
         }

         
         $sql = "SELECT a.*,b.foto,b.nome FROM avaliacao AS a 
                INNER JOIN usuario AS b ON b.id = a.usuario
                WHERE produto = $id ORDER BY a.id DESC";
  
         $avaliacoes = [];
         $query = mysqli_query($conexao, $sql);
         while($avaliacao = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
             $avaliacoes[] = $avaliacao;
         }
         $quantidade_avaliacoes = mysqli_num_rows($query);
         //echo '<pre>',print_r($modos_pagamento),'</pre>';
        ?>
        <div class="conteudo">
            <div class="principal">
                <div class="produto-foto">
                    <img src="<?php echo $assetsPath.$produto['foto']?>"  alt="produto">
                </div>
                <div class="infos">.
                    <h1><b><?php echo $produto['nome']?></b></h1>
                    <br>
                    <p>R$<?php echo $produto['preco']?></p>
                    <br>
                    <p><?php echo $produto['descricao']?></p>
                    <br>
                    <p><?php echo "{$produto['nome_categoria']} {$produto['volume']} {$produto['nome_unidade']}"?></p>
                    <br> <br>
                        <button class="quantidade">-</button>
                        <div class="quantidade"><p>1</p></div>
                        <button class="quantidade">+</button>
                        <form action="../carrinho/carrinho.php" method="post">
                            <input type="hidden" name="acao_add" value=<?php echo $produto['id']?>>
                            <input type="hidden" name="id" value=<?php echo $produto['id']?>>
                            <input type="hidden" name="foto" value=<?php echo $produto['foto']?>>
                            <input type="hidden" name="nome" value=<?php echo $produto['nome']?>>
                            <input type="hidden" name="preco" value=<?php echo $produto['preco']?>>
                            <input type="hidden" name="receita" value=<?php echo $produto['receita']?>>
                            <input type="hidden" name="quantidade" value="1">
                            <button type="submit">Comprar</button>
                        </form><br> <br> <br>
                        <div class="modo-pagamento-aceito">
                            <p>Modos de pagamento aceitos</p>
                            <?php 

                            foreach($modos_pagamento as $item){
                            ?>
                            <img src="../../<?php echo $item['foto']?>"  alt="modo pagamento">
                            <?php 
                            }
                            ?>
                        </div>
                </div>
            </div>
           <?php include('avaliacoes.php')?>
        </div>
        <footer>
            IDRUG
        </footer>
        </body>

</html>

<?php
	mysqli_close($conexao);
?>