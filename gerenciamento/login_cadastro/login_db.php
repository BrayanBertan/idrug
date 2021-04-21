<?php

    include('../../conexao.php');

    $login = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuario_gerenciamento WHERE usuario = '{$login}' AND senha = '{$senha}'";
   
    $query = mysqli_query($conexao, $sql);
    $usuario_retorno = mysqli_num_rows($query);

    if($usuario_retorno == 1){
        $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
        header('Location: ../index.php?id='.$usuario['id']);
    }else{
        header('Location: login.php?msgErro=dados incorretos');
    }

?>