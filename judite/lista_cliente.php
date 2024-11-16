<?php
// Inclui o arquivo de configuração (config.php)
include_once('config.php');

// Obtém o termo de busca da URL (se existir)
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Cria a consulta SQL com filtragem por nome ou email
$sql = "SELECT nome, email, senha, cpf, cep, endereco, numero, complemento, telefone, tipo 
        FROM usuarios 
        WHERE nome LIKE '%$searchTerm%' 
        OR email LIKE '%$searchTerm%'";

// Executa a consulta e verifica se houve sucesso
$result = $conexao->query($sql);
if (!$result) {
    die("Falha ao executar a consulta: " . $conexao->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/stylecliente.css">
    <title>Lista de cliente </title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .table-bg {
            background-color: #2b2b2b;
            border-radius: 10px 10px ;
            color: #ffffff;
            font-size: 25px;
            padding: 20px
        }

        .box-search {
            display: flex;
            justify-content: center;
            gap: 0.5%;
            

        }
        h1{
            text-align: center;
        }

        header {
            background-color: #2b2b2b;
            color: #ffffff;
            padding: 30px;
            height: 150px;
        }

        header img{
            max-width: 40%;
            height: auto;
        }
        .sair{
            margin-top: 25px;
            float: right;
        }

        nav{
            background-color: #c7c7c7;
            padding: 10px;
            text-align: center;

        }
        footer {
            background-color: #2b2b2b;
            color: #f0ede7;
            text-align: center;
            padding: 8px 0;
            bottom: 0;
            width: 100%;
            font-size: 20px;
            margin-top: 30px;
            
        }

        footer p{
            padding: 30px;
        }

    </style>
</head>
<body>

<header>
    
        <div class="logo">
         <a href="./adm.php"><img src="./logojudite.png" alt=""></a>
        </div>
        <div class="sair">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
</header>
<nav>


<?php
echo "<h1>Lista de Cliente</h1>";
?>
    
</nav>
<br>
<br>
<br>

<div class="box-search">
    
    <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6">
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    
                
                    <th scope="col">nome</th>
                    <th scope="col">email</th>
                    <th scope="col">senha</th>
                    <th scope="col">cpf</th>
                    <th scope="col">cep</th>
                    <th scope="col">endereco</th>
                    <th scope="col">numero</th>
                    <th scope="col">complemento</th>
                    <th scope="col">telefone</th>
                    <th scope="col">tipo</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                      //  echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['senha']."</td>";
                        echo "<td>".$user_data['cpf']."</td>";
                        echo "<td>".$user_data['cep']."</td>";
                        echo "<td>".$user_data['endereco']."</td>";
                        echo "<td>".$user_data['numero']."</td>";
                        echo "<td>".$user_data['complemento']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['tipo']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?email=$user_data[email]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete.php?email=$user_data[email]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
    <footer>
    <p>&copy; 2024 JUDITE-Todos os direitos reservados.</p>
  </footer>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'listacliente.php?search='+search.value;
    }
</script>
</body>
</html>