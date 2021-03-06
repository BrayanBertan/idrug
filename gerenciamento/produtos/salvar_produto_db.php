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
           $receita = 0;
           if(isset($_POST['receita'])) $receita = 1;
           $fotoUrl =   'assets/imagens/geral/produtos.png';
          //  echo '<pre>',print_r($_FILES['arquivo']),'</pre>';
           if($_FILES['arquivo']['error'] == 0){
                
               $foto = $_FILES['arquivo']['name'];
               $caminho = $_FILES['arquivo']['tmp_name'];
               $formato = explode('.', $foto)[1];
               $formatosPemitidos = ['jpg','png'];
               if (in_array($formato, $formatosPemitidos)) {
                    $fotoUrl =   'assets/imagens/produtos/'.$foto;
                    move_uploaded_file($caminho, "../../{$fotoUrl}"); 
               }
           }
         

           $mensagem = '';
           if($_POST['id'] !=0){
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
                foto = '{$fotoUrl}' 
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
                '{$fotoUrl}'
                )";
           }

           session_start();
           if(!isset($_SESSION['usuario_gerenciamento'])){
               header('Location: login_cadastro/login.php?msgErro=Entre para acessar o painel!');
               return;
           }
	     $usuario =  $_SESSION['usuario_gerenciamento'];


           $query = mysqli_query($conexao, $sql);
			$retorno;
			$imagem;
			if($query) {
				$retorno = 'Produto '.$mensagem.' com sucesso!';
				$imagem = '../../assets/imagens/geral/thumb-up.png';
			} else {
				$retorno = 'Produto n??o '.$mensagem.' ! MySQL erro: ' .mysqli_error($conexao);
				$imagem = '../../assets/imagens/geral/thumb-down.png';
			}


               if($mensagem === 'alterado'){
                    $updatedAt = date('Y-m-d H:i:s');
                    $sql = "INSERT INTO log VALUES(null,'$updatedAt','{$usuario['id']}','produto','update')";
                    $query = mysqli_query($conexao, $sql);
               }else{
                    $updatedAt = date('Y-m-d H:i:s');
                    $sql = "INSERT INTO log VALUES(null,'$updatedAt','{$usuario['id']}','produto','insert')";
                    $query = mysqli_query($conexao, $sql);
               }
		?>

		<div class="resposta">
			<img src="<?php echo $imagem; ?>"  alt="resposta">
			<h1><?php echo $retorno ?></h1>
			<a href="listar_produtos.php"><button>Listagem de produtos</button></a>
			<a href="../index.php"><button>home</button></a>
		</div>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>