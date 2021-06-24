

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="produtos.css">
        <script type="text/javascript" src="../../assets/jquery-3.6.0.min.js"></script>
        <title>Produtos</title>
    </head>
    <body>
        <div class="conteudo">
            <div class="novo-produto">
                <h3>Adicionar novo produto</h3>
                <a href="salvar_produto.php"><button>+</button></a>
            </div>
            <label for="pesquisa_produtos">Pesquisar por nome</label>
            <input type="text" id="pesquisa_produtos">
            <div class="lista-produtos">
                <h3>Produtos</h3>
                <table class="produtos_table">
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                foto
                            </th>
                            <th>
                                nome
                            </th>
                            <th>
                                estoque
                            </th>
                            <th>
                                ações
                            </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $.ajax({
                                    url: 'get_produtos.php'
                                }).done(function (data) {
                                    $('.produtos_table tbody').append(data);
                                });

                                $('#pesquisa_produtos').on('change', function () {
                                console.log('prods');
                                $.ajax({
                                    url: 'get_produtos.php',
                                    method: 'post',
                                    data: {
                                        pesquisa: $('#pesquisa_produtos').val()
                                    }
                                }).done(function (data) {
                                    $('.produtos_table tbody').html(data);
                                });
                                
                        });

                        $(document).on('click', '#deletar_btn', function () {
                            if(confirm("Press a button!") == false)
                                return;
                            $.ajax({
                                    url: 'get_produtos.php',
                                    method: 'post',
                                    data: {
                                        id: $(this).closest('tr').children('td.td_id').text()
                                    }
                                }).done(function (data) {
                                    $('.produtos_table tbody').html(data);
                                });
                        });
                    });
		        </script>
                </table>
            </div>
        </div>
    </body>

</html>