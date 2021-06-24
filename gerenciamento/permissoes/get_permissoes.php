<?php
	include('../../conexao.php');


   
    if(isset($_POST['id'])){
        $sql = "UPDATE usuario_gerenciamento SET acesso = {$_POST['acesso']} WHERE id = {$_POST['id']}";
        $query = mysqli_query($conexao, $sql);

        $updatedAt = date('Y-m-d H:i:s');
        $sql = "INSERT INTO log VALUES(null,'$updatedAt',1,'usuario_gerenciamento','update')";
        $query = mysqli_query($conexao, $sql);
        header('Location: listar_permissoes.php');
        return;
    }

    $filtro_permissoes = "";
    if(isset($_POST['pesquisa'])){
        $pesquisa = $_POST['pesquisa'];
        $filtro_permissoes = "WHERE a.nome like '%$pesquisa%'";
    }

    $sql = "SELECT a.id,a.nome,a.foto,b.id AS acesso_id,b.nome AS acesso 
            FROM usuario_gerenciamento AS a
            INNER JOIN acesso AS b ON b.id = a.acesso $filtro_permissoes ORDER BY a.acesso";
    $query = mysqli_query($conexao, $sql);
    $usuarios = [];
    while($usuario= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $usuarios[$usuario['acesso']][] = $usuario;
    }
    $quantidade_usuarios = mysqli_num_rows($query);



    $sql = "SELECT * FROM acesso";
    $query = mysqli_query($conexao, $sql);
    $acessos = [];
    while($acesso= mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $acessos[] = $acesso;
    }
    

    foreach($usuarios as $key => $usuarios_item){
        echo "<h3>$key</h3>";
      foreach($usuarios_item as $item){
     
    ?>
     
            <div class="usuarios">
            <img src="<?php echo $item['foto']?>"  alt="foto usuario">
                <p><?php echo $item['nome']?></p>
                <form action="get_permissoes.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $item['id']?>">
                <select name="acesso" id="acesso">
                    <?php
                    foreach ($acessos as $tipo) {
                    ?>
                     <option value="<?php echo $tipo['id']?>"   <?php if($item['acesso_id'] == $tipo['id']) echo'selected'?>><?php echo $tipo['nome']?></option>
                    <?php
                    }
                    ?>
                </select>
                <button type="submit"><img src="../../assets/imagens/geral/salvar.png"  alt="salvar"></button>
                </form>
            </div>
      
    <?php
        }
            }   
    ?>