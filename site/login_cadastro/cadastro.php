<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>
        <link rel="stylesheet" href="../../gerenciamento/login_cadastro/login_cadastro.css">
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
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" maxlength="150">
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
                    <input type="password" name="senha" id="senha" >
                </div>
                <div class="campos">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" maxlength="150">
                </div>
                <div class="campos">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" maxlength="150">
                </div>
                <div class="campos">
                    <label for="cpf">Cpf</label>
                    <input type="text" name="cpf" id="cpf" maxlength="150">
                </div>
                <div class="campos">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" maxlength="150">
                </div>
                <button type="submit">Cadastrar</button>  
            </form>
        </div>
		
	</body>
</html>