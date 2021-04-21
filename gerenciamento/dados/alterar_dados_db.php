<?php
	include('../../conexao.php');

	session_start();
	$usuario =  $_SESSION['usuario_gerenciamento'];
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link rel="stylesheet" href="dados.css">
	</head>
	<body>
    <?php
         
            $nome        = $_POST['nome'];
            $endereco    = $_POST['endereco'];
            $email       = $_POST['email'];
            $sobre       = $_POST['sobre'];
            $telefone    = $_POST['telefone'];
            $celular     = $_POST['celular'];
            $cnpj        = $_POST['cnpj'];

			//echo '<pre>',print_r($_POST),'</pre>';
			$status;
			for($i=1; $i <= 6; $i++) { 
				$status = 0;
				if(isset($_POST[$i]))
					$status = 1;
				$sql = "UPDATE modos_pagamento SET status = '{$status}' WHERE id = '$i'";

				$query = mysqli_query($conexao, $sql);
			}

			
			 

			$sql = "UPDATE farmacia SET nome = '{$nome}', endereco = '{$endereco}', telefone = '{$telefone}', celular = '{$celular}', cnpj = '{$cnpj}'
            , email = '{$email}', sobre = '{$sobre}' ";
			
			$query = mysqli_query($conexao, $sql);
			$retorno;
			$imagem;
			if($query) {
				$retorno = 'Farmacia alterada com sucesso!';
				$imagem = '../../assets/imagens/geral/thumb-up.png';
			} else {
				$retorno = 'Farmacia não alterada! MySQL erro: ' .mysqli_error($conexao);
				$imagem = '../../assets/imagens/geral/thumb-down.png';
			}


			$updatedAt = date('Y-m-d H:i:s');
			$sql = "INSERT INTO log VALUES(null,'$updatedAt','{$usuario['id']}','farmacia e modos_pagamento','update')";
			$query = mysqli_query($conexao, $sql);
		?>

		<div class="resposta">
			<img src="<?php echo $imagem; ?>" alt="">
			<h1><?php echo $retorno ?></h1>
			<a href="alterar_dados.php"><button>edição</button></a>
			<a href="../index.php"><button>home</button></a>
		</div>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>