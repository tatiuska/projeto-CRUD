<?php 
    // Optei por separar as funções do arquivo de conexão
    // Função para mostrar a mensagem de "Cadastrado com sucesso" mais apresentável.
    // Parâmetro $texto = a mensagem que vai aparecer para o usuário.
    // Parâmetro $tipo, a classe específica para a mensagem ser exibida em verde ou em vermelho.
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>$texto</div>";
    }

    // Função para modificar a exebição da data de nascimento (para dia/mês/ano).
    function converter_data($data){
        $dados_data = explode('-', $data);
        $escreve = $dados_data[2] . "/" . $dados_data[1] . "/" . $dados_data[0];
        return $escreve; 
    }
?>