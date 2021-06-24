<?php
	include('../../conexao.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM produto WHERE id= {$id}";
        $query = mysqli_query($conexao, $sql);
    }
 
   
    // echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";
  
    $filtro_nome = "";
    if(isset($_POST['pesquisa'])){
        $pesquisa = $_POST['pesquisa'];
        $filtro_nome = "WHERE nome LIKE '%$pesquisa%'";
       
    }

    

    
    $sql = "SELECT id,nome,estoque,foto FROM produto $filtro_nome";
    $query = mysqli_query($conexao, $sql);
    $produtos = [];
    while($produto= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $produtos[] = $produto;
    }
    $quantidade_produtos = mysqli_num_rows($query);
    

        foreach($produtos as $item){
        
    ?>
        <tr>
            <td class="td_id" style="width: 10%"><?php echo $item['id']?></td>
            <td style="width: 10%"><img src="../../<?php echo $item['foto']?>"  alt="produto"></td>
            <td style="width: 60%"><?php echo $item['nome']?></td>
            <td style="width: 10%"><?php echo $item['estoque']?></td>
            <td style="width: 10%">
                <a href="salvar_produto.php?id=<?php echo $item['id']?>"><img src="../../assets/imagens/geral/editar.png"  alt="editar"></a>
                <button id="deletar_btn"><img  src="../../assets/imagens/geral/deletar.png" alt="deletar"></button>
            </td>
        </tr>
    <?php
        }
    ?>