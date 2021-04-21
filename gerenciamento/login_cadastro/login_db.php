<?php

    include('../../conexao.php');

    $login = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuario_gerenciamento WHERE usuario = '{$login}' AND senha = '{$senha}'";
   
    $query = mysqli_query($conexao, $sql);
    $usuario_retorno = mysqli_num_rows($query);

    if($usuario_retorno == 1){
        $usuario_gerenciamento = mysqli_fetch_array($query, MYSQLI_ASSOC);
        session_start();
        $_SESSION['usuario_gerenciamento'] =  $usuario_gerenciamento;
        header('Location: ../index.php');
    }else{
        header('Location: login.php?msgErro=dados incorretos');
    }

?>