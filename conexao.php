<?php 
    // Código para a conexão com o banco de dados.

    $server = "localhost";
    $user = "admin";
    $password = "9*uPal2SrYIQ9M74";
    $bd = "empresa";

    // Estrutura condicional para aplicação da função mysqli_connect, que retorna True ou False para a conexão com o banco de dados.
    if ($conexao = mysqli_connect($server, $user, $password, $bd)) {
        // echo "Conexão realizada com sucesso!"; - Essa linha foi usada para testar a conexão.
    } else {
        echo "Erro de conexão!";
    }
?>