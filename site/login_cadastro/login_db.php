<?php

    include('../../conexao.php');

    $login = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE email = '{$login}' AND senha = '{$senha}'";
 
    
    $query = mysqli_query($conexao, $sql);
    $usuario_retorno = mysqli_num_rows($query);

    if($usuario_retorno == 1){
        $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);

        session_start();
        $_SESSION['usuario'] =  $usuario;

        header('Location: ../home_usuario/home_usuario.php?id='.$usuario['id']);
    }else{
        header('Location: login.php?msgErro=dados incorretos');
    }

?>