<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUDITE</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <div class="logo">
     <a href="./index.html"><img src="./logojudite.png" alt=""></a>
    </div>


    
    <div class="carrinho">
        <a href="./carrinho.php"><ion-icon name="cart-sharp" style="color: #f4f3f0;"></ion-icon></a>
    </div>
      
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
include_once('config.php');
// Preparando a query SQL para selecionar os dados
$sql = "SELECT imagem, nome, preco FROM produtos";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
      
      echo "<div class='card'>";
      echo "<div class='p'> <img src='" . $row["imagem"] . "' alt='Imagem'><br>" . "</div>";
      echo "<div class='h3'>  " . $row["nome"] . "</div>";
      echo "<div class='p'> Preço: " . $row["preco"]. "</div>"; 
      echo "</div>";  
        
    }
} else {
    echo "0 resultados";
}

$conexao->close();
?>
</div>
        
<!--4 cards por linha-->

                

              
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
