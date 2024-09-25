 <?php
  include "layout/header/header.php"
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Zaily | Entrar </title>
   <link rel="stylesheet" href="assets/css/style.css">
 </head>

 <body>
   <form action="./src/login.php" method="post">
     <div class="main-login">
       <div class="left-login">
         <h1>Faça login<br>E entre para o nosso time!</h1>
       </div>
       <div class="right-login">
         <div class="card-login">
           <h1 class="titleFormLogin">Login</h1>
           <div class="textfield">
             <input type="email" name="email" placeholder="Usuário">
           </div>
           <div class="textfield">
             <input type="password" name="confsenha" placeholder="Senha">
           </div>
           <a href="cadastro.php" class="LinkCadastroLogin">Não é membro? Cadastre-se</a>
           <button class="btn-login">
             <a href="index.php" class="TextButtonLogin">Enviar</a>
           </button>

         </div>
       </div>
     </div>
   </form>

   <script src="assets/js/index.js"></script>
 </body>
