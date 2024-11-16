<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOPE</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
  <header>
    <div class="logo">
     <a href="./index.php"><img src="./logojudite.png" alt=""></a>
    </div>

<div class="carrinho">
        <a href="./carrinho.php"><ion-icon name="cart-sharp" style="color: #f4f3f0;"></ion-icon></a>
    </div>
    </header>

    <nav>
      <ul>
          <li><a href="./camisetas.php">Catalogo de camisetas</a></li>
          <li><a href="./area_infantil.php"style="color: #000">Área kids</a></li>
      </ul>
  </nav>

   <div class="banner4"><h1>ÁREA KIDS</h1></div>

  <div class="produto">
    

<?php
include_once('config.php');

// Preparando a query SQL para selecionar os dados
$sql = "SELECT imagem, nome, preco, categoria FROM produtos WHERE categoria IN ('adulto', 'infantil')";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Inicializando arrays para categorias
    $produtosAdulto = [];
    $produtosInfantil = [];

    // Organizando produtos por categoria
    while ($row = $result->fetch_assoc()) {
        if ($row['categoria'] == 'adulto') {
            $produtosAdulto[] = $row;
        } else {
            $produtosInfantil[] = $row;
        }
    }



    // Exibindo produtos infantis
    foreach ($produtosInfantil as $item) {
        echo "<div class='card'>";
        echo "<div class='p'><img src='" . htmlspecialchars($item["imagem"]) . "' alt='Imagem'></div>";
        echo "<div class='h3'>" . htmlspecialchars($item["nome"]) . "</div>";
        echo "<div class='p'>Preço: " . htmlspecialchars($item["preco"]) . "</div>";

        echo "<button type='submit' name='addcarrinho'>Adicionar ao Carrinho</button>";
    
        echo "</div>";
    }
} else {
    echo "0 resultados";
}

$conexao->close();
?>
</div>

    </main>

    <footer>
      <div class="sobre">
        <h2>Sobre nós:</h2>
        <p>Bem-vindo à nossa loja de camisetas cristãs, onde estilo e fé se encontram. Oferecemos camisetas oversized e casuais com temas cristãos, perfeitas para expressar sua crença de forma autêntica e moderna. Cada peça é criada com amor e dedicação, refletindo mensagens de esperança, amor e fé. Junte-se a nós nessa jornada e vista sua fé com estilo.
        </p>
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
