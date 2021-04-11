<?php

    include('../../conexao.php');

    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = '{$login}' AND senha = '{$senha}'";
   
    
    $query = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if($usuario){
        header('Location: ../home_usuario/home_usuario.php?id='.$usuario['id']);
    }else{
        header('Location: login.php');
    }

?>