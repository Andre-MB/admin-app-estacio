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
                        <div class="upper_personal_data_user">
                            <section>
                                <p>Nome Completo: </p>
                                <input type="text" id="user_complete_name" placeholder="Raimundo" required>
                            </section>
                            <section>
                                <p>E-mail: </p>
                                <input type="email" id="user_mail" placeholder="example@gmail.com" required>
                            </section>
                                <div class= "contain2">
                                    <div>                                    
                                        <section>
                                            <p>Senha: </p>
                                            <input type="password" id="user_passw" placeholder="*******" required>
                                        </section>
                                        <section class="senhas">                                        
                                            <p>Confimar senha:</p>
                                            <input type="password" id="user_passw_confirm" placeholder="*******" required>
                                        </section>
                                    </div>
                                    <div>
                                    <section>
                                            <p>Matrícula: </p>
                                            <input type="text" id="user_register" placeholder="Matrícula" required>
                                    </section>
                                    <section>
                                            <p>Data de nascimento: </p>
                                            <input type="date" id="user_date" required>
                                    </section>
                                    </div>           
                                </div>                          
                        </div>
                        <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="next_button" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm1">Finalizar</button>
                        </div>             
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/register.js"></script>
</body>
