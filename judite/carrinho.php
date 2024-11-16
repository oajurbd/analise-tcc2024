<?php
session_start();

    include_once('config.php');

// Verifica se a sessão já está configurada, caso contrário inicializa
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adiciona produto ao carrinho
if (isset($_POST['adicionar_ao_carrinho'])) {
    $id_produto = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

    $item = [
        'id_produto' => $id_produto,
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => $quantidade
    ];


    // Verifica se o produto já está no carrinho
    $item_exists = false;
    foreach ($_SESSION['carrinho'] as $produto) {
        if ($produto['id_produto'] == $id_produto) {
            $item_exists = true;
            echo "<p class='erro'>O produto já está no carrinho!</p>";
            break;
        }
    }

    if (!$item_exists) {
        $_SESSION['carrinho'][] = $item;

        // Insere o item no banco de dados (tabela carrinho)
        // Agora sem a necessidade do id_usuario
        $query = "INSERT INTO carrinho (id_produto, nome, preco, quantidade) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param('isdi', $id_produto, $nome, $preco, $quantidade); // Parametros: 'i' para inteiro, 's' para string, 'd' para decimal

        if ($stmt->execute()) {
            echo "<p class='sucesso'>Produto adicionado ao carrinho com sucesso!</p>";
        } else {
            echo "<p class='erro'>Erro ao adicionar o produto ao carrinho no banco de dados.</p>";
        }
    }
}
// Remove item do carrinho
if (isset($_POST['remove_item'])) {
    $id_produto_remover = filter_input(INPUT_POST, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
    
    foreach ($_SESSION['carrinho'] as $key => $produto) {
        if ($produto['id_produto'] == $id_produto_remover) {
            unset($_SESSION['carrinho'][$key]);
            // Redireciona para atualizar a página após a remoção
            header("Location: carrinho.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylecarrinho.css">
</head>
<body>
    <header>
    <div class="logo">
        <a href="./index.php"><img src="./logojudite.png" alt="Logo"></a>
    </div>

    </header>
    <nav>
        <h1>Carrinho de Compras</h1>
    </nav>

    

    <?php if (!empty($_SESSION['carrinho'])): ?>
        <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>..</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_geral = 0;
                foreach ($_SESSION['carrinho'] as $produto):
                    $total_produto = $produto['preco'] * $produto['quantidade'];
                    $total_geral += $total_produto;
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                        <td>R$<?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $produto['quantidade']; ?></td>
                        <td>R$<?php echo number_format($total_produto, 2, ',', '.'); ?></td>
                        <td>
                            <form method="POST" action="carrinho.php">
                                <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
                                <input type="submit" name="remove_item" class="remove-btn" value="Remover">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="total">
        <h2>Total: R$<?php echo number_format($total_geral, 2, ',', '.'); ?></h2>
    <?php else: ?>
        <p>O carrinho está vazio.</p>
    <?php endif; ?>


    <div class="buttons">
    <form action="finalizar_compra.php" method="POST">
    <input type="hidden" name="total_geral" value="<?php echo $total_geral; ?>">

    <?php if (!empty($_SESSION['carrinho'])): ?>
        <?php foreach ($_SESSION['carrinho'] as $produto): ?>
            <input type="hidden" name="produtos[]" value="<?php echo htmlspecialchars(json_encode($produto)); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <input type="submit" class="finalizar-compra-btn" value="Finalizar Compra">
</form>

    <a href="camisetas.php" class="voltar-produtos"><button>Voltar aos Produtos</button></a>
            </div>
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
