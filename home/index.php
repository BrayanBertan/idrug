<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="../menu/menu.css">
        <title>Home</title>
    </head>
    <body>
        <?php
         include('../menu/menu.php');
        ?>
        <div class="conteudo">
            <?php
            for ($i=0; $i < 25; $i++) { 
           
            ?>
            <div class="produto">
                <img src="../assets/drugstore.png">
                <div class="info">
                    <h4><b>Carga Gillette Mach 3 c/ 4 Unidades</b></h4>
                    <p>R$39,10</p>
                    <a href="../produto/produto.php"><button>Comprar</button></a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <footer>
            IDRUG
        </footer>
        </body>

</html>