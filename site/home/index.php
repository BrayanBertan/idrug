<?php
	include('../../conexao.php');

    $filtro = 'WHERE';
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

        //echo 'SELECT id,nome,preco,foto FROM produto '.$filtro;
    }
    $sql = "SELECT id,nome,preco,foto FROM produto";
    $query = mysqli_query($conexao, $sql);
    $produtos = [];
    while($produto= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $produtos[] = $produto;
    }
    $quantidade_produtos = mysqli_num_rows($query);
    
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="../menu/menu.css">
        <title>Home</title>
    </head>
    <body>
        <?php
         include('../menu/menu.php');
        ?>
        <div class="conteudo">
            <?php
            foreach ($produtos as $item) { 
           
            ?>
            <div class="produto">
                <img src="<?php echo $item['foto']?>">
                <div class="info">
                    <h4><b><?php echo $item['nome']?></b></h4>
                    <p>R$<?php echo $item['preco']?></p>
                    <a href="../produto/produto.php?<?php echo $item['id']?>"><button>Ver</button></a>
                </div>
            </div>
            <?php
            }
            if($quantidade_produtos == 0)
                echo '<div class="div-lista-vazia">';
                    echo '<img src="../../assets/imagens/geral/lista-vazia.png">';
                    echo '<h1>Oops! nenhum resultado encontrado mude os filtros para achar novos produtos</h1>';
                echo '</div>';
            ?>
        </div>
        <footer>
            IDRUG
        </footer>
    </body>

</html>