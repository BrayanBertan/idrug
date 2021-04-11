<?php
	include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="../../gerenciamento/login_cadastro/login_cadastro.css">
	</head>
	<body>
    <?php
         
         
	  $nome = $_POST['nome'];
	  $email = $_POST['email'];
	  $senha = $_POST['senha'];
	  $foto = $_POST['foto'];
	  $telefone = $_POST['telefone'];
	  $celular = $_POST['celular'];
	  $cpf = $_POST['cpf'];
	  $endereco = $_POST['endereco'];

	  $sql = "SELECT email FROM usuario WHERE email = '{$email}'";
	  $query = mysqli_query($conexao, $sql);
	  $quantidade = mysqli_num_rows($query);
    
	if($quantidade > 0)
		header('Location: cadastro.php?msg= email em uso');
	  	

           $sql = "INSERT INTO usuario
                VALUES (
                 null,
                '{$nome}',
                '{$senha}',
                '{$telefone}',
                '{$celular}',
                '{$cpf}',
                '{$foto}',
                '{$endereco}',
                '{$email}'
                )";


           $query = mysqli_query($conexao, $sql);
			$retorno = '';
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