<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: form.php');
    }
    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id_usuario LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id_usuario DESC";
    }
    else
    {
        $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC";
    }
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUDITE</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/slide.css">
    <style>
      .user-dropdown {
    position: relative;
    display: inline-block;
}

.user-icon a {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    background-color: #ffffff;
    color: #000000;
    font-size: 15px;
    border: 1px solid #ddd;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    width: 200px;
    border-radius: 4px;
    text-align: center;
}

.user-dropdown:hover .dropdown-menu {
    display: block;
}

.user-name {
    font-weight: bold;
    margin: 0;
}

.user-email {
    color: #888;
    margin: 5px 0;
}

.logout-button {
    background-color: #d9534f;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
}

.logout-button:hover {
    background-color: #c9302c;
}
    </style>
    
</head>
<body>
    <header>
        <div class="logo">
         <a href="./index.html"><img src="./logojudite.png" alt=""></a>
        </div>

<div class="carrinho">
            <a href="./carrinho.html"><ion-icon name="cart-sharp" style="color: #f4f3f0;"></ion-icon></a>
            <div class="user-dropdown">
              <div class="user-icon">
                 <a href="./form.php"><ion-icon name="person-circle-sharp" style="color: #f4f3f0;"></ion-icon></a> 
              </div>
              <div class="dropdown-menu">
                  <?php
                    echo "<p>$logado</p>";
                    ?>
                    <br>
                  <a class="logout-button" href="./sair.php">Sair</a>
              </div>
          </div>
        </div>
          
      </div>
    </header>

    <nav>
      <ul>
          <li><a href="./camisetas.php">Catálogo de camisetas</a></li>
          <li><a href="./area_infantil.php">Área kids</a></li>
      </ul>
  </nav>

  <div class="carousel">
    <div class="slides">
      <div class="slide"><img src="./img.roupas/1.png" alt="Imagem 1"></div>
      <div class="slide"><img src="./img.roupas/2.png" alt="Imagem 2"></div>
      <div class="slide"><img src="./img.roupas/3.png" alt="Imagem 3"></div>
    </div>
    <button class="prev" onclick="prevSlide()">❮</button>
    <button class="next" onclick="nextSlide()">❯</button>
  </div>

    <main>
    
        <section>
            <h2 style="font-size: 30px; color: #8A3130; margin-bottom: 15px;">Nossos Produtos</h2>
            
<!--4 cards por linha-->

               
              <div class="lista-produtos">  
                <div class="produto">
                  <a href="./info-prod-fem/prod10.html"><img src="./img.roupas/camisetas.fem/fem (10).png" alt="Produto 2"></a>
                  <h3>YHWH</h3>
                  <p>R$ 60,00</p>
                </div>

                <div class="produto">
                  <a href="./info-prod-fem/prod11.html"><img src="./img.roupas/camisetas.fem/fem (11).png" alt="Produto 1"></a>
                  <h3>Maranatha "Come lord Jesus"</h3>
                  <p>R$ 60,00</p>
              </div>

              <div class="produto">
                <a href="./info-prod-fem/prod12.html"><img src="./img.roupas/camisetas.fem/fem (12).png" alt="Produto 1"></a>
                  <h3>YHWH </h3>
                  <p>R$ 60,00</p>
              </div>

              <div class="produto">
                <a href="./info-prod-fem/prod9.html"><img src="./img.roupas/camisetas.fem/fem (9).png" alt="Produto 1"></a>
                <h3>Lucas 12:27</h3>
                <p>R$ 60,00</p>
              </div>
            </div>
<!--4 cards por linha-->

              <div class="lista-produtos">  
                <div class="produto">
                  <a href="./info-prod-masc/prod10.html"><img src="./img.roupas/camisetas.masc/masc (10).png" alt="Produto 1"></a>
                  <h3>Alfa e omega</h3>
                  <p>R$ 60,00</p>
                </div>

                <div class="produto">
                  <a href="./info-prod-masc/prod9.html"><img src="./img.roupas/camisetas.masc/masc (9).png" alt="Produto 1"></a>
                  <h3>JIREH</h3>
                  <p>R$ 60,00</p>
              </div>

              <div class="produto">
                <a href="./info-prod-masc/prod8.html"><img src="./img.roupas/camisetas.masc/masc (8).png" alt="Produto 1"></a>
                  <h3>Be the light</h3>
                  <p>R$ 60,00</p>
              </div>

              <div class="produto">
                <a href="./info-prod-masc/prod13.html"><img src="./img.roupas/camisetas.masc/masc (13).png" alt="Produto 1"></a>
                <h3>Fishers of men</h3>
                <p>R$ 60,00</p>
              </div>
            </div>
<!--4 cards por linha-->


            <div class="lista-produtos">  
              <div class="produto">
                <a href="./info-prod-kids/prod6.html"><img src="./img.roupas/camisetas.kids/6kids.png" alt="Produto 1"></a>
                <h3>Não temas</h3>
                <p>R$ 60,00</p>
              </div>

              <div class="produto">
                <a href="./info-prod-kids/prod8.html"><img src="./img.roupas/camisetas.kids/8kids.png" alt="Produto 1"></a>
                <h3>Jesus over everything</h3>
                <p>R$ 60,00</p>
            </div>

            <div class="produto">
              <a href="./info-prod-kids/prod9.html"><img src="./img.roupas/camisetas.kids/9kids.png" alt="Produto 1"></a>
                <h3>Lucas 10:27</h3>
                <p>R$ 60,00</p>
            </div>

            <div class="produto">
              <a href="./info-prod-kids/prod3.html"><img src="./img.roupas/camisetas.kids/3kids.png" alt="Produto 1"></a>
              <h3>All my worth is in the cross</h3>
              <p>R$ 60,00</p>
            </div>
          </div>
        </section>
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


    <script src="./js/slide.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>
