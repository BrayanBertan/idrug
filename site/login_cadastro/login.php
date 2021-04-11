<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>login</title>
        <link rel="stylesheet" href="../../gerenciamento/login_cadastro/login_cadastro.css">
	</head>
	<body>
        <div class="conteudo">
            <form action="login_db.php" method="post">
                <h1>Login</h1>
                <div class="campos">
                    <label for="email">email</label>
                    <input type="text" name="email" id="email" maxlength="150">
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