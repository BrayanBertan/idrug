

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="permissoes.css">
        <script type="text/javascript" src="../../assets/jquery-3.6.0.min.js"></script>
        <title>Solicitações de Acesso</title>
    </head>
    <body>
            <label for="pesquisa_permissoes">Pesquisar por tabela</label>
            <input type="text" id="pesquisa_permissoes">
        <div class="conteudo">
                <h1>Solicitações de Acesso</h1>  
        </div>
        <script type="text/javascript">
			$(document).ready(function () {
				$.ajax({
						url: 'get_permissoes.php'
					}).done(function (data) {
						$('.conteudo').append(data);
					});

                    $('#pesquisa_permissoes').on('change', function () {
                      
					$.ajax({
                        url: 'get_permissoes.php',
						method: 'post',
						data: {
                            pesquisa: $('#pesquisa_permissoes').val()
						}
					}).done(function (data) {
						$('.conteudo').html(data);
                    });
					
			});
        });
		</script>
    </body>

</html>