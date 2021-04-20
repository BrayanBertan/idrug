<?php
            include('../../conexao.php');
            $produto = [  
                'id' => 0,
                'nome'  => '',   
                'descricao' => '',  
                'categoria' => '',   
                'preco' => 0,   
                'receita'   => false,   
                'volume'    => 0,  
                'unidade'   => '',   
               ' estoque'   => 0,    
                'foto'  => '../../assets/imagens/geral/produtos.png'
            ];
            $titulo = 'Cadastrar produto';
            if(isset($_GET['id'])){
                $sql = "SELECT * FROM produto WHERE id = {$_GET['id']}";
                $query = mysqli_query($conexao, $sql);
                $produto = mysqli_fetch_array($query, MYSQLI_ASSOC);
                $titulo = 'Editar '.$produto['nome'];
            }

            $sql = "SELECT * FROM categoria";
            $query = mysqli_query($conexao, $sql);
            $categorias = [];
            while($categoria= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $categorias[] = $categoria;
            }

            $sql = "SELECT * FROM unidade";
            $query = mysqli_query($conexao, $sql);
            $unidades = [];
            while($unidade= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $unidades[] = $unidade;
            }
           
            //echo '<pre>',print_r($modos_pagamento),'</pre>';
        ?>
        
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo  $titulo?></title>
        <link rel="stylesheet" href="produtos.css">
	</head>
	<body>
        <div class="conteudo">
            <form action="salvar_produto_db.php" method="post">
                <h1><?php echo  $titulo?></h1>
                <img src="../../<?php echo $produto['foto']; ?>" alt="produto">
                <input type="hidden" name="foto" value="<?php echo $produto['foto']; ?>">
                <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                <div class="campos">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" maxlength="150" value="<?php echo $produto['nome']; ?>">
                </div>
                <div class="campos">
                    <label for="descricao">Descrição</label>
                    <textarea type="text" name="descricao" id="descricao" maxlength="255" cols="30" rows="10"><?php echo $produto['descricao']; ?></textarea>
                </div>
                <div class="campos">
                    <label for="preco">Preço</label>
                    <input type="number" step=".01" name="preco" id="preco" value="<?php echo $produto['preco']; ?>">
                    <label for="estoque">Estoque</label>
                    <input type="number" name="estoque" id="estoque" value="<?php echo $produto['estoque']; ?>">
                    <label for="volume">Volume</label>
                    <input type="number" name="volume" id="volume" value="<?php echo $produto['volume']; ?>">
                </div>
                <div class="campos">
                    <label for="categoria">Categorias</label>
                    <select name="categoria" id="categoria">
                        <?php
                        foreach ($categorias as $item) {
                        ?>
                            <option value="<?php echo $item['id']?>"   <?php if($produto['categoria'] == $item['id']) echo'selected'?>><?php echo $item['nome']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label for="unidade">Unidades</label>
                    <select name="unidade" id="unidade">
                        <?php
                        foreach ($unidades as $item) {
                        ?>
                            <option value="<?php echo $item['id']?>"   <?php if($produto['categoria'] == $item['id']) echo'selected'?>><?php echo $item['nome']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="checkbox" id="receita" name="receita" <?php if($produto['receita']) echo'checked'?>>
                    <label for="receita">Receita</label>
                </div>
                <button type="submit">Salvar</button>  
            </form>
        </div>
		
	</body>
</html>
<?php
	mysqli_close($conexao);
?>