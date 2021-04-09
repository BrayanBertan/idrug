<?php
	include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="produtos.css">
	</head>
	<body>
    <?php
         
         
           $nome = $_POST['nome'];
           $descricao = $_POST['descricao'];
           $preco = $_POST['preco'];
           $estoque = $_POST['estoque'];
           $volume = $_POST['volume'];
           $categoria = $_POST['categoria'];
           $unidade = $_POST['unidade'];
           $foto = $_POST['foto'];
           $receita = 0;
           if(isset($_POST['receita'])) $receita = 1;
           
           $mensagem_sucesso = '';
           if(isset($_POST['id'])){
                $mensagem = 'alterado';
                $sql = "UPDATE produto SET 
                nome = '{$nome}',
                descricao = '{$descricao}',
                preco = '{$preco}',
                estoque = '{$estoque}',
                volume = '{$volume}',
                categoria = '{$categoria}',
                unidade = '{$unidade}',
                receita = '{$receita}',
                foto = '{$foto}' 
                WHERE id = {$_POST['id']} ";
           }else{
                $mensagem = 'criado';
                $sql = "INSERT INTO produto
                VALUES (
                 null,
                '{$nome}',
                '{$descricao}',
                {$categoria},
                {$preco},
                {$receita},
                {$volume},
                {$unidade},
                {$estoque},
                '{$foto}'
                )";
           }


           $query = mysqli_query($conexao, $sql);
			$retorno;
			$imagem;
			if($query) {
				$retorno = 'Produto '.$mensagem.' com sucesso!';
				$imagem = '../../assets/imagens/geral/thumb-up.png';
			} else {
				$retorno = 'Produto não '.$mensagem.' ! MySQL erro: ' .mysqli_error($conexao);
				$imagem = '../../assets/imagens/geral/thumb-down.png';
			}
		?>

		<div class="resposta">
			<img src="<?php echo $imagem; ?>" alt="">
			<h1><?php echo $retorno ?></h1>
			<a href="listar_produtos.php"><button>Listagem de produtos</button></a>
			<a href="../home/home.php"><button>home</button></a>
		</div>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>