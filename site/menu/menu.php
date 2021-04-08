        <?php
            include('../../conexao.php');
            $sql = "SELECT * FROM farmacia";
            $query = mysqli_query($conexao, $sql);
            $farmacia = mysqli_fetch_array($query, MYSQLI_ASSOC);

    

            $sql = "SELECT * FROM categoria";
            $query = mysqli_query($conexao, $sql);
            $categorias = [];
            while($categoria= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $categorias[] = $categoria;
            }
        ?>
        
        <div class="header">
            <img src="<?php echo $farmacia['logo']; ?>" alt="">
            <div class="div-usuario">
                <button type="button"><img  src="../../assets/imagens/geral/user.png" alt="">Minha Conta</button>
                <button type="button"><img  src="../../assets/imagens/geral/carts.png" alt="">Meu Carrinho</button>
            </div>
            <div class="div-filtros">
                <form action="../home/index.php" method="post">
                    <input type="text" name="pesquisa" placeholder="     Pesquisa">
                    <select name="categoria" id="categoria">
                    <option value="0">Todas</option>
                    <?php
                        foreach ($categorias as $item) { 
                    
                    
                        ?>
                        <option value="<?php echo $item['id']?>"><?php echo $item['nome']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input class="faixa-preco" type="number" name="min" placeholder=" preço minimo">
                    <input class="faixa-preco" type="number" name="max" placeholder=" preço máximo">
                    <button type="submit"><img  src="../../assets/imagens/geral/search.png" alt=""></button>
                </form>
            </div>
            
        </div>