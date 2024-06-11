<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zaily | Cadastro </title>
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer"/> <!-- Adicionar icon de modo claro / modo noite -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- <header class="header">
        <div class="header__content">
          <div class="header__logo-container">
            <span class="header__logo-sub">Zaily</span>
          </div>
          <div class="header__main">
            <ul class="header__links">
              <li class="header__link-wrapper">
                <a href="inde".phpindex.php class="header__link"> Inicio </a>
              </li>
              <li class="header__link-wrapper">
                <a href="rotas.php" class="header__link"> Rotas </a>
              </li>
              <li class="header__link-wrapper">
                <a href="oficinas.php" class="header__link">
                  Oficinas
                </a>
              </li>
              <li class="header__link-wrapper">
                <a href="login.php" class="header__link"> Entrar </a>
              </li>
            </ul>
            <div class="header__main-ham-menu-cont">
              <img
                src="./assets/img/svg/ham-menu.svg"
                alt="hamburger menu"
                class="header__main-ham-menu"
              />
            </div>
          </div>
        </div>
        <div class="header__sm-menu">
          <div class="header__sm-menu-content">
            <ul class="header__sm-menu-links">
              <li class="header__sm-menu-link">
                <a href="inde".phpindex.php> Inicio </a>
              </li>
  
              <li class="header__sm-menu-link">
                <a href="rotas.php"> Rotas </a>
              </li>
  
              <li class="header__sm-menu-link">
                <a href="oficinas.php"> Oficinas </a>
              </li>
  
              <li class="header__sm-menu-link">
                <a href="login.php"> Entrar </a>
              </li>
            </ul>
          </div>
        </div>
      </header> -->
      <section class="main-cadastro">
      <div class="box">
        <div class="img-box">
            <img src="assets/img/png/ImgTelaCadastro.png">
        </div>
        <div class="form-box">
            <h2><a href="cadastro.php" class="LinkTitleCadastro">Criar Conta</a></h2>
            <p class="PCadastro"> Já é um membro? Faça<a href="login.php" class="a-LinkCadastro"> Login </a> </p>
            <form action="#">
                <div class="input-group">
                    <label for="nome" class="LabelCadastro"> Nome Completo</label>
                    <input type="text" id="nome" placeholder="Digite o seu nome completo" required>
                </div>

                <div class="input-group">
                    <label for="email" class="LabelCadastro">E-mail</label>
                    <input type="email" id="email" placeholder="Digite o seu email" required>
                </div>

                <div class="input-group w50">
                  <label for="date" class="LabelCadastro">Data de nascimento</label>
                  <input type="date" id="dtNasc" placeholder="xx/xx/xxxx" required>
              </div>

              <div class="input-group w50">
                  <label for="genero" class="LabelCadastro">Gênero</label>
                  <select>
                    <option value="fem">Feminino</option>
                    <option value="mas">Masculino</option>
                    <option value="other">Outro</option>
                  </select>
              </div>

                <div class="input-group w50">
                    <label for="senha" class="LabelCadastro">Senha</label>
                    <input type="password" id="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="input-group w50">
                    <label for="Confirmarsenha" class="LabelCadastro">Confirmar Senha</label>
                    <input type="password" id="Confirmarsenha" placeholder="Confirme a senha" required>
                </div>

                <div class="input-group">
                    <button>Cadastrar</button>
                </div>
                <p class="PLinkInicio">Voltar para o <a href="index.php" class="a-LinkCadastro"> Inicio </a> </p>
            </form>
        </div>
     </div>
   </div>
  </section>
      <script src="assets/js/index.js"></script>
</body>