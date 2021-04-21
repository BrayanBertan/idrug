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
                    <input type="text" name="usuario" id="usuario" maxlength="15">
                </div>
                <div class="campos">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" maxlength="15">
                </div>
                <button type="submit">Entrar</button>
                <a href="login.php">Já possui uma conta?</a> 
            </form>
            <?php
                    $msgErro = '';
                    if(isset($_GET['msgErro'])){
                        $msgErro = $_GET['msgErro'];
                        echo "<p style='color:red;text-align:center;'> $msgErro </p>";
                    }
                    
            ?>
        </div>
		
	</body>
</html>