<?php
    include('../../conexao.php');
    
    $endereco = $_POST['endereco'];
    $usuario = $_POST['usuario'];
    $pagamento = $_POST['pagamento'];
    $sql = "INSERT INTO pedido VALUES(null,'{$usuario}','{$pagamento}','{$endereco}',1)";
    $query = mysqli_query($conexao, $sql);

    if($query) {
       $retorno = 'Pedido criado! MySQL erro: ' .mysqli_error($conexao);
       $imagem = '../../assets/imagens/geral/thumb-up.png';
       $pedido = mysqli_insert_id($conexao);
       $carrinho = json_decode($_COOKIE['carrinho'],true);
        foreach($carrinho as $item){
            $sql = "INSERT INTO item VALUES(null,'{$pedido}',{$item['id']},{$item['quantidade']},{$item['preco']},{$item['receita']})";
            $item_query = mysqli_query($conexao, $sql);
            if(!$item_query) {
                $retorno .= '   item '.$item['nome'].' não criado! MySQL erro: ' .mysqli_error($conexao);
                $imagem = '../../assets/imagens/geral/thumb-down.png';
            }
        }
        setcookie('carrinho', '[]', 0, '/');
    } else {
        $retorno = 'Pedido não criado! MySQL erro: ' .mysqli_error($conexao);
        $imagem = '../../assets/imagens/geral/thumb-down.png';
    }
?>
<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <link rel="stylesheet" href="../../gerenciamento/login_cadastro/login_cadastro.css">
        </head>
        <body>
            <div class="resposta">
                <img src="<?php echo $imagem; ?>" alt="resposta">
                <h1><?php echo $retorno ?></h1>
                <a href="../"><button>Continuar comprando</button></a>
                <a href="../meus_pedidos/meus_pedidos.php"><button>Meus pedidos</button></a>
            </div>
        </body>
    </html>
<?php
	mysqli_close($conexao);
?>