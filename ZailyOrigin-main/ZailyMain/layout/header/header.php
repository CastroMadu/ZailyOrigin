<?php
session_start()
?>
<header class="header">
  <div class="header__content">
    <div class="header__logo-container">
      <!-- <div class="header__logo-img-cont">
              <img
                src="./assets/png/maduImgPortfolio.jpg"
                alt="Madu Logo Image"
                class="header__logo-img"
              />
            </div> -->
      <span class="header__logo-sub">Zaily</span>
    </div>
    <div class="header__main">
      <ul class="header__links">
        <li class="header__link-wrapper">
          <a href="index.php" class="header__link"> Inicio </a>
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
          <a href="./ZailyMain/cadastro.php" id="minhaContaBtn" class="header__link">Minha conta</a>
        </li>
      </ul>
      <div class="header__main-ham-menu-cont">
        <img
          src="./assets/img/svg/ham-menu.svg"
          alt="hamburger menu"
          class="header__main-ham-menu" />
        <!-- <img
                src="./assets/img/svg/ham-menu-close.svg"
                alt="hamburger menu close"
                class="header__main-ham-menu-close d-none"
              /> -->
      </div>
    </div>
  </div>
  <div class="header__sm-menu">
    <div class="header__sm-menu-content">
      <ul class="header__sm-menu-links">
        <li class="header__sm-menu-link">
          <a href="index.php"> Inicio </a>
        </li>

        <li class="header__sm-menu-link">
          <a href="rotas.php"> Rotas </a>
        </li>

        <li class="header__sm-menu-link">
          <a href="oficinas.php"> Oficinas </a>
        </li>

        <li class="header__sm-menu-link">
        <?php
                if (isset($_SESSION['nmUsuario'])) {
                    echo '<a href="#"> Olá, ' . htmlspecialchars($_SESSION['nmUsuario']) . '</a>';
                } else {
                    echo '<a href="usuarioLog.php"> Olá, visitante </a>';
                }
                ?>
        </li>
      </ul>
    </div>
  </div>
  <div id="sidebar" class="sidebar">
    <a href="#" class="closebtn" id="closeSidebar">&times;</a>
    <a href="login.php">Fazer login</a>
    <a href="cadastro.php">Cadastre-se</a>
    <a href="#" id="sairBtn">Sair</a>
  </div>
</header>

<script src="../../assets/js/index.js"></script>