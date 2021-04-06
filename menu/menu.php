<div class="header">
            <img  src="../assets/drugstore.png" alt="">
            <div class="div-usuario">
                <button type="button"><img  src="../assets/user.png" alt="">Minha Conta</button>
                <button type="button"><img  src="../assets/carts.png" alt="">Meu Carrinho</button>
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
                    <button type="submit"><img  src="../assets/search.png" alt=""></button>
                </form>
            </div>
            
        </div>