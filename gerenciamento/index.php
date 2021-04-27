<?php
    session_start();
    if(!isset($_SESSION['usuario_gerenciamento'])){
        header('Location: login_cadastro/login.php?msgErro=Entre para acessar o painel!');
        return;
    }

    $usuario =  $_SESSION['usuario_gerenciamento'];

    
?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="home.css">
        <title>Home</title>
    </head>
    <body>

        <div class="conteudo">
            <?php
                if($usuario['acesso'] == 2 || $usuario['acesso'] == 5){ 
            ?>
            <div class="modulos">
                <img src="../assets/imagens/geral/meus-dados.png" alt="meus dados">
                <div class="info">
                    <h4><b>Geral</b></h4>
                    <p>Dados da Farmacia</p>
                    <a href="dados/alterar_dados.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
                if($usuario['acesso'] == 3 || $usuario['acesso'] == 5){ 
            ?>
            <div class="modulos">
                <img src="../assets/imagens/geral/produtos.png" alt="produtos">
                <div class="info">
                    <h4><b>Produtos</b></h4>
                    <p>Produtos da Farmacia</p>
                    <a href="produtos/listar_produtos.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
             if($usuario['acesso'] >= 4){ 
            ?>
            <div class="modulos">
                <img src="../assets/imagens/geral/pedidos.png" alt="pedidos">
                <div class="info">
                    <h4><b>Pedidos</b></h4>
                    <p>Pedidos da Farmacia</p>
                    <a href="pedidos/pedidos.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
             if($usuario['acesso'] == 5){ 
            ?>
            <div class="modulos">
                <img src="../assets/imagens/geral/logs.png"  alt="log">
                <div class="info">
                    <h4><b>Log</b></h4>
                    <p>Log do sistema de gerenciamento</p>
                    <a href="log/listar_log.php"><button>Ver</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../assets/imagens/geral/permissao.png"  alt="permissões">
                <div class="info">
                    <h4><b>Permissões</b></h4>
                    <p>Gerenciar o acesso dos colaboradores</p>
                    <a href="permissoes/listar_permissoes.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="modulos">
                <img src="../assets/imagens/geral/user.png"  alt="conta">
                <div class="info">
                    <h4><b>Minha conta</b></h4>
                    <p>Editar os meus dados</p>
                    <a href="login_cadastro/cadastro.php?id=<?php echo $usuario['id']?>"><button>Ver</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../assets/imagens/geral/logout.png"  alt="logout">
                <div class="info">
                    <a href="../logout.php?page=gerenciamento/login_cadastro/login.php"><button>Sair</button></a>
                </div>
            </div>
        </div>

</html>
