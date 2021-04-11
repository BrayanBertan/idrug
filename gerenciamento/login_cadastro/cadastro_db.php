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

		$sql = "SELECT usuario FROM usuario_gerenciamento WHERE usuario = '{$usuario}' AND id != {$_POST['id']}";

		$query = mysqli_query($conexao, $sql);
		$quantidade = mysqli_num_rows($query);

	
    
		if($quantidade > 0){
			header('Location: cadastro.php?msg= usuario em uso&id='.$_POST['id']);
			return;
		}
			
			$mensagem = '';
           if($_POST['id'] !=0){
                $mensagem = 'alterado';
                $sql = "UPDATE usuario_gerenciamento SET 
                nome = '{$nome}',
                usuario = '{$usuario}',
                senha = '{$senha}',
                foto = '{$foto}'
                WHERE id = {$_POST['id']} ";
           }else{
                $mensagem = 'criado';
				$sql = "INSERT INTO usuario_gerenciamento
                VALUES (
                 null,
                '{$nome}',
                '{$usuario}',
                '{$senha}',
                '{$foto}',
                '{$acesso}'
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
			<a href="login.php"><button>Login</button></a>
			<a href="cadastro.php"><button>Cadastro</button></a>
			<?php 
				if($mensagem == 'alterado'){
			?>
					<a href="../home/home.php?id=<?php echo  $_POST['id']?>"><button>Home</button></a>
			<?php
				}
			?>
			
			
		</div>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>