<!-- Projeto CRUD: Script para o cadastro dos funcionários -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php 
                include "conexao.php";
                include "funcoes.php";

                // Implementação do método POST para captação dos dados informados pelo funcionário.
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $dt_nasc = $_POST['dt_nasc'];

                // String que irá inserir os valores das variáveis do formulário na variável $sql
                $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `dt_nasc`) VALUES ('$nome','$endereco','$telefone','$email','$dt_nasc')";

                // Função para inserir os dados no banco de dados.
                // Requer dois parãmetros: qual a conexão e a instrução SQL que se deseja passar, e vai retornar se a inserção deu certo ou não.
                if (mysqli_query($conexao, $sql)) {
                    mensagem("$nome, seus dados foram cadastrados com sucesso!", 'success');
                } else
                    mensagem("$nome, não foi possível realizar seu cadastro!", 'danger');
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>