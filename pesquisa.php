<!-- Projeto CRUD: Tela de Pesquisa do banco de dados -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Pesquisa</title>
</head>
<body>
    <!-- Script para uso do método POST -->
    <?php 
        $pesquisa = $_POST['busca'] ?? ''; // Uso do operador de coaslescência nula para o caso do usuário não inserir nome algum na pesquisa.

        include "conexao.php"; // Inclusão do arquivo onde está o script para a conexão com o banco de dados.

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conexao, $sql); // A variável $dados irá receber todos os objetos do banco de dados que encontrar.
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Data Nascimento</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Funções</th> <!-- Coluna onde ficarão os botões para editar e excluir cadastro -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            include "funcoes.php"; // Inclusão do arquivo onde estão as funções converter_data e mensagem

                            // Percorrer os dados, caso existam.
                            // Função que percorre o vetor e marca o próximo, passa como parâmetro a variável $dados.
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $id_pessoa = $linha['id_pessoa'];
                                $nome = $linha['nome'];
                                $endereco = $linha['endereco'];
                                $telefone = $linha['telefone'];
                                $dt_nasc = $linha['dt_nasc'];
                                $dt_nasc = converter_data($dt_nasc); // Chamando a função converter_data, que altera a apresentação da data de nascimento.
                                $email = $linha['email'];
                                
                                // Imprimindo os dados de saída do banco de dados.
                                // linha 74: precisou concatenar o conteúdo do onclick (onlcick="pegar_dados('$id_pessoa', '$nome')") por conta das aspas duplas
                                echo "<tr>
                                        <th scope='row'>$id_pessoa</th>
                                        <td>$nome</td>
                                        <td>$endereco</td>
                                        <td>$telefone</td>
                                        <td>$dt_nasc</td>
                                        <td>$email</td>
                                        <td>
                                            <a href='cadastro-edit.php?id=$id_pessoa' class='btn btn-outline-success btn-sm'>Editar</a> 
                                            <a href='#' class='btn btn-outline-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick=" . '"' . "pegar_dados('$id_pessoa', '$nome')" . '"' . ">Excluir</a>
                                        </td>    
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-outline-primary">Voltar para o início</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="excluir-script.php" method="POST">
                    <div class="modal-body">
                        <p>Deseja realmente excluir o cadastro <b id="nome">Nome da pessoa</b>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                        <input type="hidden" name="nome" id="nome_excluido" value="">
                        <input type="hidden" name="id" id="id_pessoa" value="">
                        <input type="submit" class="btn btn-danger" value="Sim">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para puxar nome da pessoa na modal de exclusão de cadastro -->
    <script type="text/javascript">
        function pegar_dados(id, nome) {
            document.getElementById('nome').innerHTML = nome;
            document.getElementById('nome_excluido').value = nome;
            document.getElementById('id_pessoa').value = id;
        }
    </script>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>