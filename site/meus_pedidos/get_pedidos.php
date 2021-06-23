

    <?php
    include('../../conexao.php');

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login_cadastro/login.php?msgErro=Entre para acessar o painel!');
        return;
    }

    $filtro_id = "";
    if(isset($_POST['pesquisa'])){
        $pesquisa = $_POST['pesquisa'];
        $filtro_id = 'AND a.id = '.$pesquisa;
    
    }
    $usuario =  $_SESSION['usuario'];

    $sql = "SELECT a.id, a.status,a.endereco,
    (CASE
        WHEN a.status = 1 THEN 'Em Análise'
        WHEN a.status = 2 THEN 'Em Produção'
        WHEN a.status = 3 THEN 'Enviado'
        WHEN a.status = 4 THEN 'Saiu para entrega'
        WHEN a.status = 5 THEN 'Entregue'
        WHEN a.status = 6 THEN 'Pedido cancelado'
        ELSE 'Status desconhecido'
    END) AS status_desc,
    (SELECT SUM(b.preco_pago_unitario * b.quantidade) FROM item AS b WHERE b.pedido = a.id)	AS total 
    FROM pedido AS a WHERE usuario = {$usuario['id']} $filtro_id ORDER BY a.status";
    // echo $sql;
    // return;
    $query = mysqli_query($conexao, $sql);
    $pedidos = [];
    while($pedido= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $pedidos[] = $pedido;
    }
    $quantidade_pedidos = mysqli_num_rows($query);

//    echo "<pre>";
//         print_r($pedidos);
//     echo "</pre>";
    foreach($pedidos as $item){
   
  ?>
      <tr>
          <td >#<?php echo $item['id']?></td>
          <td >R$<?php echo $item['total']?></td>
          <td ><?php echo $item['status'].' '.$item['status_desc']?></td>
          <td >
              <a href="detalhes_pedido.php?id=<?php echo $item['id']?>&status_id=<?php echo $item['status']?>&total=<?php echo $item['total']?>&endereco=<?php echo $item['endereco']?>&status=<?php echo $item['status_desc']?>"><img src="../../assets/imagens/geral/pedidos.png"  alt="datalhes"></a>
          </td>
      </tr>
  <?php
      }
      mysqli_close($conexao);
  ?>
