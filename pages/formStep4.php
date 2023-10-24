<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Vagas</title>
     <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!---->
    <!--Jquery-->
    <script
		src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
		integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
		crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/padroes.css">
    <link rel="stylesheet" href="../css/formSteps.css">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center bg-main-content">
        <div class="d-flex flex-column container-fluid justify-content-center align-items-center bg-user-form">
            <p id="current-step-user-counter"></p>
            <div class="justify-content-center d-flex" id="step-rect-user"></div>
            <div class="d-flex align-items-center parent-container-input-form">
                <div class="d-flex flex-column form-container">
                    <form id="formSteps">
                        <section class="aboutUser">
                            <p>Conta-me mais sobre você:</p>
                            <textarea id="user_description" class="container-fluid" placeholder="Lorem Ipsum Latem"></textarea>
                        </section>
                        <section class="d-flex justify-content-start flex-column roleUserSelect">
                            <p>Você é o que atualmente?</p>
                            <div class="d-flex align-items-center justify-content-center container btnRadioUserSelect">
                                <div class="d-flex flex-row radioButtonWidth">
                                    <input type="radio" name="options" id="student_radio" value="student"/>
                                    <label for="student_radio">Estudante</label>
                                    <input type="radio" name="options" id="trainee_radio" value="trainee"/>
                                    <label for="trainee_radio">Estagiário</label>
                                    <input type="radio" name="options" id="others_radio" value="others"/>
                                    <label for="others_radio" class="d-flex align-items-center justify-content-center container-fluid">
                                        Outros:
                                        <input type="text" id="others_btn_input_user" class="container-fluid"/>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="next_button" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm4">Próximo</button>
                        </div>             
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/register.js"></script>
</body>
