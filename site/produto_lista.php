<?php
            include("../conexao.php");
            $filtro = 'WHERE    estoque > 0';
            $pesquisa = '';
            $min = 0;
            $max = 99999;
            $categoria = 0;
            if(isset($_POST['pesquisa'])){
                $pesquisa = trim($_POST['pesquisa']);
                if($pesquisa !== '')
                    $filtro .= " AND nome like '%$pesquisa%' ";
            
                $min = trim($_POST['min']);
                $min = ($min !== '')?$min:0;

                $max = trim($_POST['max']);
                $max = ($max !== '')?$max:99999;

                $filtro .= ' AND preco BETWEEN '.$min.' AND '.$max.'';

                $categoria = trim($_POST['categoria']);
                if($categoria == 0)
                    $filtro .= ' AND categoria > 0';
                else  
                    $filtro .= ' AND categoria = '.$categoria;

                //echo "SELECT id,nome,preco,foto FROM produto $filtro";
            }
            
            
            $sql = "SELECT id,nome,preco,foto FROM produto $filtro";
            $query = mysqli_query($conexao, $sql);
            $produtos = [];
            while($produto= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $produtos[] = $produto;
            }
            $quantidade_produtos = mysqli_num_rows($query);


            
            foreach ($produtos as $item) { 
           
            ?>
            <div class="produto">
                <img src="../<?php echo $item['foto']?>"  alt="produto">
                <div class="info">
                    <h4><?php echo $item['nome']?></h4>
                    <p>R$<?php echo $item['preco']?></p>
                    <a href="produto/produto.php?id=<?php echo $item['id']?>"><button>Ver</button></a>
                </div>
            </div>
            <?php
            }
            if($quantidade_produtos == 0){
                echo '<div class="div-lista-vazia">';
                    echo '<img src="../assets/imagens/geral/lista-vazia.png"  alt="lista vazia">';
                    echo '<h1>Oops! nenhum resultado encontrado mude os filtros para achar novos produtos</h1>';
                echo '</div>';
            }
            mysqli_close($conexao);
            ?>