<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOPE</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <div class="logo">
        <a href="./index.php"><img src="./logojudite.png" alt="Logo"></a>
    </div>

    <div class="carrinho">
        <a href="./carrinho.php"><ion-icon name="cart-sharp" style="color: #f4f3f0;"></ion-icon></a>
    </div>
</header>

<nav>
    <ul>
        <li><a href="./camisetas.php" style="color: #000">Catálogo de camisetas</a></li>
        <li><a href="./area_infantil.php">Área kids</a></li>
    </ul>
</nav>

<div class="banner2"><h1>CATÁLOGO DE CAMISETAS</h1></div>

<div class="produto">
    <?php
    session_start(); // Inicia a sessão para manipular o carrinho

    include_once('config.php');

    // Preparando a query SQL para selecionar os dados
    $sql = "SELECT id_produto, imagem, nome, preco, categoria FROM produtos WHERE categoria IN ('adulto', 'infantil')";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        // Organizando produtos por categoria
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<div class='p'><img src='" . htmlspecialchars($row["imagem"]) . "' alt='Imagem do produto'></div>";
            echo "<div class='h3'>" . htmlspecialchars($row["nome"]) . "</div>";
            echo "<div class='p'>Preço: R$ " . number_format($row["preco"], 2, ',', '.') . "</div>";

            // Formulário para adicionar produto ao carrinho
            echo "<form action='carrinho.php' method='POST'>";
            echo "<input type='hidden' name='id_produto' value='" . $row['id_produto'] . "'>";
            echo "<input type='hidden' name='nome' value='" . htmlspecialchars($row['nome']) . "'>";
            echo "<input type='hidden' name='preco' value='" . $row['preco'] . "'>";
            echo "<input type='hidden' name='quantidade' value='1'>"; // Quantidade fixa para 1
            echo "<button type='submit' name='adicionar_ao_carrinho'>Adicionar ao Carrinho</button>";
            echo "</form>";

            echo "</div>";
        }

    } else {
        echo "Nenhum produto encontrado.";
    }

    $conexao->close();
    ?>
</div>

<footer>
    <div class="sobre">
        <h2>Sobre nós:</h2>
        <p>Bem-vindo à nossa loja de camisetas cristãs...</p>
    </div>
    <div class="cont">
        <h2>Contatos:</h2>
        <a href=""><ion-icon name="logo-instagram" style="color: white; font-size: 50px; margin-top: 20px;"></ion-icon></a>
        <a href=""><ion-icon name="logo-whatsapp" style="color: white; font-size: 50px; margin-top: 20px;"></ion-icon></a>
    </div> 
    <p>&copy; 2024 JUDITE-Todos os direitos reservados.</p>
</footer>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
