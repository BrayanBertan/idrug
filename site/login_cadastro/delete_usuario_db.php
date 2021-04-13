<?php
	include('../../conexao.php');
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM usuario WHERE id = {$id}";
	
	$query = mysqli_query($conexao, $sql);
	if($query) {
		header('Location: ../login_cadastro/login.php');
	} else {
		header('Location: cadastro.php?id='.$id.'&msgErro=' . mysqli_error($conexao));
	}

	mysqli_close($conexao);
?>