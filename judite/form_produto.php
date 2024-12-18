<?php

// Função para validação de campos
function validarCampo($campo) {
  return !empty($campo) && trim($campo) != "";
}

// Função para converter preço para float
function converterParaFloat($preco) {
  return floatval(str_replace(",", ".", $preco));
}

// Função para upload de imagem
function uploadImagem($imagem) {
  $target_dir = "imagem/";
  $target_file = $target_dir . basename($imagem["name"]);

  if (!move_uploaded_file($imagem["tmp_name"], $target_file)) {
    return null;
  }

  return $target_file;
}

// Conexão com o banco de dados
$conn = new PDO('mysql:host=localhost;dbname=judite', 'root', '');

// Verificação de envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Dados do formulário

  $imagem = $_FILES["imagem"];
  $nome = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $preco = converterParaFloat($_POST["preco"]);
  $tamanho = $_POST["tamanho"];
  $quantidade = $_POST["quantidade"];
  $categoria = $_POST["categoria"];

  // Validação de campos
  $erros = [];
 
  if (!validarCampo($nome)) {
    $erros[] = "O campo nome é obrigatório.";
  }
  if (!validarCampo($descricao)) {
    $erros[] = "O campo descrição é obrigatório.";
  }
  if (!validarCampo($preco)) {
    $erros[] = "O campo preço é obrigatório e deve ser um número válido.";
  }
  if (!validarCampo($tamanho)) {
    $erros[] = "O campo tamanho é obrigatório.";
  }
  if (!validarCampo($quantidade)) {
    $erros[] = "O campo quantidade é obrigatório.";
  }
  if (!validarCampo($categoria)) {
    $erros[] = "O campo categoria é obrigatório.";
  }

  
  // Upload da imagem
  $imagem_path = null;
  if (isset($imagem) && $imagem["error"] === 0) {
    $imagem_path = uploadImagem($imagem);
    if (!$imagem_path) {
      $erros[] = "Erro ao enviar a imagem.";
    }
  }

  // Se não houver erros, cadastra o produto
  if (empty($erros)) {
    $stmt = $conn->prepare("INSERT INTO produtos (imagem, nome, descricao, preco, tamanho, quantidade, categoria) VALUES (:imagem, :nome, :descricao, :preco, :tamanho, :quantidade, :categoria)");
    
    $stmt->bindParam(':imagem', $imagem_path);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':tamanho', $tamanho);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':categoria', $categoria);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "<p>Produto cadastrado com sucesso!</p>";
    } else {
      echo "<p>Erro ao cadastrar o produto.</p>";
    }
  } else {
    // Exibe os erros
    echo "<ul>";
    foreach ($erros as $erro) {
      echo "<li>$erro</li>";
    }
    echo "</ul>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO DE PRODUTO</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
      
        #pr{
            text-align: center;
            padding: 5px;
            margin: 5px;
            font-size: 25px;
        }

         .formulario{
          display: flex;
          justify-content: center;
          align-items: center;
        }

        form{
          flex-direction: column; 
          width: 1000px;
          height: 700px;
          
        }
        .grupo{
          max-width: 100%;
          margin: 30px ;
          background-color: #fff;
          padding: 30px;
          border-radius: 8px;
          font-size: 30px;
           
        }

        input{
          width: 100%;
          padding: 8px;
          margin-bottom: 10px;
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
          color: #000000;
          font-size: 20px;
          height: 50px;
          width: 50%;
          background-color: #ff89a9;
          border-radius: 5px;
          border: #000000;
          justify-content: center;
          align-items: center;
        }
        #submit:hover{
          background-color: #e04b73;
          transition: 0.3s;
          color: #ffffff;
        }

        label {
          display: block;
          margin-top: 8px;
        }

        
        
    </style>
</head>

<body>
<header>
        <div class="logo">
         <a href="./adm.php"><img src="./logojudite.png" alt=""></a>
        </div>


          
      </div>
    </header>
<nav><h1 id="pr">Cadastrar novo produto</h1></nav>
    
    <div class="formulario">
        <fieldset class="grupo">
            <form action="./form_produto.php" method="post" enctype="multipart/form-data">

                
                <label for="imagem">Imagem</label>
                <input type="file" id="imagem" name="imagem" accept="imagem/*">
                <br> 

                <label for="name">Nome do produto</label>
                <input type="text"id="nome"name="nome"required placeholder=" seu nome ">
                <br>                
            
                <label for="descricao">Descrição</label>
                <input type="text"id="descricao"name="descricao"required placeholder=" Descrição do produto">
                <br> 
            
                <label for="preco">Preço</label>
                <input type="float"id="preco" name="preco"placeholder="Preço do produto">
                <br> 
                
                <label for="categoria">Tamanho</label>
                <select class="tamanho" id="tamanho" name="tamanho" required>
                <option value="" disabled selected>Selecione o tamanho</option>
                <option value="PP">PP</option>
                <option value="P">P</option>
                <option value="M">M</option>
                <option value="G">G</option>
                <option value="GG">GG</option>
            </select>
                <br>
            
                <label for="quantidade">Quantidade</label>
                <input type="text"id="quantidade" name="quantidade"placeholder="Quantidade de camisetas">
                <br>
               
                <label for="categoria">Categoria</label>
                <select class="categoria" id="categoria" name="categoria" required>
                    <option value="" disabled selected>Selecione a categoria</option>
                    <option value="adulto">Adulto</option>
                    <option value="infantil">Infantil</option>
                </select>
                <button type="submit" id="submit">Cadastrar produto</button>
            
            </form> 
        </fieldset>
    </div>   
    <footer>
<p>&copy; 2024 JUDITE-Todos os direitos reservados.</p>
      </footer>

      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>