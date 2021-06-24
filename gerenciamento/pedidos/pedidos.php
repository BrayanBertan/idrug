

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../site/meus_pedidos/meus_pedidos.css">
        <script type="text/javascript" src="../../assets/jquery-3.6.0.min.js"></script>
        <title>Pedidos da Farmacia</title>
    </head>
    <body>
    <div class="conteudo">
        <div class="lista-pedidos">
                <label for="pesquisa_pedidos">Pesquisar por id</label>
                <input type="text" id="pesquisa_pedidos">
                <h3>Pedidos da Farmacia</h3>
                <table class="pedidos_table">
                    <thead>
                        <tr>
                            <th>
                                Pedido
                            </th>
                            <th>
                                Cliente
                            </th>
                            <th>
                                Total
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                ações
                            </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <script type="text/javascript">
			$(document).ready(function () {
				$.ajax({
						url: 'get_pedidos.php'
					}).done(function (data) {
						$('.pedidos_table tbody').append(data);
					});

                    $('#pesquisa_pedidos').on('change', function () {
					$.ajax({
                        url: 'get_pedidos.php',
						method: 'post',
						data: {
                            pesquisa: $('#pesquisa_pedidos').val()
						}
					}).done(function (data) {
						$('.pedidos_table tbody').html(data);
                    });
					
			});
        });
		</script>
            </div>
            <a href="../">Home</a>
        </div>
    </body>

</html>
