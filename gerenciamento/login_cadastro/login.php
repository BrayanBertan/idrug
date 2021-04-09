<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>login</title>
        <link rel="stylesheet" href="login_cadastro.css">
	</head>
	<body>
        <div class="conteudo">
            <form action="login_db.php" method="post">
                <h1>Login</h1>
                <div class="campos">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" maxlength="150">
                </div>
                <div class="campos">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" >
                </div>
                <button type="submit">Entrar</button>  
            </form>
        </div>
		
	</body>
</html>