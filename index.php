<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <title>Document</title>
    </head>
    <body>
        <div class="header">
            <img  src="assets/drugstore.png" alt="">
            <div class="div-usuario">
                <button type="button"><img  src="assets/user.png" alt="">Minha Conta</button>
                <button type="button"><img  src="assets/carts.png" alt="">Meu Carrinho</button>
            </div>
            <div class="div-filtros">
                <form action="/action_page.php">
                    <input type="text" name="pesquisa" placeholder="     Pesquisa">
                    <select name="" id="">
                        <option value="">Teste</option>
                    </select>
                    <input class="faixa-preco" type="number" name="min" placeholder=" preço minimo">
                    <input class="faixa-preco" type="number" name="max" placeholder=" preço máximo">
                    <button type="submit"><img  src="assets/search.png" alt=""></button>
                </form>
            </div>
            
        </div>
        <div class="conteudo">
            <?php
            for ($i=0; $i < 25; $i++) { 
        
           
            ?>
            <div class="produto">
                <img src="assets/drugstore.png" alt="Avatar" style="width:100%">
                <div class="info">
                    <h4><b>Carga Gillette Mach 3 c/ 4 Unidades</b></h4>
                    <p>R$39,10</p>
                    <button>Comprar</button>
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