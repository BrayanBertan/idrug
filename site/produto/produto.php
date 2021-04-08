        <?php
            include('../../conexao.php');

            $id = $_GET['id'];
            $sql = "SELECT * FROM produto WHERE id = $id";
                    $query = mysqli_query($conexao, $sql);
                    $produto = mysqli_fetch_array($query, MYSQLI_ASSOC);


            $sql = "SELECT foto FROM modos_pagamento";
            $query = mysqli_query($conexao, $sql);
            while($modo = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $modos_pagamento[] = $modo;
            }
            //echo '<pre>',print_r($modos_pagamento),'</pre>';
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
                    <br> <br>
                        <a href="../produto/produto.php"><button>Comprar</button></a>
                        <button class="quantidade">-</button>
                        <button class="quantidade">1</button>
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
                for ($i=0; $i < 25; $i++) { 
            
                ?>
                <div class="avaliacao">
                    <div class="dados"> 
                        <img src="../../assets/imagens/geral/user.png" >
                        <h3>Nome</h3>
                        <h2>8.5</h2>
                    </div>
                   <div class="descricao">
                   <p>loreoskdkddddddddddddd 
                        ddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>ddddddddddddddddddddddddddddddddd
                        dddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaaaddddddd<br>dddddddddddddddddddddddllll
                        llllllllllllllllllllllllaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaall<br>lllllllllllaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    </p>
                   </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <footer>
            IDRUG
        </footer>
        </body>

</html>