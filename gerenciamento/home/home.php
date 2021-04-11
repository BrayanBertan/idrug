<?php
    include('../../conexao.php');
    $sql = "SELECT * FROM usuario_gerenciamento WHERE id = '{$_GET['id']}'";
   
    $query = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
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

        <?php
            if($usuario['acesso'] == 2 || $usuario['acesso'] == 5){ 
        ?>
        <div class="conteudo">
            <div class="modulos">
                <img src="../../assets/imagens/geral/meus-dados.png">
                <div class="info">
                    <h4><b>Geral</b></h4>
                    <p>Dados da Farmacia</p>
                    <a href="../dados/alterar_dados.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
                if($usuario['acesso'] == 3 || $usuario['acesso'] == 5){ 
            ?>
            <div class="modulos">
                <img src="../../assets/imagens/geral/produtos.png">
                <div class="info">
                    <h4><b>Produtos</b></h4>
                    <p>Produtos da Farmacia</p>
                    <a href="../produtos/listar_produtos.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
             if($usuario['acesso'] >= 4){ 
            ?>
            <div class="modulos">
                <img src="../../assets/imagens/geral/pedidos.png">
                <div class="info">
                    <h4><b>Pedidos</b></h4>
                    <p>Pedidos da Farmacia</p>
                    <a href="../produto/produto.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <?php
             if($usuario['acesso'] == 5){ 
            ?>
            <div class="modulos">
                <img src="../../assets/imagens/geral/logs.png">
                <div class="info">
                    <h4><b>Log</b></h4>
                    <p>Log do sistema de gerenciamento</p>
                    <a href="../log/listar_log.php"><button>Ver</button></a>
                </div>
            </div>
            <div class="modulos">
                <img src="../../assets/imagens/geral/permissao.png">
                <div class="info">
                    <h4><b>Permissões</b></h4>
                    <p>Gerenciar o acesso dos colaboradores</p>
                    <a href="../permissoes/listar_permissoes.php"><button>Ver</button></a>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="modulos">
            <img src="../../assets/imagens/geral/user.png">
            <div class="info">
                <h4><b>Minha conta</b></h4>
                <p>Editar os meus dados</p>
                <a href="../login_cadastro/cadastro.php?id=<?php echo $usuario['id']?>"><button>Ver</button></a>
            </div>
        </div>
        </div>

</html>

<?php
	mysqli_close($conexao);
?>