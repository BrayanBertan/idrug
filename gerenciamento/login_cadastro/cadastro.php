<?php
    include('../../conexao.php');

    $usuario = [  
        'id' => 0,
        'nome'  => '',   
        'usuario' => '',  
        'senha' => '', 
        'foto'  => '../../assets/imagens/geral/user.png'
    ];

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'SELECT * FROM usuario_gerenciamento WHERE id ='.$id;
        $query = mysqli_query($conexao, $sql);
        $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
    }
?>
        

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>
        <link rel="stylesheet" href="login_cadastro.css">
	</head>
	<body>
        <div class="conteudo">
            <form action="cadastro_db.php" method="post">
                <h1>Cadastro</h1>
                <img src="<?php echo $usuario['foto']?>"  alt="minha fotooo">
                <input type="hidden" name="foto" value="<?php echo $usuario['foto']?>">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <div class="campos">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" maxlength="150" value="<?php echo $usuario['nome']?>">
                </div>
                <div class="campos">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" maxlength="150" <?php echo $usuario['usuario']?>>
                </div>
                <?php
                    $msg = '';
                    if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                        echo "<p style='color:red;text-align:center;'> $msg </p>";
                    }
                    
                ?>
                <div class="campos">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" <?php echo $usuario['senha']?>>
                </div>
                <a href="delete_usuario.php?id=<?php echo $usuario['id']; ?>"><button type="button">Excluir</button></a>
                <button type="submit">Cadastrar</button>
            </form>
            <?php
                  if(isset($_GET['msgErro']))
                    echo "<p style='color:red;text-align:center;'>{$_GET['msgErro']}</p>"
            ?>
        </div>
		
	</body>
</html>

<?php
	mysqli_close($conexao);
?>