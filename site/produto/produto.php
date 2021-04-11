        <?php
            include('../../conexao.php');
        ?>
        


<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="produto.css">
        <link rel="stylesheet" href="../menu/menu.css">
        <title>Produto</title>
    </head>
    <body>
        <?php
         include('../menu/menu.php');

         $id = $_GET['id'];
         $sql = "SELECT a.*,b.nome AS nome_categoria,c.nome AS nome_unidade FROM produto AS a
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
                WHERE produto = $id";
  
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
                    <img src="<?php echo $produto['foto']?>">
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
                        <a href="../produto/produto.php"><button>Comprar</button></a>
                        <button class="quantidade">-</button>
                        <div class="quantidade"><p>1</p></div>
                        <button class="quantidade">+</button> <br> <br>
                        <div class="modo-pagamento-aceito">
                            <p>Modos de pagamento aceitos</p>
                            <?php 

                            foreach($modos_pagamento as $item){
                            ?>
                            <img src="<?php echo $item['foto']?>" >
                            <?php 
                            }
                            ?>
                        </div>
                </div>
            </div>
            <h2><b>Avaliações</b></h2><br><br>
            <br>
            <div class="avaliacoes">
                <?php
                foreach ($avaliacoes as $item) { 
            
                ?>
                <div class="avaliacao">
                    <div class="dados"> 
                        <img src="<?php echo $item['foto']?>" >
                        <h3><?php echo $item['nome']?></h3>
                        <h2><?php echo $item['nota']?></h2>
                    </div>
                   <div class="comentario">
                   <p><?php echo $item['comentario']?></p>
                   </div>
                </div>
                <?php
                    }

                    if($quantidade_avaliacoes == 0)
                        echo "Nenhuma avaliação disponivel para esse produto";
                ?>
            </div>
        </div>
        <footer>
            IDRUG
        </footer>
        </body>

</html>