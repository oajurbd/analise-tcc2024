<?php
include_once('config.php');

// Verifica se o parâmetro 'email' foi enviado via GET
if (isset($_GET['email'])) {
    // Sanitiza o email para evitar injeção de SQL
    $email = mysqli_real_escape_string($conexao, $_GET['email']);

    // Prepara a consulta SQL utilizando prepared statements
    $sql = "SELECT * FROM usuarios WHERE email=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);

    // Executa a consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Obtém os dados do usuário
            $user_data = $result->fetch_assoc();

            // Atribui os valores aos campos do formulário
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            // ... outros campos ...
        } else {
            echo "Usuário não encontrado.";
            exit;
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
        exit;
    }

    // Fecha o statement
    $stmt->close();
} else {
    header('Location: listacliente.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Cadastro de Cliente</title>
    <style>

       #voltar{
          font-size: 15px;
          color: white;
          text-decoration: none;
          float: right;
          cursor: pointer;
          margin-top: 25px;
          background-color: #f52338;
          padding: 10px;
          border-radius: 5px;
          margin-right: 20px; 
        }

        #voltar:hover{
          background-color: #df1d30;
          transition: 0.3s;
        }
        .formulario{
          display: flex;
          justify-content: center;
          align-items: center;
        }

        form{
          flex-direction: column; 
          width: 600px;
          height: 900px;
          margin-bottom: 30px;
          border: 1px solid #2b2b2b;
          border-radius: 5px;
          margin: 20px;
          padding: 20px;
          
          
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
     <a href="./index.html"><img src="./logojudite.png" alt=""></a>
    </div>
    <a href="lista_cliente.php" id="voltar">Voltar</a>
    </header>
        <nav>
          <h1>Cadastro de Cliente</h1>
        </nav>
    


    <div class="formulario">
    <form action="saveEdit.php" method="POST">
        <label for="name">Nome</label>
        <input type="text"id="nome"name="nome"required placeholder=" seu nome ">
        <br>                

        <label for="email">Email</label>
        <input type="email"id="email"name="email"required placeholder=" seu email">
        <br> 
      
        <label for="senha">Senha</label>
        <input type="password"id="senha" name="senha"placeholder="sua senha">
        <br> 

        <label for="cpf">CPF</label>
        <input type="number"id="cpf" name="cpf"placeholder="seu cpf">
        <br>

        <label for="cep">CEP</label>
        <input type="number"id="cep" name="cep"placeholder="seu cep">
        <br>

        <label for="endereco">Endereço</label>
        <input type="text"id="endereco" name="endereco"placeholder="seu endereço">
        <br>

        <label for="numero">Número da casa</label>
        <input type="number"id="numero" name="numero"placeholder="número da casa">
        <br>

        <label for="complemento">Complemento</label>
        <input type="varchar"id="complemento" name="complemento"placeholder="Ex. casa">
        <br>

        <label for="fone">Telefone</label>
        <input type="fone"id="fone" name="telefone"placeholder="seu telefone">
        <br>

        
        <label for="tipo">tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="" disabled selected>Selecione o tipo</option>
            <option value="0">0</option>
            <option value="1">1</option>
           
        </select>

        <br><br>
				<input type="hidden" name="email" value=<?php echo $email;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        

</form>
    </div>
    <footer>
    <p>&copy; 2024 JUDITE-Todos os direitos reservados.</p>
  </footer>
</body>
</html>