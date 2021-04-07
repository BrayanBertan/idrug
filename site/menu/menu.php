        <?php
            include('../../conexao.php');
            $sql = "SELECT * FROM farmacia";
            $query = mysqli_query($conexao, $sql);
            $farmacia = mysqli_fetch_array($query, MYSQLI_ASSOC);
        ?>
        
        <div class="header">
            <img src="<?php echo $farmacia['logo']; ?>" alt="">
            <div class="div-usuario">
                <button type="button"><img  src="../../assets/imagens/geral/user.png" alt="">Minha Conta</button>
                <button type="button"><img  src="../../assets/imagens/geral/carts.png" alt="">Meu Carrinho</button>
            </div>
            <div class="div-filtros">
                <form action="/action_page.php">
                    <input type="text" name="pesquisa" placeholder="     Pesquisa">
                    <select name="" id="">
                    <?php
                        for ($i=0; $i < 12; $i++) { 
                    
                    
                        ?>
                        <option value="">Categoria</option>
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