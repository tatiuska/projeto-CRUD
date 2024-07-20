<!-- Projeto CRUD: Página para editar o cadastro -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Cadastro</title>
</head>
<body>
    <?php 
        include "conexao.php";
        include "funcoes.php";

        $id = $_GET['id'] ?? '';

        $sql = "SELECT * FROM pessoas WHERE id_pessoa = $id";

        $dados = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_assoc($dados);
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Editar Cadastro</h1>
                <!-- Formulário para editar o cadastro -->
                <form action="edit-script.php" method="POST">
                    <div class="form-group">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>"> <!-- faz com que não aceite formulários sem nome -->
                    </div>
                    <div class="form-group">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?>">
                    </div>
                        <div class="form-group">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="dt_nasc" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dt_nasc" value="<?php echo $linha['dt_nasc']; ?>">
                    </div>
                    </br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Salvar Alterações">
                        <input type="hidden" name="id" value="<?php echo $linha['id_pessoa']; ?>">
                    </div>
                </form>
                <hr>
                <a href="index.php" class="btn btn-outline-primary">Voltar para o início</a>
                <?php 
                ?>
            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>