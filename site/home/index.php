<?php
	include('../../conexao.php');
    
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
         $sql = "SELECT id,nome,preco,foto FROM produto $filtro";
         $query = mysqli_query($conexao, $sql);
         $produtos = [];
         while($produto= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
             $produtos[] = $produto;
         }
         $quantidade_produtos = mysqli_num_rows($query);
        ?>
        <div class="conteudo">
            <?php
            foreach ($produtos as $item) { 
           
            ?>
            <div class="produto">
                <img src="<?php echo $item['foto']?>"  alt="produto">
                <div class="info">
                    <h4><b><?php echo $item['nome']?></b></h4>
                    <p>R$<?php echo $item['preco']?></p>
                    <a href="../produto/produto.php?id=<?php echo $item['id']?>"><button>Ver</button></a>
                </div>
            </div>
            <?php
            }
            if($quantidade_produtos == 0){
                echo '<div class="div-lista-vazia">';
                    echo '<img src="../../assets/imagens/geral/lista-vazia.png"  alt="lista vazia">';
                    echo '<h1>Oops! nenhum resultado encontrado mude os filtros para achar novos produtos</h1>';
                echo '</div>';
            }
            ?>
        </div>
        <footer>
            IDRUG
        </footer>
    </body>

</html>

<?php
	mysqli_close($conexao);
?>