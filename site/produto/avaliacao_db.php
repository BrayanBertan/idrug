<?php 
    // echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";
    include('../../conexao.php');
    $produto = $_POST['produto'];
    $usuario = $_POST['usuario'];
    $comentario = $_POST['comentario'];
    $nota = $_POST['nota'];
 
    $sql = "INSERT INTO avaliacao VALUES(null,'$produto','$usuario','$comentario','$nota')";
    $query = mysqli_query($conexao, $sql);

    header('Location: produto.php?id='.$produto);


?>