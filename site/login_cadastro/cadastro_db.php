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
	  $senha = md5($_POST['senha']);
	  $foto = $_POST['foto'];
	  $telefone = $_POST['telefone'];
	  $celular = $_POST['celular'];
	  $cpf = $_POST['cpf'];
	  $endereco = $_POST['endereco'];


	  $sql = "SELECT email FROM usuario WHERE email = '{$email}' AND id != {$_POST['id']}";

	
	  $query = mysqli_query($conexao, $sql);
	  $quantidade = mysqli_num_rows($query);

	  if($quantidade > 0){
		header('Location: cadastro.php?msg= email em uso&id='.$_POST['id']);
		return;
	}



			$mensagem = '';
			if($_POST['id'] !=0){
				$mensagem = 'alterado';
				$sql = "UPDATE usuario SET 
				nome = '{$nome}',
				email = '{$email}',
				senha = '{$senha}',
				foto = '{$foto}',
				telefone = '{$telefone}',
				celular = '{$celular}',
				cpf = '{$cpf}',
				endereco = '{$endereco}'
				WHERE id = {$_POST['id']} ";
			}else{
				$mensagem = 'criado';
				$sql = "INSERT INTO usuario
                VALUES (
                 null,
                '{$nome}',
				'{$email}',
                '{$senha}',
                '{$telefone}',
                '{$celular}',
                '{$cpf}',
                '{$foto}',
                '{$endereco}'
                
                )";

			}



           $query = mysqli_query($conexao, $sql);
			$retorno = '';
			$imagem;
			if($query) {
				$retorno = 'Dados '.$mensagem.' com sucesso!';
				$imagem = '../../assets/imagens/geral/thumb-up.png';
			} else {
				$retorno = 'Dados não cadastrado ! MySQL erro: ' .mysqli_error($conexao);
				$imagem = '../../assets/imagens/geral/thumb-down.png';
			}
		?>

		<div class="resposta">
			<img src="<?php echo $imagem; ?>" alt="resposta">
			<h1><?php echo $retorno ?></h1>
			<?php 
				if($mensagem == 'alterado'){
			?>
					<a href="cadastro.php?id=<?php echo  $_POST['id']?>"><button>Meus Dados</button></a>
					<a href="../home_usuario/home_usuario.php?id=<?php echo  $_POST['id']?>"><button>Home</button></a>
			<?php
				}else{ 
			?>
			<a href="login.php"><button>Login</button></a>
			<a href="cadastro_php"><button>Cadastro</button></a>
			<?php
				}
			?>
		</div>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>