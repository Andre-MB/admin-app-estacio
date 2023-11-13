<?php
include('../php/connection.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GV: Utilizador</title>
    <link rel="stylesheet" href="../../css/dashboard.css"/>
    <script
		src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
		integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
		crossorigin="anonymous">
    </script>
     <!-- Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!---->
</head>
<body>
    <div class="root">
        <div class="panel-left">
            <div class="profile-user">
                <img src="../../images/profileIcon.png" alt="Perfil do Usuário">
                <p>[Nome do Usuário]</p>
            </div>
            <div class="options-user">
                <div class="home-opt opt-selected opt-panel" id="homeOption">
                    <img src="../../images/iconHome.png" alt="">
                    <p>Inicio</p>
                </div>
                <div class="info-opt opt-panel" id="infoOption">
                    <img src="../../images/aboutIcon.png" alt="">
                    <p>Informações</p>
                </div>
                <div class="profile-opt opt-panel" id="profileOption">
                    <img src="../../images/profileIcon.png" alt="">
                    <p>Perfil</p>
                </div>
            </div>
        </div>
        <div class="content-right" id="contentRight">
            <div id="homeOption-content" class="content-data">
                <div class="main-content">
                    <img src="../../images/groupWorkers.png" alt="">
                    <h3>Seja bem-vindo</h3>
                    <h1>[Nome de usuário]</h1>
                    <div class="info-data">
                        <p>Quando o teu chefe gosta do esforço você já está <span>contratado!</span></p>
                    </div>
                </div>
            </div>
            <div id="infoOption-content" class="content-data">
                <div class="d-flex flex-column w-100 align-items-center justify-content-center border-bottom border-secondary">
                    <h1 class="text-uppercase">Informações</h1>                    
                </div>
                <div class="opt-user-info-data d-flex align-items-center justify-content-between w-100" style="height: 2em;">
                        <div id="mainOpt_data" class="active-opt user-select-none d-flex align-items-center justify-content-center w-100 h-100 text-uppercase border-bottom border-secondary">
                            <p class="mb-0">Principal</p>
                        </div>
                        <div id="expOpt_data" class="d-flex user-select-none align-items-center justify-content-center w-100 h-100 text-uppercase border-bottom border-secondary">
                            <p class="mb-0">Experiências</p>
                        </div>
                        <div id="skillOpt_data" class="d-flex user-select-none align-items-center justify-content-center w-100 h-100 text-uppercase border-bottom border-secondary">
                            <p class="mb-0">Habilidades</p>
                        </div>
                        <div id="educationOpt_data" class="d-flex user-select-none align-items-center justify-content-center w-100 h-100 text-uppercase border-bottom border-secondary">
                            <p class="mb-0">Escolaridade</p>
                        </div>
                </div>
                <div class="data-user data-user-active flex-column h-100 w-100" id="mainOpt_data-content">
                    <form id="alterMainData">
                        <div class="d-flex flex-column w-100 p-4">
                            <label for="user_complete_name_edit">Nome completo:</label>
                            <input type="text" id="user_complete_name_edit" placeholder="Raimundo Coelho"/>
                            <label for="user_email_edit">E-mail:</label>
                            <input type="text" id="user_email_edit" placeholder="raimundo@gmail.com"/>
                            <div class="d-flex justify-content-between w-100">
                                <div class="d-flex h-100 flex-column" style="width: 45%">
                                    <label for="user_register_edit">Matricula:</label>
                                    <input type="text" id="user_register_edit" placeholder="202202915672"/>
                                    <label for="user_date_edit">Matricula:</label>
                                    <input type="date" id="user_date_edit"/>
                                </div>
                                <div class="d-flex h-100 flex-column" style="width: 45%">
                                    <label for="user_email_edit">Período:</label>
                                    <input type="text" id="user_email_edit" placeholder="raimundo@gmail.com"/>
                                    <label for="user_phone_edit">Celular:</label>
                                    <input type="text" id="user_phone_edit" placeholder="202202915672"/>
                                </div>
                            </div>
                        </div>
                        <div class="button-alter-main-data d-flex align-items-center justify-content-end container-fluid">
                            <button id="alter_button_main" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnAlterForm_1">Alterar</button>
                        </div>  
                    </form>
                </div>
                <div class="data-user h-100 w-100" id="expOpt_data-content">TestExp</div>
                <div class="data-user h-100 w-100" id="skillOpt_data-content">TestSkill</div>
                <div class="data-user h-100 w-100" id="educationOpt_data-content">testEducation</div>
            </div>
            <div id="profileOption-content" class="content-data show-content" style="margin: 0 1em; padding: 0.5em;">
                <div class="banner-profile rounded d-flex h-25 w-100 container align-items-end justify-content-start">
                    <img src="../../images/pplProfile.jpg" class="rounded-circle" alt="Profile">
                </div>
                <div class="d-flex w-100 container align-items-center justify-content-start">
                    <h1>[Nome de Usuário]</h1>
                </div>
                <div class="d-flex w-100 container align-items-center justify-content-start">
                    <p>[Habilidades]</p>
                </div>
                <div class="d-flex w-100 container align-items-center justify-content-start">
                    <p>[Matricula]</p>
                </div>
                <div class="d-flex w-100 container align-items-center justify-content-start">
                    <p>[PERÍODO] Período</p>
                </div>
                <div class="d-flex mb-2 w-100 container align-items-end justify-content-start">
                    <button class="profile-buttons" style="margin-right: 1em">CONTATAR</button>
                    <button class="profile-buttons">CURRÍCULO</button>
                </div>
                <div class="d-flex mt-2 h-25 w-100 container align-items-start justify-content-start">
                    <p>[Sobre]</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/dashboardUser.js"></script>
</body>
</html>