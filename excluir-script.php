<!-- Projeto CRUD: Script para exclusão de cadastro -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Excluir Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php 
                include "conexao.php";
                include "funcoes.php";

                // Implementação do método POST para captação dos dados informados pelo funcionário.
                $id = $_POST['id'] ?? null;
                $nome = $_POST['nome'];

                // String que irá deletar os dados do cadastro na variável $sql
                $sql = "DELETE from `pessoas` WHERE `id_pessoa` = '$id'";

                // Função para inserir os dados no banco de dados.
                // Requer dois parãmetros: qual a conexão e a instrução SQL que se deseja passar, e vai retornar se a inserção deu certo ou não.
                if (mysqli_query($conexao, $sql)) {
                    mensagem("$nome, seus dados foram excluídos com sucesso!", 'success');
                } else
                    mensagem("$nome, não foi possível deletar seu cadastro!", 'danger');
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

