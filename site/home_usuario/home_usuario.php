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
                    <h4>Pedidos</h4>
                    <p>Meus pedidos</p>
                    <a href="../meus_pedidos/meus_pedidos.php"><button>Ver</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../../assets/imagens/geral/carts.png"  alt="permissões">
                <div class="info">
                    <h4>Carrinho</h4>
                    <p>Meu carrinho</p>
                    <a href="../carrinho/carrinho.php"><button>Ver</button></a>
                </div>
            </div>
          
            <div class="modulos">
                <img src="../../assets/imagens/geral/user.png"  alt="conta">
                <div class="info">
                    <h4>Minha conta</h4>
                    <p>Editar os meus dados</p>
                    <a href="../login_cadastro/cadastro.php"><button>Ver</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../../assets/imagens/geral/logo.png"  alt="home_site">
                <div class="info">
                    <a href="../"><button>Tela inicial</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../../assets/imagens/geral/logout.png"  alt="logout">
                <div class="info">
                    <a href="../../logout.php?page=site/"><button>Sair</button></a>
                </div>
            </div>
        </div>
        <div id="bem-vindo">
                <img src="../../assets/imagens/geral/welcome.png"  alt="welcome">
                <p><?php echo $usuario['nome']?></p>
        </div>

</html>