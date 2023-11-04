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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formSteps.css">
</head>
<body>
    <div class="err-notific flex-column justify-content-center align-items-center" id="allFieldsErr">
        <div class="title-notific-err d-flex align-items-center justify-content-center">
            <h3>Erro</h3>
        </div>
        <div class="err-content-notific d-flex align-items-center justify-content-center">
            <p id="errContent"></p>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center bg-main-content">
        <div class="d-flex flex-column container-fluid justify-content-center align-items-center bg-user-form">
            <p id="current-step-user-counter"></p>
            <div class="justify-content-center d-flex" id="step-rect-user"></div>
            <div class="d-flex align-items-center parent-container-input-form">
                <div class="flex-column form-container active" id="formStep1_item">
                    <form id="formSteps">
                        <div class="upper_personal_data_user">
                            <section>
                                <p>Nome Completo: </p>
                                <input type="text" id="user_complete_name" placeholder="Raimundo">
                            </section>
                            <section>
                                <p>E-mail: </p>
                                <input type="email" id="user_mail" placeholder="example@gmail.com">
                            </section>
                                <div class= "contain2">
                                    <div>                                    
                                        <section>
                                            <label for="passw"> Senha: </label>
                                            <div class="input-box-passw">
                                                <input type="password" id="user_passw" placeholder="*******">
                                                <svg xmlns='http://www.w3.org/2000/svg' id="seePassw" width='32' height='32' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'></path>
                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'></path>
                                            </svg>
                                            </div> 
                                        </section>
                                        <section class="senhas">                                        
                                            <label class="margin-fix" for="passw_confirm">Confimar senha:</label>
                                            <div class="input-box-passw">
                                                <input type="password" id="user_passw_confirm" placeholder="*******">
                                                <svg xmlns='http://www.w3.org/2000/svg' id="seePasswConfirm" width='32' height='32' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'></path>
                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'></path>
                  </svg>                    </div>

                                        </section>
                                    </div>
                                    <div>
                                    <section>
                                            <p>Matrícula: </p>
                                            <input type="text" id="user_register" placeholder="Matrícula" maxlength="12">
                                    </section>
                                    <section>
                                            <p>Data de nascimento: </p>
                                            <input type="date" id="user_date">
                                    </section>
                                    </div>           
                                </div>                          
                        </div>
                        <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="next_button" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm1">Próximo</button>
                        </div>             
                    </form>
                </div>
                <div class="flex-column form-container justify-content-between" id="formStep2_item">
                    <form id="formStep_2">
                        <div class="container d-flex align-items-center justify-content-between h-100">
                            <div class="d-flex container justify-content-center align-items-center h-100" style="width: 30%; height: 100%;">
                                <img src="../images/defaultProfile.png" id="profilePreview" style="width: 300px; height: 300px;" alt="defaultProfile">
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column">
                                <h3>Qual é o seu período</h3>
                                <select name="period" id="" class="w-100 text-center">
                                    <option value="" disabled>Periodo</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                </select>
                                <div class="d-flex mt-5 border border-dark w-100 justify-content-center align-items-center user-select-none" style="height: 2em; cursor: pointer;">
                                    <label for="chooseProfileImg" class="w-100 text-center" style="cursor: pointer;">Foto de Perfil</label>
                                    <input type="file" id="chooseProfileImg" style="display: none;" onchange="previewProfile(event)">
                                </div>
                            </div>
                        </div>           
                    </form>
                    <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="previous_button_form_2" class="d-flex align-items-center justify-content-center next_button_in" type="submit">Anterior</button>
                            <button id="next_button" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm1">Próximo</button>
                    </div>  
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/register.js"></script>
</body>
