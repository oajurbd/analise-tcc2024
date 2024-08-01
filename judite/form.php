
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
     <a href="./index.html"><img src="./logojudite.png" alt=""></a>
    </div>
    </header>
        <nav>
          <h1>Bem vindo!! Faça seu login. Não tem conta? Cadastre-se!</h1>
      </nav>

      <!--formulario de cadastro-->

<div class="formulario"> 

  <fieldset class="grupo1">
    <h2>Login</h2>     
  <form action="testelogin.php" method="POST">
      <label for="email">Email</label>
      <input type="email"id="email"name="email"required placeholder=" seu email">
      <br>
    
      <label for="senha">Senha</label>
      <input type="password"id="senha" name="senha"placeholder=" sua senha ">
      <br> 

      <input  class="inputSubmit" type="submit" name="submit" value="Entrar">      

  </form>
  
</fieldset> 
 <hr class="break">  
<fieldset class="grupo">
      <h2>Cadastro</h2>     
    <form action="form.php" method="POST">
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

        <button type="submit" id="submit">Fazer cadastro</button>

    </form>
</fieldset> 


</div> 

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