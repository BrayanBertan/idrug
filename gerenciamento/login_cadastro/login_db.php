<?php

    include('../../conexao.php');

    $login = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario_gerenciamento WHERE usuario = '{$login}' AND senha = '{$senha}'";
   
    $query = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
    if($usuario){
        header('Location: ../home/home.php?id='.$usuario['id']);
    }else{
        header('Location: login.php');
    }

?>