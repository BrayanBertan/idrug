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
                <img src="../../assets/imagens/geral/user.png" alt="">
                <input type="hidden" name="foto" value="../../assets/imagens/geral/user.png">
                <div class="campos">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" maxlength="150">
                </div>
                <div class="campos">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" maxlength="150">
                </div>
                <div class="campos">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" >
                </div>
                <button type="submit">Cadastrar</button>  
            </form>
        </div>
		
	</body>
</html>