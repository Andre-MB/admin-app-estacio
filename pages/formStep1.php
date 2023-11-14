<?php
include("../php/db/connection.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if(!isset($_SESSION['isSubmit'])) {
    $currentStatus = 'none';
    $_SESSION['isSubmit'] = $currentStatus;
}

if (!isset($_SESSION['tokenUser'])) {
    $token = uniqid();
    $_SESSION['tokenUser'] = $token;
} else {
    $token = $_SESSION['tokenUser'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GV: Registro</title>
     <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!---->
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
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
            <div class="d-flex align-items-center parent-container-input-form ">
                <div class="flex-column form-container active" id="formStep1_item">
                    <form id="formStep_1">
                        <div class="upper_personal_data_user">
                            <section>
                                <p>Nome Completo: </p>
                                <input type="text" id="user_complete_name" value="" placeholder="Raimundo">
                            </section>
                            <section>
                                <p>E-mail: </p>
                                <input type="email" id="user_mail" value="" placeholder="example@gmail.com">
                            </section>
                                <div class= "contain2">
                                    <div>                                    
                                        <section>
                                            <label for="passw"> Senha: </label>
                                            <div class="input-box-passw">
                                                <input type="password" id="user_passw" value="" placeholder="*******">
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
                                            <input type="text" id="user_register" placeholder="Matrícula" value="" maxlength="12">
                                    </section>
                                    <section>
                                            <p>Data de nascimento: </p>
                                            <input type="date" id="user_date" value="">
                                    </section>
                                    </div>           
                                </div>                          
                        </div>
                        <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="next_button_1" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm_1" value="invalid">Próximo</button>
                        </div>             
                    </form>
                </div>
                <div class="flex-column form-container justify-content-between" id="formStep2_item">
                    <form id="formStep_2" method="POST" enctype="multipart/form-data">
                        <div class="container d-flex align-items-center justify-content-between h-100">
                            <div class="d-flex container justify-content-center align-items-center h-100" style="width: 30%; height: 100%;">                           
                                <img src='../images/defaultProfile.png' id='profilePreview' style='width: 300px; height: 300px;' alt='defaultProfile'>
                            </div>
                            <div class="d-flex justify-content-center align-items-start flex-column">
                                <h3>Qual é o seu período</h3>
                                <select name="period" id="user_period" class="w-100 text-center">
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
                                    <input accept="image/png image/webp, image/jpeg, image/jpg" type="file" id="chooseProfileImg" name="imageUser" style="display: none;" onchange="previewProfile(event)">
                                </div>
                            </div>
                        </div> 
                        <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="previous_button_form_2" class="d-flex align-items-center justify-content-center next_button_in">Anterior</button>
                            <button id="next_button_2" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm_2">Próximo</button>
                        </div>           
                    </form>
                     
                </div>
                <div class="flex-column form-container justify-content-between" id="formStep3_item">
                    <form id="formStep_3">
                         <div class="flex-column container w-100">
                            <label for="user_address_complement">Complemento:</label>
                            <input type="text" id="user_address_complement" placeholder="Ao lado da praça">
                         </div>
                         <div class="d-flex w-100 justify-space-between">
                            <div class="flex-column container w-100">
                                <label for="user_address_cep">CEP:</label>
                                <input type="text" id="user_address_cep" placeholder="62420-480"/>
                                <label for="user_address_number">Número:</label>
                                <input type="text" id="user_address_number" placeholder="89"/>
                            </div>
                            <div class="flex-column container w-100">
                                <label for="user_address_town">Cidade:</label>
                                <input type="text" id="user_address_town" placeholder="São Luis"/>
                                <label for="user_address_state">Estado:</label>
                                <input type="text" id="user_address_state" placeholder="Maranhão"/>
                            </div>
                         </div>
                         <div class="flex-column container w-100">
                            <label for="user_address_district">Bairro:</label>
                                <input type="text" id="user_address_district" placeholder="Turu"/>
                         </div>
                        <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="previous_button_form_3" class="d-flex align-items-center justify-content-center next_button_in" type="submit">Anterior</button>
                            <button id="next_button_3" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm_3">Próximo</button>
                        </div>       
                    </form>
                    
                </div>
                <div class="flex-column form-container justify-content-between" id="formStep4_item">
                    <form id="formStep_4">
                        <div class="d-flex flex-column w-100 h-100 container">
                            <label for="user_description">Conta-me mais sobre você</label>
                            <textarea id="user_description" class="p-3 h-75" placeholder="Sou ... e gosto de..."></textarea>
                        </div>
                        <div class="d-flex flex-column w-100 h-50 container">
                            <label for="">Você é o que atualmente?</label>
                            <div class="d-flex align-items-center w-100 h-50 container">
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="radio" value="trainee" name="current_function" checked/>
                                    <label for="trainee">Estagiário</label>
                                 </div>
                                 <div>
                                    <input type="radio" value="employeer" name="current_function"/>
                                    <label for="employeer">Empregado</label>
                                </div>
                                <div>
                                    <input type="radio" value="student" name="current_function"/>
                                    <label for="student">Estudante</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end container-fluid">
                            <button id="previous_button_form_4" class="d-flex align-items-center justify-content-center next_button_in" type="submit">Anterior</button>
                            <button id="next_button_4" class="d-flex align-items-center justify-content-center next_button_in" type="submit" name="btnForm_3">Próximo</button>
                        </div>  
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        var isSubmit = "<?php echo $_SESSION['isSubmit']; ?>";
    </script>
    <script src="../js/register.js"></script>
</body>
