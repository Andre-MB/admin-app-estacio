<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../css/padroes.css">
    <link rel="stylesheet" href="../css/formSteps.css">
    <title>form 3-5</title>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center bg-main-content">
        <div class="d-flex flex-column container-fluid justify-content-center align-items-center bg-user-form">
            <p id="current-step-user-counter"></p>
            <div class="justify-content-center d-flex" id="step-rect-user"></div>
            <div class="d-flex align-items-center parent-container-input-form">
                <div class="d-flex flex-column form-container">
                    <form id="formSteps">
                        <div class="upper_personal_data_user">
                            <section>
                                <p>Endereço: </p>
                                <input type="text" id="user_complete_name" placeholder="Rua X, Quadra Z, Casa W" required>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>