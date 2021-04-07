<?php
	include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	</head>
	<body>
    <?php
            $usuario     = $_POST['usuario'];
            $nome        = $_POST['nome'];
            $endereco    = $_POST['endereco'];
            $email       = $_POST['email'];
            $senha       = $_POST['senha'];
            $sobre       = $_POST['sobre'];
            $telefone    = $_POST['telefone'];
            $celular     = $_POST['celular'];
            $cnpj        = $_POST['cnpj'];

			//echo '<pre>',print_r($_POST),'</pre>';
			$status;
			for($i=1; $i <= 6; $i++) { 
				$status = 0;
				if(isset($_POST[$i]))
					{$status = 1;}
				echo $status;
				$sql = "UPDATE modos_pagamento SET status = '{$status}' WHERE id = '{$i}'";

				$query = mysqli_query($conexao, $sql);
			}

			
			 

			$sql = "UPDATE farmacia SET nome = '{$nome}', endereco = '{$endereco}', telefone = '{$telefone}', celular = '{$celular}', cnpj = '{$cnpj}'
            , email = '{$email}', sobre = '{$sobre}', usuario = '{$usuario}', senha = '{$senha}' ";
			
			$query = mysqli_query($conexao, $sql);
			if($query) {
				echo 'Farmacia alterada com sucesso!';
			} else {
				echo 'Farmacia não alterada! MySQL erro: ' .mysqli_error($conexao);
			}
		?>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>