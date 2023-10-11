<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Vagas</title>
    <link rel="stylesheet" href="./css/login.css">
     <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!---->
    <link rel="stylesheet" href="../css/padroes.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center bg-main-content">
        <div class="d-flex flex-column container-fluid justify-content-center align-items-center bg-user-form">
            <p id="current-step-user-counter"></p>
            <div class="justify-content-center d-flex" id="step-rect-user"></div>
            <div class="d-flex align-items-center parent-container-input-form">
                <div class="d-flex flex-column form-container">
                    <form action="post">
                        <div class="upper_personal_data_user">
                            <section id="user_name">
                                <p>Nome Completo: </p>
                                <input type="text" name="" id="" placeholder="Raimundo">
                            </section>
                            <section id="user_passw">
                                <p>Senha: </p>
                                <input type="text" name="" id="" placeholder="*******">
                            </section>
                            <div class="container grid">
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const currentStepUpper = document.getElementById("current-step-user-counter");
        const rect = document.getElementById("step-rect-user");
        let currentStep = 1;
        let counter = 1;
        while(counter <= 5) {
            if(currentStep === counter) {
                currentStepUpper.innerHTML = `${currentStep} de 5`
                rect.innerHTML += "<div class='rect-user rect-user-active'></div>";
            } else {
                rect.innerHTML += "<div class='rect-user'></div>";
            }
            counter++;
        }
    </script>
</body>
