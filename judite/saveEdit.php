<?php
// Inclui o arquivo de configuração
include_once('config.php');

// Verifica se a conexão foi estabelecida corretamente
if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Sanitiza os dados do formulário para evitar injeção de SQL
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conexao, $_POST['complemento']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    // Prepara a consulta SQL utilizando prepared statements
    $sqlUpdate = "UPDATE usuarios SET nome=?, email=?, senha=?, cpf=?, cep=?, endereco=?, numero=?, complemento=?, telefone=?, tipo=? WHERE email=?";
    $stmt = $conexao->prepare($sqlUpdate);
    
    if ($stmt) {
        // Vincula os parâmetros à consulta
        $stmt->bind_param("sssssssssss", $nome, $email, $senha, $cpf, $cep, $endereco, $numero, $complemento, $telefone, $tipo, $email);
        
        // Executa a consulta
        if ($stmt->execute()) {
            echo "Dados atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar dados: " . $stmt->error;
        }
        
        // Fecha o statement
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }
}

// Fecha a conexão
mysqli_close($conexao);

// Redireciona para a lista de clientes
header('Location: lista_cliente.php');
exit(); // Adiciona exit() para garantir que o script não continue após o redirecionamento
?>
