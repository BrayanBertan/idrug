<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="produto.css">
        <link rel="stylesheet" href="../menu/menu.css">
        <title>Produto</title>
    </head>
    <body>
        <?php
         include('../menu/menu.php');
        ?>
        <div class="conteudo">
            <div class="principal">
                <div class="produto-foto">
                    <img src="../assets/drugstore.png" >
                </div>
                <div class="infos">
                    <h1><b>Carga Gillette Mach 3 c/ 4 Unidades</b></h1>
                    <br>
                    <p>R$39,10</p>
                    <br>
                    <p>
                        Genacol Colágeno Hidrolisado em Cápsulas - Produto natural canadense que possui em sua formulação uma matriz exclusiva de aminoácidos provenientes do colágeno hidrolisado 100% puro, fornecendo ao organismo os elementos necessários para a produção do colágeno, essenciais para a amnutenção da saúde e qualidade de vida - Genacol é natural, sem contraindicações, livre de açúcar, corantes, conservantes ou qualquer agente artificial.

                        O que é Genacol:

                        Genacol é um suplemento bioativo, 100% natural, seguro, livre de conservantes e que fornece os elementos necessários para a manutenção e produção de colágeno.

                        Genacol é um suplemento alimentar natural que promove o suprimento do colágeno no organismo. Diversos estudos clínicos já foram realizados e publicados, demonstrando que Genacol® é seguro e pode ajudar a promover muitos benefícios à saúde e qualidade de vida.

                        Sugestão de Uso: Ingerir 3 cápsulas de Genacol antes de dormir, ou à critério profissional.
                    </p>
                    <br> <br>
                        <a href="../produto/produto.php"><button>Comprar</button></a>
                        <button class="quantidade">-</button>
                        <button class="quantidade">1</button>
                        <button class="quantidade">+</button> <br> <br>
                        <div class="modo-pagamento-aceito">
                            <p>Modos de pagamento aceitos</p>
                            <img src="../assets/barcode.png" >
                            <img src="../assets/mastercard.png" >
                            <img src="../assets/visa.png" >
                            <img src="../assets/money.png" >
                        </div>
                </div>
            </div>
            <h2><b>Avaliações</b></h2><br><br>
            <br>
            <div class="avaliacoes">
                <?php
                for ($i=0; $i < 25; $i++) { 
            
                ?>
                <div class="avaliacao">
                    <div class="dados"> 
                        <img src="../assets/user.png" >
                        <h3>Nome</h3>
                        <h2>8.5</h2>
                    </div>
                   <div class="descricao">
                   <p>loreoskdkddddddddddddd 
                        ddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>ddddddddddddddddddddddddddddddddd
                        dddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaaaddddddd<br>dddddddddddddddddddddddllll
                        llllllllllllllllllllllllaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaall<br>lllllllllllaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    </p>
                   </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <footer>
            IDRUG
        </footer>
        </body>

</html>