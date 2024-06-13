<?php
include "../include/MySql.php";

$nmUsuario = "";
$email= "";
$genero= "";
$senha= "";
$dtNasc= "";
$confSenha= "";

$nmUsuarioErro = "";
$emailErro= "";
$generoErro= "";
$senhaErro= "";
$dtNascErro="";
$confSenhaErro= "";
$msgErro="";


            if (empty($_POST['nmUsuario']))
                $nmUsuarioErro = "Nome é obrigatório!";  
            else 
                $nmUsuario = $_POST['nome'];
            
            if (empty($_POST['email']))    
                $emailErro = "Email é obrigatório!";
            else    
                $email = $_POST['email'];
            
            if (empty($_POST['genero']))
                $generoErro = "genero é obrigatório!";
            else    
                $genero = $_POST['genero'];
            
            if (empty($_POST['senha']))
                $senhaErro = "Senha é obrigatório!";
            else     
                $senha = $_POST['senha'];

            if (empty($_POST['dtNasc']))    
                $dtNascErro = "Data de nascimento é obrigatório!";
            else     
                $dtNasc = $_POST['dtNasc'];

            if (empty($_POST['confSenha']))    
                $confSenhaErro = "Confirmação de senha é obrigatório!";
            else     
                $confSenha = $_POST['confSenha'];

            if ($email && $nmUsuario && $senha && $genero && $dtNasc && $confSenha) {
                //Verificar se ja existe o email
                $sql = $pdo->prepare("SELECT * FROM USUARIO WHERE email = ?");
                if ($sql->execute(array($email))){
                    if ($sql->rowCount() <= 0){
                        $sql = $pdo->prepare("INSERT INTO USUARIO (nome, email, genero, senha, dtNasc, confSenha)
                                            VALUES ( ?, ?, ?, ?, ?, ?)");
                        if ($sql->execute(array($nmUsuario, $email, $genero, md5($senha), $dtNasc, $confSenha))){
                            $msgErro = "Dados cadastrados com sucesso!";
                            $nmUsuario = "";
                            $email= "";
                            $genero= "";
                            $senha= "";
                            $dtNasc= "";
                            $confSenha= "";
                            header('location:login.php');
                        } else {
                            $msgErro = "Dados não cadastrados!";
                        }  
                    } else {
                        $msgErro = "Email de usuário já cadastrado!!";
                    }    
                } else {
                    $msgErro = "Erro no comando SELECT!";
                }    
            } else {
                $msgErro = "Dados não cadastrados!";
            }
     
?>


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
<form method="POST" enctype="multipart/form-data">
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
                    <label for="nome" class="LabelCadastro" value="<?php echo $nmUsuario?>"> Nome Completo</label>
                    <input type="text" id="nome" placeholder="Digite o seu nome completo" required>
                    <span class="obrigatorio">*<?php echo $nmUsuarioErro?></span>
                </div>

                <div class="input-group">
                    <label for="email" class="LabelCadastro" value="<?php echo $email?>">E-mail</label>
                    <input type="email" id="email" placeholder="Digite o seu email" required>
                    <span class="obrigatorio">*<?php echo $emailErro?></span>
                </div>

                <div class="input-group w50">
                  <label for="date" class="LabelCadastro" value="<?php echo $dtNasc?>">Data de nascimento</label>
                  <input type="date" id="dtNasc" placeholder="xx/xx/xxxx" required>
                  <span class="obrigatorio">*<?php echo $dtNascErro?></span>
              </div>

              <div class="input-group w50">
                  <label for="genero" class="LabelCadastro" value="<?php echo $genero?>">Gênero</label>
                  <span class="obrigatorio">*<?php echo $generoErro?></span>
                  <select>
                    <option value="fem">Feminino</option>
                    <option value="mas">Masculino</option>
                    <option value="other">Outro</option>
                  </select>
              </div>

                <div class="input-group w50">
                    <label for="senha" class="LabelCadastro" value="<?php echo $senha?>">Senha</label>
                    <input type="password" id="senha" placeholder="Digite sua senha" required>
                    <span class="obrigatorio">*<?php echo $senhaErro?></span>
                </div>

                <div class="input-group w50">
                    <label for="Confirmarsenha" class="LabelCadastro" value="<?php echo $confSenha?>">Confirmar Senha</label>
                    <input type="password" id="Confirmarsenha" placeholder="Confirme a senha" required>
                    <span class="obrigatorio">*<?php echo $confSenhaErro?></span>
                </div>

                <div class="input-group">
                  <button><a href="rotas.php">Cadastrar</a></button>
                </div>
                <p class="PLinkInicio">Voltar para o <a href="index.php" class="a-LinkCadastro"> Inicio </a> </p>
            </form>
        </div>
     </div>
   </div>
   <span><?php echo $msgErro?></span>
  </section>
      <script src="assets/js/index.js"></script>
</body>

