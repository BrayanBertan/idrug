<?php
	include('../../conexao.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM produto WHERE id= {$id}";
        $query = mysqli_query($conexao, $sql);
    }

    
    $sql = "SELECT id,nome,estoque,foto FROM produto";
    $query = mysqli_query($conexao, $sql);
    $produtos = [];
    while($produto= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $produtos[] = $produto;
    }
    $quantidade_produtos = mysqli_num_rows($query);
    
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="produtos.css">
        <link rel="stylesheet" href="../menu/menu.css">
        <title>Produtos</title>
    </head>
    <body>
        <div class="conteudo">
            <div class="novo-produto">
                <h3>Adicionar novo produto</h3>
                <a href="../home/"><button>+</button></a>
            </div>
            <div class="lista-produtos">
                <h3>Produtos</h3>
                <table>
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                foto
                            </th>
                            <th>
                                nome
                            </th>
                            <th>
                                estoque
                            </th>
                            <th>
                                ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach($produtos as $item){
                         
                        ?>
                            <tr>
                                <td style="width: 10%"><?php echo $item['id']?></td>
                                <td style="width: 10%"><img src="<?php echo $item['foto']?>" alt=""></td>
                                <td style="width: 60%"><?php echo $item['nome']?></td>
                                <td style="width: 10%"><?php echo $item['estoque']?></td>
                                <td style="width: 10%">
                                    <a href=""><img src="../../assets/imagens/geral/editar.png" alt=""></a>
                                    <a href="listar_produtos.php?id=<?php echo $item['id']?>"><img src="../../assets/imagens/geral/deletar.png" alt=""></a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <p><?php echo $quantidade_produtos.' produto(s)' ?></p>
            </div>
        </div>
    </body>

</html>