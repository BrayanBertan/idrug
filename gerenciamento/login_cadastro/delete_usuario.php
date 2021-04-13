<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Excluir conta</title>
        <link rel="stylesheet" href="login_cadastro.css">
	</head>
	<body>
		<div class="conteudo">
            <form action="delete_usuario_db.php" method="post">
                <?php
                    $id = $_GET['id'];
                ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <img src="../../assets/imagens/geral/deletar.png" alt="">
                <p>Deseja excluir a sua conta?</p>
                
                <button type="submit">Sim</button>
                <a href="cadastro.php?id=<?php echo $id?>"><button type="button">Não</button></a>
            </form>
        </div>
	</body>
</html>