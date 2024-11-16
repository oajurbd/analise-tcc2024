<?php
session_start();
include_once("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegando dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? ''; 
    $cpf = $_POST['cpf'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $complemento = $_POST['complemento'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    
    // Dados de pagamento
    $numero_cartao = $_POST['numero_cartao'] ?? '';
    $nome_cartao = $_POST['nome_cartao'] ?? '';
    $data_validade = $_POST['data_validade'] ?? '';
    $cvv = $_POST['cvv'] ?? '';
    $valor_total = $_POST['valor_total'] ?? '';

    
    // Inserir dados de usuário
    $sql_usuario = "INSERT INTO usuarios (nome, email, senha, cpf, cep, endereco, numero, complemento, telefone) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar a query para execução
    if ($stmt = $conexao->prepare($sql_usuario)) {
        $stmt->bind_param("sssssssss", $nome, $email, $senha, $cpf, $cep, $endereco, $numero, $complemento, $telefone);
        if ($stmt->execute()) {
            echo "<p>Usuário cadastrado com sucesso!</p>";
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }
        $stmt->close();
    }

    // Inserir dados de pagamento
    $sql_compra = "INSERT INTO compras (numero_cartao, nome_cartao, data_validade, cvv, valor_total)
                   VALUES (?, ?, ?, ?, ?)";
    
    // Preparar a query para execução
    if ($stmt = $conexao->prepare($sql_compra)) {
        $stmt->bind_param("sssss", $numero_cartao, $nome_cartao, $data_validade, $cvv, $valor_total);
        if ($stmt->execute()) {
            echo "<p>Compra finalizada com sucesso!</p>";
        } else {
            echo "Erro ao registrar compra: " . $stmt->error;
        }
        $stmt->close();
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
}

?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/stylefinalizar.css">
</head>
<body>

<header>
    <div class="logo">
        <a href="./index.php"><img src="./logojudite.png" alt=""></a>
    </div>
</header>

<div class="form-container">
    <h2>Finalize sua Compra</h2>
    <fieldset class="grupo">
        <legend>Cadastro</legend>
        <form action="finalizar_compra.php" method="POST">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required placeholder="Seu nome">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Seu email">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Sua senha">

            <label for="cpf">CPF</label>
            <input type="number" id="cpf" name="cpf" placeholder="Seu CPF">

            <label for="cep">CEP</label>
            <input type="number" id="cep" name="cep" placeholder="Seu CEP">

            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" placeholder="Seu endereço">

            <label for="numero">Número da Casa</label>
            <input type="number" id="numero" name="numero" placeholder="Número da casa">

            <label for="complemento">Complemento</label>
            <input type="text" id="complemento" name="complemento" placeholder="Ex. Casa">

            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" placeholder="Seu telefone">
        </fieldset>
        
        <fieldset class="grupo">
            <legend>Pagamento</legend>
            
            <label for="numero_cartao">Número do Cartão</label>
            <input type="number" id="numero_cartao" name="numero_cartao" required maxlength="16">

            <label for="nome_cartao">Nome do Titular</label>
            <input type="text" id="validade_cartao" name="nome_cartao" required maxlength="30">

            <label for="data_validade">Data de validade</label>
            <input type="number" id="codigo_seguranca" name="data_validade" required maxlength="6">

            <label for="cvv">CVV</label>
            <input type="number" id="codigo_seguranca" name="cvv" required maxlength="3">

            <label for="valor_total">Valor Total (R$)</label>
            <input type="number" id="valor_total" name="valor_total" step="0.01" required>

            <button type="submit">Finalizar Compra</button>
        </fieldset>
    </form>
</div>

<footer>
    <div class="cont">
        <h2>Contatos:</h2>
        <a href=""><ion-icon name="logo-instagram" style="color: white; font-size: 50px; margin-top: 20px;"></ion-icon></a>
        <a href=""><ion-icon name="logo-whatsapp" style="color: white; font-size: 50px; margin-top: 20px;"></ion-icon></a>
    </div> 
    <p>&copy; 2024 JUDITE-Todos os direitos reservados.</p>
</footer>

<script src="./js/slide.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
