<?php
include_once("config.php");
session_start();

// Cadastro
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ??''; 
    $cpf = $_POST['cpf'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $complemento = $_POST['complemento'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    // Verificar se o email já existe
    $checkEmail = "SELECT email FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "Este email já está cadastrado.";
    } else {
        // Inserir os dados no banco
        $sql = "INSERT INTO usuarios (nome, email, senha, cpf, cep, endereco, numero, complemento, telefone) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssssssss", $nome, $email, $senha, $cpf, $cep, $endereco, $numero, $complemento, $telefone);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }

    $stmt->close();
}

include_once("config.php");

// Login
if (isset($_POST['login'])) {
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Preparar a consulta para buscar o usuário pelo email
        $stmt = $conexao->prepare("SELECT id_usuario, nome, senha, tipo FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            

                    // Verificar se o usuário é administrador
                    if ($row['tipo'] == 1) {
                        header("Location: adm.php"); // Redireciona para a página de admin
                    } else {
                        header("Location: sistema.php"); // Redireciona para a página do sistema
                    }
                    exit();  // Sempre usar exit() após redirecionamento
                } else {
                    echo "Senha inválida.";
                }
            } else {
                echo "Email ou senha inválidos.";
            }
        

        $stmt->close();
    }
}

mysqli_close($conexao);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
      .formulario{
          display: flex;
          justify-content: center;
          align-items: center;
        }

        form{
          flex-direction: column; 
          width: 600px;
          height: 300px;
          margin-bottom: 30px;
        }
        .grupo1{
          max-width: 600px;
          margin: 100px ;
          background-color: #fff;
          padding: 30px;
          border-radius: 8px;
          font-size: 20px;
          height: 300px;
        }

        .grupo{
          max-width: 600px;
          margin: 100px ;
          background-color: #fff;
          padding: 30px;
          border-radius: 8px;
          font-size: 20px;       
          height: 900px;
        }

        input{
          width: 100%;
          padding: 8px;
          margin-bottom: 20px;
          box-sizing: border-box;
        }

        select{
          width: 100%;
          padding: 8px;
          margin-bottom: 10px;
          box-sizing: border-box;
        
        }

        #submit{
          margin-top: 0.8rem;
          padding: 0.6rem;
          cursor: pointer;
          color: #8A3130;
          font-size: 20px;
          width: 100%;
          height: 50px;
          background-color: #ff89a9;
          border-radius: 5px;
          border: #000000;
        }
        #submit:hover{
          background-color: #d3496e;
          transition: 0.3s;
          color: #ffffff;
        }

        .inputSubmit{
          margin-top: 0.8rem;
          padding: 0.6rem;
          cursor: pointer;
          color: #8A3130;
          font-size: 20px;
          width: 100%;
          height: 50px;
          background-color: #ff89a9;
          border-radius: 5px;
          border: #000000;
        }
        .inputSubmit:hover{
          background-color: #d3496e;
          transition: 0.3s;
          color: #ffffff;
        }

        label {
          display: block;
          margin-top: 8px;
        }

        .break{
          width: 0.3px;
          height: 800px;
          background-color: #8A3130;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="./index.php"><img src="./logojudite.png" alt=""></a>
        </div>
    </header>
    <nav>
        <h1>Bem-vindo!! Faça seu login. Não tem conta? Cadastre-se!</h1>
    </nav>

    <div class="formulario">
        <!-- Formulário de Login -->
        <fieldset class="grupo1">
            <h2>Login</h2>
            <form method="post" action="">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Seu email">
                <br>
                
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required placeholder="Sua senha">
                <br>

                <input class="inputSubmit" type="submit" name="login" value="Entrar">
            </form>
        </fieldset>
        <hr class="break">
        
        <!-- Formulário de Cadastro -->
        <fieldset class="grupo">
            <h2>Cadastro</h2>
            <form method="post" action="./form.php">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required placeholder="Seu nome">
                <br>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Seu email">
                <br>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required placeholder="Sua senha">
                <br>

                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required maxlength="11" placeholder="Seu CPF">
                <br>

                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" required placeholder="Seu CEP">
                <br>

                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" required placeholder="Seu endereço">
                <br>

                <label for="numero">Número da casa</label>
                <input type="text" id="numero" name="numero" required placeholder="Número da casa">
                <br>

                <label for="complemento">Complemento</label>
                <input type="text" id="complemento" name="complemento" placeholder="Ex: Apartamento, casa, etc.">
                <br>

                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required placeholder="Seu telefone">
                <br>

                <input type="submit" id="submit" name="cadastrar" value="Fazer cadastro">
            </form>
        </fieldset>
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
