<?php
    $conexaoPath="../conexao.php";
    $cssPath="menu/menu.css";
    $assetsPath="../";
    $linksPath="";
	include($conexaoPath);
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href=<?php echo $cssPath?>>
        <script type="text/javascript" src="../assets/jquery-3.6.0.min.js"></script>
        <title>Home</title>
    </head>
    <body>
        <?php
         include('menu/menu.php');
         $sql = "SELECT id,nome,preco,foto FROM produto $filtro";
         $query = mysqli_query($conexao, $sql);
         $produtos = [];
         while($produto= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
             $produtos[] = $produto;
         }
         $quantidade_produtos = mysqli_num_rows($query);
        ?>
        <div class="conteudo"></div>
        <script type="text/javascript">
			$(document).ready(function () {
                console.log();
				$.ajax({
                    url: 'produto_lista.php',
						method: 'post',
						data: {
							produtos: $('#input_produtos').val(),
                            categoria: $('#categoria').val(),
                            pesquisa: $('#pesquisa').val(),
                            min: $('#min').val(),
                            max: $('#max').val()
						}
					}).done(function (data) {
						$('.conteudo').html(data);
					});

                    $('#pesquisar_btn').on('click', function () {
                        console.log('clicou')
					$.ajax({
                        url: 'produto_lista.php',
						method: 'post',
						data: {
							produtos: $('#input_produtos').val(),
                            categoria: $('#categoria').val(),
                            pesquisa: $('#pesquisa').val(),
                            min: $('#min').val(),
                            max: $('#max').val()
						}
					}).done(function (data) {
						$('.conteudo').html(data);
					});
				});
			});
		</script>
        <footer>
            IDRUG
        </footer>
    </body>

</html>

<?php
	mysqli_close($conexao);
?>