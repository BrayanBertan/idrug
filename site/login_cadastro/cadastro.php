<?php
    session_start();
    $usuario = [  
        'id' => 0,
        'nome'  => '',   
        'email' => '',  
        'senha' => '', 
        'foto'  => 'assets/imagens/geral/user.png',
        'telefone'  => '',   
        'celular' => '',  
        'endereco' => '',  
        'cpf' => ''
    ];

    if(isset($_SESSION['usuario'])){
        $usuario =  $_SESSION['usuario'];
        $usuario['senha'] = '';
    }
?>
      

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>
        <link rel="stylesheet" href="../../gerenciamento/login_cadastro/login_cadastro.css">
	</head>
	<body>
        <div class="conteudo">
            <form action="cadastro_db.php" method="post" enctype="multipart/form-data">
                <h1>Cadastro</h1>
                <img src="../../<?php echo $usuario['foto']; ?>" alt="minha foto">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                <div class="campos">
                    <label for="nome">Foto</label>
                    <input type="file" name="arquivo">
                </div>
                <div class="campos">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" maxlength="150"    value="<?php echo $usuario['nome']?>">
                </div>
                <div class="campos">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" maxlength="50" value="<?php echo $usuario['email']?>">
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
                    <input type="password" name="senha" id="senha"  maxlength="15" value="<?php echo $usuario['senha']?>" >
                </div>
                <div class="campos">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" maxlength="150"    value="<?php echo $usuario['telefone']?>">
                </div>
                <div class="campos">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" maxlength="150"  value="<?php echo $usuario['celular']?>">
                </div>
                <div class="campos">
                    <label for="cpf">Cpf</label>
                    <input type="text" name="cpf" id="cpf" maxlength="150"  value="<?php echo $usuario['cpf']?>">
                </div>
                <div class="campos">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" maxlength="150"    value="<?php echo $usuario['endereco']?>">
                </div>
                <?php
                    if($usuario['id'] != 0) {

                    
                ?>
                     <a href="delete_usuario.php?id=<?php echo $usuario['id']; ?>"><button type="button">Excluir</button></a>
                <?php
                   }
                ?>
                <button type="submit">Cadastrar</button>  
                <a href="login.php">Já possui uma conta?</a> 
            </form>
            <?php
                  if(isset($_GET['msgErro']))
                    echo "<p style='color:red;text-align:center;'>{$_GET['msgErro']}</p>"
            ?>
        </div>
		
	</body>
</html>