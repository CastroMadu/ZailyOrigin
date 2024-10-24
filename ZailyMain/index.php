<?php
include "layout/header/header.php";
session_start();


// Verifica se o usuário não está logado
if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']); // Remove a mensagem para que não apareça de novo
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CicloTrack | Inicio</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .aviso {
            background-color: #ffcc00;
            color: #333;
            padding: 10px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php
    // Exibe a mensagem de aviso se o usuário não estiver logado
    if (isset($mensagem)) {
        echo '<div class="aviso">' . $mensagem . '</div>';
    }
    ?>

    <!-- <div class="preloading" id="preloading">
        <div class="loading" id="loading"></div>
    </div> -->

    <section class="home-hero">
        <div class="home-hero__content"> 
            <h1 class="heading-primary">Treino, Foco, Superação</h1>
            <div class="home-hero__info">
                <p class="text-primary">
                    A tríade da conquista.
                </p>
            </div>
            <div class="home-hero__cta">
                <a href="./index.php#comunidade" class="btn btn--bg">conheça-nos</a>
            </div>
        </div>
    </section>

    <section class="telaGradeFt" id="comunidade">
        <div class="gradeInicio">
            <div class="gradeFoto">
                <img src="../ZailyMain/assets/img/png/bike01.png" alt="Foto 1">
                <div class="legenda">Legenda 1</div>
            </div>
            <div class="gradeFoto">
                <img src="../ZailyMain/assets/img/png/bike02.png" alt="Foto 2">
                <div class="legenda">Legenda 2</div>
            </div>
            <div class="gradeFoto">
                <img src="../ZailyMain/assets/img/png/bike03.png" alt="Foto 3">
                <div class="legenda">Legenda 3</div>
            </div>
            <div class="gradeFoto">
                <img src="../ZailyMain/assets/img/png/bike04.png" alt="Foto 4">
                <div class="legenda">Legenda 4</div>
            </div>
            <div class="gradeFoto">
                <img src="../ZailyMain/assets/img/png/bike05.png" alt="Foto 5">
                <div class="legenda">Legenda 6</div>
            </div>
        </div>
    </section>

    <script src="assets/js/index.js"></script>
    <?php
    include "layout/footer/footer.php";
    ?>
</body>

</html>