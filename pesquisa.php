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
        
        $pesquisa = $_POST['busca'] ?? '';

        include "conexao.php";

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conexao, $sql); // A variável $dados irá receber todos os objetos do banco de dados que encontrar.

        // Percorrer os dados, caso existam.
        // Função que percorre o vetor e marca o próximo, passa como parâmetro a variável $dados.
        while ($linha = mysqli_fetch_assoc($dados)) {
            foreach ($linha as $key => $value) {
                echo "$key: $value<br>";
            }
            echo "<hr>";
        }

    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-outline-primary">Voltar para o início</a>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>