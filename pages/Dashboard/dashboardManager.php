<?php
include('../php/connection.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GV: Painel do usuário</title>
    <link rel="stylesheet" href="../../css/dashboard.css"/>
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
                <img src="../../images/profileIcon.png" alt="Perfil do Usuário">
                <p>[Nome do Gestor]</p>
            </div>
            <div class="options-user">
                <div class="home-opt opt-selected opt-panel" id="homeOption">
                    <img src="../../images/iconHome.png" alt="">
                    <p>Inicio</p>
                </div>
                <div class="info-opt opt-panel" id="infoOption">
                    <img src="../../images/managerIcon.png" alt="">
                    <p>Gestores</p>
                </div>
                <div class="info-opt opt-panel" id="searchOption">
                    <img src="../../images/search-iconOpt.png" alt="">
                    <p>Pesquisar</p>
                </div>
                <div class="profile-opt opt-panel" id="profileOption">
                    <img src="../../images/profileIcon.png" alt="">
                    <p>Perfil</p>
                </div>
            </div>
        </div>
        <div class="content-right">
            <div id="popUps">
                <div class="pop-up-add-manager" id="popUpAddManager">
                    <div class="input-data-popup-add-manager">
                        <div class="input-form-add-manager">
                            <div class="input-form-field-1">
                                <label for="nameUserUpdateM">Nome Do Gestor:</label>
                                <input type="text" name="nameUserUpdateM" placeholder="Nonato"/>
                            </div>
                            <div class="input-form-field-2">
                                <label for="nameUserUpdateM">Senha:</label>
                                <input type="password" name="nameUserUpdateM" placeholder="*********"/>
                            </div>
                            <div class="input-form-field-3">
                                <label for="nameUserUpdateM">E-mail:</label>
                                <input type="email" name="nameUserUpdateM" placeholder="nonatocoelho@gmail.com"/>
                            </div>
                        </div>
                        <div class="input-profile-form"></div>
                    </div>
                    <div class="add-manager-popup-btn">
                        <button class="close-btn" id="closeBtnAddManager">FECHAR</button>
                        <button class="finish-btn" id="finishBtnAddManager">FINALIZAR</button>
                    </div>
                </div>
            </div>
            <div id="popOverlay"></div>
            <div id="homeOption-content" class="content-data">
                <div class="main-content">
                    <img src="../../images/groupWorkers.png" alt="">
                    <h3>Seja bem-vindo</h3>
                    <h1>[Nome do Gestor]</h1>
                    <div class="info-data">
                        <p>Grandes responsabilidades vem também grandes empregados!</p>
                    </div>
                </div>
            </div>
            <div id="infoOption-content" class="content-data">
                <div class="show-manager">
                    <div id="1_profileManager" class="manager-show-data">
                        <div class="profileIcon">
                            <img src="https://preview.redd.it/prompt-smiling-boy-with-white-and-black-hair-wearing-v0-5olc6gh7vo9a1.png?auto=webp&s=89ac36bb0c71f4d5f0f3ce9e4090861e0f440128" alt="">
                        </div>
                        <div class="infoData">
                            <h3>Naldo Ferreira</h3>
                            <p>Formado na faculdade de Nerd</p>
                            <p>20 anos de idade</p>
                            <p>Lema: Seja como um nerd, sem vida!</p>
                        </div>
                        <div class="manager-actions-btn">
                            <button id="updateManagerBtn">ATUALIZAR</button>
                            <button id="removeManagerBtn">REMOVER</button>
                        </div>
                    </div>
                    <div class="add-manager-container">
                        <img src="../../images/addIconBtn.png" alt="" id="addManagerBtn">
                    </div>
                </div>    
            </div>
            <div id="searchOption-content" class="content-data show-content">
                <div class="search-bar">
                    <div class="input-search-bar">
                        <img src="../../images/search-icon.png" alt="searchIcon">
                        <input type="text" placeholder="Pesquisar">
                    </div>
                    <div class="filter-button">
                        <button>
                            <img src="../../images/settingsIcon.png" alt="icon">
                            Filtros
                        </button>
                    </div>
                </div>
                <div class="current-total-users">
                    <div class="user-container-search" id="userPage_1">1</div>
                    <div class="user-container-search" id="userPage_2">1</div>
                    <div class="user-container-search" id="userPage_3">1</div>
                    <div class="user-container-search" id="userPage_4">1</div>
                    <div class="user-container-search" id="userPage_5">1</div>
                    <div class="user-container-search" id="userPage_6">1</div>
                    <div class="user-container-search" id="userPage_7">1</div>
                    <div class="user-container-search" id="userPage_8">1</div>
                    <div class="user-container-search" id="userPage_9">1</div>
                </div>
                <div class="number-pages" id="numberPageRows">
                    <p id="numberPage1">1</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/dashboardManager.js"></script>
</body>
</html>