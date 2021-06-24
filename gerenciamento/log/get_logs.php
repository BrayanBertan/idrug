<?php
	include('../../conexao.php');
   
    $filtro_tabela = "";
    if(isset($_POST['pesquisa'])){
        $pesquisa = $_POST['pesquisa'];
        $filtro_tabela = "WHERE a.tabela like '%$pesquisa%'";
    }
    
    $sql = "SELECT a.*, b.nome FROM log AS a
    LEFT JOIN usuario_gerenciamento AS b ON b.id = a.updatedBy $filtro_tabela ORDER BY a.updatedAt DESC";
    $query = mysqli_query($conexao, $sql);
    $logs = [];
    while($log= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $updatedAtArray =  explode(' ', $log['updatedAt']);
        $dataArray = explode('-', $updatedAtArray[0]);
        $log['updatedAt'] = $dataArray[2].'/'.$dataArray[1].'/'.$dataArray[0].' '.$updatedAtArray[1];
        $logs[] = $log;
    }
    $quantidade_logs = mysqli_num_rows($query);
    
    foreach($logs as $item){
   
  ?>
      <tr>
          <td><?php echo $item['id']?></td>
          <td><?php echo $item['updatedAt']?></td>
          <td><?php echo $item['nome']?></td>
          <td><?php echo $item['tabela']?></td>
          <td><?php echo $item['tipo']?></td>
      </tr>
  <?php
      }
  ?>
