        <?php
            include($conexaoPath);
            session_start();
            $sql = "SELECT * FROM farmacia";
            $query = mysqli_query($conexao, $sql);
            $farmacia = mysqli_fetch_array($query, MYSQLI_ASSOC);

            $isLogged = false;
            if(isset($_SESSION['usuario'])){
                $usuario =  $_SESSION['usuario'];
                $isLogged = true;
            }


                    
            $filtro = 'WHERE    estoque > 0';
            $pesquisa = '';
            $min = 0;
            $max = 99999;
            $categoria = 0;
            if(isset($_POST['pesquisa'])){
                $pesquisa = trim($_POST['pesquisa']);
                if($pesquisa !== '')
                    $filtro .= " nome like '%$pesquisa%' AND";
            
                $min = trim($_POST['min']);
                $min = ($min !== '')?$min:0;

                $max = trim($_POST['max']);
                $max = ($max !== '')?$max:99999;

                $filtro .= ' preco BETWEEN '.$min.' AND '.$max.' AND';

                $categoria = trim($_POST['categoria']);
                if($categoria == 0)
                    $filtro .= ' categoria > 0';
                else  
                    $filtro .= ' categoria = '.$categoria;

                //echo "SELECT id,nome,preco,foto FROM produto $filtro";
            }

        

            $sql = "SELECT * FROM categoria";
            $query = mysqli_query($conexao, $sql);
            $categorias = [];
            while($categoria= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $categorias[] = $categoria;
            }
        ?>
        
        <div class="header">
            <img src="<?php echo $assetsPath.$farmacia['logo']; ?>" alt="logo farmacia">
            <div class="div-usuario">
                <?php
                    if($isLogged){
                ?>
                    <a href="<?php echo $linksPath?>home_usuario/home_usuario.php"><img src="<?php echo $assetsPath?>assets/imagens/geral/user.png" alt="minha conta">Minha Conta</a> 
                <?php
                 }else{
                ?>
                    <a href="<?php echo $linksPath?>login_cadastro/login.php"><img src="<?php echo $assetsPath?>assets/imagens/geral/user.png" alt="entrar">Entrar</a> 
                <?php
                 }
                ?>
                
               <a href="<?php echo $linksPath?>carrinho/carrinho.php"><img  src="<?php echo $assetsPath?>assets/imagens/geral/carts.png" alt="meu carrinho">Meu Carrinho</a> 
            </div>
            <div class="div-filtros">
                <form action="<?php echo $linksPath?>index.php" method="post">
                    <input type="text" name="pesquisa" placeholder="     Pesquisa" value="<?php echo  $pesquisa?>">
                    <select name="categoria" id="categoria">
                    <option value="0" <?php if($categoria == 0) echo'selected'?>>Todas</option>
                    <?php
                        foreach ($categorias as $item) {
                        ?>
                        <option value="<?php echo $item['id']?>"   <?php if($categoria == $item['id']) echo'selected'?>><?php echo $item['nome']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input class="faixa-preco" type="number" name="min" placeholder=" preço minimo" value="<?php echo  $min?>">
                    <input class="faixa-preco" type="number" name="max" placeholder=" preço máximo" value="<?php echo  $max?>">
                    <button type="submit"><img  src="<?php echo $assetsPath?>assets/imagens/geral/search.png" alt="procurar"></button>
                </form>
            </div>
            
        </div>
        