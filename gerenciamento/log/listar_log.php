
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="log.css">
        <script type="text/javascript" src="../../assets/jquery-3.6.0.min.js"></script>
        <title>logs</title>
    </head>
    <body>
        <div class="conteudo">
            <div class="lista-logs">
            <label for="pesquisa_logs">Pesquisar por nome</label>
            <input type="text" id="pesquisa_logs">
                <h3>Logs</h3>
                <table class="logs_table">
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                atualizado em
                            </th>
                            <th>
                                atualizado por
                            </th>
                            <th>
                                tabela
                            </th>
                            <th>
                                ação
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <script type="text/javascript">
			$(document).ready(function () {
				$.ajax({
						url: 'get_logs.php'
					}).done(function (data) {
						$('.logs_table tbody').append(data);
					});

                    $('#pesquisa_logs').on('change', function () {
                      
					$.ajax({
                        url: 'get_logs.php',
						method: 'post',
						data: {
                            pesquisa: $('#pesquisa_logs').val()
						}
					}).done(function (data) {
						$('.logs_table tbody').html(data);
                    });
					
			});
        });
		</script>
                </table>
            </div>
        </div>
    </body>

</html>