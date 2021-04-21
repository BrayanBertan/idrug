<?php
    session_start();
    $usuario =  $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="home_usuario.css">
        <title>Home</title>
    </head>
    <body>
        <div class="conteudo">
            <div class="modulos">
                <img src="../../assets/imagens/geral/pedidos.png" alt="pedidos">
                <div class="info">
                    <h4><b>Pedidos</b></h4>
                    <p>Meus pedidos</p>
                    <a href=""><button>Ver</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../../assets/imagens/geral/carts.png"  alt="permissões">
                <div class="info">
                    <h4><b>Carrinho</b></h4>
                    <p>Meu carrinho</p>
                    <a href=""><button>Ver</button></a>
                </div>
            </div>
          
            <div class="modulos">
                <img src="../../assets/imagens/geral/user.png"  alt="conta">
                <div class="info">
                    <h4><b>Minha conta</b></h4>
                    <p>Editar os meus dados</p>
                    <a href="../login_cadastro/cadastro.php"><button>Ver</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../../assets/imagens/geral/logo.png"  alt="home_site">
                <div class="info">
                    <a href="../index.php"><button>Tela inicial</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../../assets/imagens/geral/logout.png"  alt="logout">
                <div class="info">
                    <a href="../login_cadastro/logout.php"><button>Sair</button></a>
                </div>
            </div>
        </div>
        <div id="bem-vindo">
                <img src="../../assets/imagens/geral/welcome.png"  alt="welcome">
                <p><b><?php echo $usuario['nome']?></b></p>
        </div>

</html>