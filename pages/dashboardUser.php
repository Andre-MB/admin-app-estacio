<?php
include('../php/connection.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do usuário</title>
    <link rel="stylesheet" href="../css/dashboardUser.css"/>
    <link rel="stylesheet" href="../css/padroes.css"/>
    <script
		src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
		integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
		crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="root">
        <div class="panel-left">
            <div class="profile-user">
                <img src="../images/profileIcon.png" alt="Perfil do Usuário">
                <p>[Nome do Usuário]</p>
            </div>
            <div class="options-user">
                <div class="home-opt opt-selected opt-panel" id="homeOption">
                    <img src="../images/iconHome.png" alt="">
                    <p>Inicio</p>
                </div>
                <div class="info-opt opt-panel" id="infoOption">
                    <img src="../images/aboutIcon.png" alt="">
                    <p>Informações</p>
                </div>
                <div class="profile-opt opt-panel" id="profileOption">
                    <img src="../images/profileIcon.png" alt="">
                    <p>Perfil</p>
                </div>
            </div>
        </div>
        <div class="content-right">
            <div id="home-content" class="content-data">
                <div class="main-content">
                    <img src="../images/groupWorkers.png" alt="">
                    <h3>Seja bem-vindo</h3>
                    <h1>[Nome de usuário]</h1>
                    <div class="info-data">
                        <p>Quando o teu chefe gosta do esforço você já está <span>contratado!</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/dashboardUser.js"></script>
</body>
</html>