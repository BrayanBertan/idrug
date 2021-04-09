<?php
            include('../../conexao.php');
            $sql = "SELECT * FROM modos_pagamento";
            $query = mysqli_query($conexao, $sql);
            while($modo = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $modos_pagamento[] = $modo;
            }
            //echo '<pre>',print_r($modos_pagamento),'</pre>';
        ?>
        
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Alterar Dados</title>
        <link rel="stylesheet" href="dados.css">
	</head>
	<body>
        <div class="conteudo">
            <form action="alterar_dados_db.php" method="post">
            <h1>Dados da Farmacia</h1>
                 <?php
                    $sql = "SELECT * FROM farmacia";
                    $query = mysqli_query($conexao, $sql);
                    $farmacia = mysqli_fetch_array($query, MYSQLI_ASSOC);
                ?>
                <img src="<?php echo $farmacia['logo']; ?>" alt="">
                <div class="campos">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" maxlength="150" value="<?php echo $farmacia['nome']; ?>">
                </div>
                <div class="campos">
                    <label for="sobre">Sobre</label>
                    <textarea type="text" name="sobre" id="sobre" maxlength="255" cols="30" rows="10"><?php echo $farmacia['sobre']; ?></textarea>
                </div>
                <div class="campos">
                    <label for="endereco">Endereço</label>
                    <textarea type="text" name="endereco" id="endereco" maxlength="255" cols="30" rows="10"><?php echo $farmacia['endereco']; ?></textarea>
                </div>
                <div class="campos">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" maxlength="14" value="<?php echo $farmacia['cnpj']; ?>">
                </div>
                
                <h2>Dados de contato</h2>
                <div class="campos">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" maxlength="10" value="<?php echo $farmacia['telefone']; ?>">
                </div>
                <div class="campos">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" id="celular" maxlength="11" value="<?php echo $farmacia['celular']; ?>">
                </div>
                <div class="campos">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" maxlength="150" value="<?php echo $farmacia['email']; ?>">
                </div>
                <h2>Modos de pagamento aceitos</h2>
                <?php 

                    foreach($modos_pagamento as $item){
                        if($item['status']){
                            echo  '<div class="modo_pagamento">';
                            echo  '<input type="checkbox" id="'.$item['id'].'" name="'.$item['id'].'"  checked>';
                            echo  ' <label for="'.$item['id'].'">'.$item['tipo'].'</label>';
                            echo  '</div>';
                        }
                        else{
                            echo  '<div class="modo_pagamento">';
                            echo  '<input type="checkbox" id="'.$item['id'].'" name="'.$item['id'].'">';
                            echo  ' <label for="'.$item['id'].'">'.$item['tipo'].'</label>';
                            echo  '</div>';
                        }
                    }
                   ?>
                <button type="submit">Alterar</button>  
            </form>
        </div>
		
	</body>
</html>
<?php
	mysqli_close($conexao);
?>