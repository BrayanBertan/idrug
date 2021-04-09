<?php
	include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="login_cadastro.css">
	</head>
	<body>
    <?php
         
         
           $nome = $_POST['nome'];
           $usuario = $_POST['usuario'];
           $senha = $_POST['senha'];
           $acesso = 1;
           $foto = $_POST['foto'];
           
           $sql = "INSERT INTO usuario_gerenciamento
                VALUES (
                 null,
                '{$nome}',
                '{$usuario}',
                '{$senha}',
                '{$foto}',
                '{$acesso}'
                )";


           $query = mysqli_query($conexao, $sql);
			$retorno;
			$imagem;
			if($query) {
				$retorno = 'Usuario cadastrado com sucesso!';
				$imagem = '../../assets/imagens/geral/thumb-up.png';
			} else {
				$retorno = 'Usuario não cadastrado ! MySQL erro: ' .mysqli_error($conexao);
				$imagem = '../../assets/imagens/geral/thumb-down.png';
			}
		?>

		<div class="resposta">
			<img src="<?php echo $imagem; ?>" alt="">
			<h1><?php echo $retorno ?></h1>
			<a href="login.php"><button>Login</button></a>
			<a href="cadastro.php"><button>Cadastro</button></a>
		</div>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>