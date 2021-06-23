
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="meus_pedidos.css">
        <script type="text/javascript" src="../../assets/jquery-3.6.0.min.js"></script>
        <title>Meus Pedidos</title>
    </head>
    <body>
    <div class="conteudo">
    <input type="text" id="pesquisa_pedidos">
        <div class="lista-pedidos">
                <h3>Meus Pedidos</h3>
                <table class="pedidos_table">
                    <thead>
                        <tr>
                            <th>
                                Pedido
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
                    <tbody>
                        
                    </tbody>
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
						$('.pedidos_table tbody').append(data);
                    });
					
			});
        });
		</script>
            </div>
            <a href="../home_usuario/home_usuario.php">Minha Conta</a>
        </div>
    </body>

</html>

