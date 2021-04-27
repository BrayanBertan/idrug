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
			$setSenha = '';
			if(trim($_POST['senha'])!=''){
				$setSenha = "senha = '{$senha}',";
			}
			$fotoUrl =   'assets/imagens/geral/user.png';
			if($_FILES['arquivo']['error'] == 0){
				$foto = $_FILES['arquivo']['name'];
				$caminho = $_FILES['arquivo']['tmp_name'];
				$formato = explode('.', $foto)[1];
				$formatosPemitidos = ['jpg','png'];
				if (in_array($formato, $formatosPemitidos)) {
					 $fotoUrl =   'assets/imagens/usuarios/'.$foto;
					 move_uploaded_file($caminho, "../../{$fotoUrl}"); 
				}
			}
			//echo $fotoUrl;
			$mensagem = '';
			if($_POST['id'] !=0){
				$mensagem = 'alterado';
				$sql = "UPDATE usuario SET 
				nome = '{$nome}',
				email = '{$email}',
				$setSenha
				foto = '{$fotoUrl}',
				telefone = '{$telefone}',
				celular = '{$celular}',
				cpf = '{$cpf}',
				endereco = '{$endereco}'
				WHERE id = {$_POST['id']} ";

				$usuario = [  
					'id' => $_POST['id'],
					'nome' => $nome,
					'email' => $email,
					'senha' => $senha,
					'foto' => $fotoUrl,
					'telefone' => $telefone,
					'celular' => $celular,
					'cpf' => $cpf,
					'endereco' => $endereco
				];
				session_start();
				$_SESSION['usuario'] =  $usuario;
		
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
                '{$fotoUrl}',
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
			<a href="cadastro.php"><button>Cadastro</button></a>
			<?php
				}
			?>
		</div>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>