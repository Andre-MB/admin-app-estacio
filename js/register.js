function previewProfile(event) {
    $("#profilePreview").attr("src", URL.createObjectURL(event.target.files[0]));
    $("#profilePreview").css({'border-radius': '10em'});
}

function showErr(text) {
    $("#errContent").html(text);
    $("#allFieldsErr").css({display: 'flex', opacity: 1, right: '5px', top: '1px'}).animate({
        opacity: 1,
        right: '30px',
    }, 1500, function() {
        $("#allFieldsErr").css('display', 'none');
    });
}

function insertDataJson(inputID, JSONData, formStepKey, postPHPURL, postToSession) {
    for(var insertCounter = 0; insertCounter < inputID.length; insertCounter++) {
        var inputIdShow = inputID[insertCounter];
        var inputValueShow = $('#' + inputIdShow).val();
        JSONData[formStepKey][inputIdShow] = inputValueShow;
        $('#' + inputIdShow).attr("value", inputValueShow);
    }

    var postData = {
        'stepForm': formStepKey,
        'JSONData': JSONData[formStepKey],
    }
    
    var jsonStr = JSON.stringify(postData);

    if(postToSession) {
        $.ajax({
            method: "POST",
            url: '../php/cache/inputForm.php',
            contentType: 'application/json',
            data: { JSONData: jsonStr },
            success: function(response) {

            },
            error: function(err) {
                console.error(err);
            }
        })
    } else {
        $.ajax({
            method: "POST",
            url: postPHPURL,
            contentType: 'application/json',
            dataType: 'json',
            data: {
                JSONData: jsonStr
            },
            success: function(response) {
                console.log(response);
            },
            error: function(err) {
                console.error(err);
            }
        })
    }
}

function isEmpty(idContainer) {
    if($("#" + idContainer).val() === "") {
        errCode = "empty" + idContainer;
        return {errCode: errCode, success: true};
    }
    return {success: false};
}

$(document).ready(function() {
    var isReveal = false;
    var isRevealConfirm = false;

    function revealPassw(idPassw) {
        if(!isReveal) {
            $(idPassw).attr("type", "text");
            return true;
        } else {
            $(idPassw).attr("type", "password");
            return false;
        }
    }

    const hoverButtonCSS = {
        "mouseIn": {
            "color": "#000",
            "font-weight": "bolder"
        },
    }
    //[EVENTOUTFORM] EVENTS INPUTS AND CLICK OUTSIDE FORM SUBMIT
    $("#seePassw").click(function () {
        isReveal = revealPassw("#user_passw");
    })

    $("#seePasswConfirm").click(function () {
        isReveal = revealPassw("#user_passw_confirm");
    })

    $("#user_register").on("input", function(e) {
        var target = e.target;
        var input = target.value.replace(/\D/g, '').substring(0, 12);
        var output = input.replace(/(\d{4})(\d{8})/, '$1 $2'); 

        target.value = output;
    })
    //END [EVENTOUTFORM]
    $("#next_button").hover(function() {
        console.log("hover");
        $(this).removeClass("next_button_out");
        $(this).addClass("next_button_in")
    }, function() {
        $(this).removeClass("next_button_in");
        $(this).addClass("next_button_out");
    })
    
    const totalRect = 4;
    var currentStep = 1;
    var counter = 1;

    // GENERATE RECT FORM DINAMICALLY
    while(counter <= totalRect) {
        if(currentStep === counter) {
            $("#current-step-user-counter").html(`${currentStep} de ${totalRect}`);
            $("#step-rect-user").append(`<div class='rect-user rect-user-active' id="${counter}stepFormRect"></div>`);
        } else {
            $("#step-rect-user").append(`<div class='rect-user' id="${counter}stepFormRect"></div>`);
        }
        counter++;
    }

    //RECT CHANGE FORM
    function changeRectForm(currentStepRect, isNext) {
        if(isNext === true) {
            $("#current-step-user-counter").html(`${currentStepRect + 1} de ${totalRect}`);
            $(`#${currentStepRect}stepFormRect`).removeClass('rect-user-active');
            $(`#${currentStepRect + 1}stepFormRect`).addClass('rect-user-active');
        } else {
            $("#current-step-user-counter").html(`${currentStepRect - 1} de ${totalRect}`);
            $(`#${currentStepRect}stepFormRect`).removeClass('rect-user-active');
            $(`#${currentStepRect - 1}stepFormRect`).addClass('rect-user-active');
        }
    }

    // PREVIOUS BUTTON
    const btnPrevious = ["previous_button_form_1", "previous_button_form_2", "previous_button_form_3", "previous_button_form_4"];

    btnPrevious.forEach((btnPrevious) => {
        $(`#${btnPrevious}`).click(function() {
            const currentNumberBtn = parseInt(btnPrevious.split("_")[3]);
            changeRectForm(currentNumberBtn, false);
            $(`#formStep${currentNumberBtn}_item`).css({opacity: 1}).animate({opacity: 0}, 200, function() {
                $(`#formStep${currentNumberBtn}_item`).removeClass("active");
                $(`#formStep${currentNumberBtn - 1}_item`).css({opacity: 1}).addClass("active");
            })
        })
    })

    // NEXT BUTTON
    function nextForm(currentBtnStep) {
        $(`#formStep${currentBtnStep}_item`).css({opacity: 1}).animate({opacity: 0}, 200, function() {
            $(`#formStep${currentBtnStep}_item`).removeClass("active");
            $(`#formStep${currentBtnStep + 1}_item`).css({opacity: 1}).addClass("active");
        })
    }

    var dataUser = {
        "formStep1": {
            "user_complete_name": "",
            "user_mail": "",
            "user_passw": "",
            "user_passw_confirm": "",
            "user_register": "",
            "user_date": "",
        },
        "formStep2": {
            "user_period": "",
            "photo_url": "",
        },
        "formStep4": {
            "user_about": "",
            "user_role": "",
        }
    }

    const formSteps = ["formStep_1", "formStep_2", "formStep_3", "formStep_4"];
    
    function restoreFluxForm() {
        const startForm = 1;
        let userCookieImage = $.cookie("user_image");

        if(userCookieImage) {
            $(`#${startForm}stepFormRect`).removeClass('rect-user-active');
            $(`#formStep${startForm}_item`).removeClass("active");
            changeRectForm(2, true);
            nextForm(2);
        }
    }
    
    restoreFluxForm();

    formSteps.forEach((formStepId) => {
        switch(formStepId) {
            case "formStep_1":
                const inputIDS = ["user_complete_name", "user_mail", "user_passw", "user_passw_confirm", "user_register", "user_date"];
                const inputCache = ["user_complete_name", "user_mail", "user_register", "user_date"]

                const cookieObject = $.cookie("userForm1");

                if(cookieObject) {
                    const formObject = JSON.parse(cookieObject);
                
                    for(var counterCookie = 0; counterCookie <= inputCache.length; counterCookie++) {
                        $(`#${inputCache[counterCookie]}`).attr('value', formObject[inputCache[counterCookie]]);
                    }
                }

                $(`#formStep_1`).submit(function(e) {
                    e.preventDefault();
                    var sucessfullForm_one_one = true;
                    var errCode = "";
                    // isChecked ver se tem erro em um campo e retorna com o código de erro!
                    var isChecked = false;
                    var passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;
                    var numericPattern = /^[0-9]+$/;

                    const currentDate = new Date();

                    for(var counterId = 0; counterId < inputIDS.length; counterId++) {
                        var inputId = inputIDS[counterId];
                        var inputValue = $("#" + inputId).val();

                        if(isChecked) {
                            break;
                        }

                        switch(inputId) {
                            case "user_complete_name":
                                errCode = isEmpty(inputId).errCode;
                                isChecked = isEmpty(inputId).success;
                                break;
                            case 'user_mail':
                                errCode = isEmpty(inputId).errCode;
                                isChecked = isEmpty(inputId).success;
                                break;
                            case "user_passw":
                                if($("#user_passw").val() === "") {
                                    errCode = isEmpty(inputId).errCode;
                                    isChecked = isEmpty(inputId).success;      
                                } else if($("#user_passw_confirm").val() === ""){
                                    errCode = 'emptyuser_passw_confirm';
                                    isChecked = isEmpty(inputId + "_confirm").success;
                                } else if($("#user_passw").val() !== $("#user_passw_confirm").val()) {
                                    errCode = "empty" + inputId + "_confirm_isNotEqual";
                                    isChecked = true;
                                } else if(!passwordPattern.test($("#user_passw").val())) {
                                    errCode = "invalid_" + inputId;
                                    isChecked = true;
                                }
                                break;
                            case "user_register":
                                if($("#user_register").val() === "") {
                                    
                                    errCode = isEmpty(inputId).errCode;
                                    isChecked = isEmpty(inputId).success;
                                }
                                break;
                            case "user_date":
                                var birthday = new Date($("#user_date").val());
                                var age = currentDate.getFullYear() - birthday.getFullYear();

                                if(isNaN(birthday.getTime())) {
                                    errCode = "invalid_date";
                                } else if(age < 18) {
                                    errCode = "insufficient_age";
                                } else if(age >= 100) {
                                    errCode = "crazy_age";
                                }
                                
                                break;
                            default:
                                errCode = "success";
                                break;   
                        }  
                    }

                    switch(errCode) {
                        case 'crazy_age':
                            showErr("Aham sei, fica fazendo graça vai centenário!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "insufficient_age":
                            showErr("Você não tem idade para usar isso menino! Mínimo 18 anos");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "invalid_date":
                            showErr("Data inválida!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "emptyuser_complete_name":
                            showErr("Usuário vázio!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "emptyuser_mail":
                            showErr("E-mail vázio!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "emptyuser_passw":
                            showErr("Senhas vázias!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "emptyuser_passw_confirm":
                            showErr("O campo de confirmar senha está vázio!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "emptyuser_passw_confirm_isNotEqual":
                            showErr("As senhas não são iguais!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "invalid_user_passw":
                            showErr("A senha deve conter números, digitos especiais, maiúsculas, minúsculas e mais de 8 digitos!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "emptyuser_register":
                            showErr("Insira a matricula!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "allEmptyFields":
                            showErr("Precisa preencher todos os campos!");
                            sucessfullForm_one = false;
                            isChecked = false;
                            break;
                        case "success":
                            sucessfullForm_one = true;
                            break;
                    }
                    
                    if(sucessfullForm_one) {
                        const inputValid = ["user_complete_name", "user_mail", "user_passw", "user_register", "user_date"];

                        insertDataJson(inputValid, dataUser, 'formStep1', '../php/cache/inputForm.php', true);
                        changeRectForm(1, true);
                        nextForm(1);
                    }
                })
            break;
            case "formStep_2":
                var userCookieImage = $.cookie("user_image");

                if(userCookieImage) {
                    $("#profilePreview").attr("src", userCookieImage);
                } else {
                    $("#profilePreview").attr("src", "../images/defaultProfile.png");
                }

                $(`#formStep_2`).submit(function(e) {
                    e.preventDefault();
                    const currentSubmitter = e.originalEvent.submitter.id;
                    
                    if(currentSubmitter === "previous_button_form_2") {
                        changeRectForm(2, false);
                    } else {
                        var formData = new FormData(this);

                        $.ajax({
                            type: "POST",
                            url: "../php/upload.php",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {                  
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });

                        changeRectForm(2, true);
                        nextForm(2); 
                    };
                })
            break;
            case "formStep_3":
                $(`#formStep_3`).submit(function(e) {
                    e.preventDefault();
                    const currentSubmitter = e.originalEvent.submitter.id;
                    if(currentSubmitter === "previous_button_form_3") {
                        changeRectForm(3, false);
                    } else {
                        var isSuccessForm =  false;
                        var isError = false;
                        var errCode = "";

                        const inputIDS = ["user_period, chooseProfileImg"];
                        const inputIDValid = ["user_period"];

                        for(var counterId = 0; counterId < inputIDS.length; counterId++) {
                            var inputId = inputIDS[counterId];
                            var inputValue = $("#" + inputId).val();

                            if(isError) {
                                break;
                            }

                            switch(inputId) {
                                case "user_period":
                                    if($("#user_period").val() === "Periodo") {
                                        errCode = "nouser_perioded"
                                        isError = true;
                                    } else isError = false; 
                                break;
                                default:
                                    errCode = "success";
                                break;   
                            }
                        }

                        switch(errCode) {
                            case "user_period":
                                showErr("Você não selecionou um periodo válido!");
                                isSuccessForm = false;
                                isError = false;
                                break;
                            case "success":
                                isSuccessForm = true;
                                break;
                        }
                        if(isSuccessForm) {
                            insertDataJson(inputIDValid, dataUser, "formStep3", null, true)
                            changeRectForm(3, true);
                            nextForm(3);
                        }
                    }
                })
            break;
            case "formStep_4":
                $(`#formStep_4`).submit(function(e) {
                    e.preventDefault();
                    const currentSubmitter = e.originalEvent.submitter.id;
                    if(currentSubmitter === "previous_button_form_4") {
                        changeRectForm(4, false);
                    } else {
                        changeRectForm(4, true);
                        nextForm(4);
                    }
                })
            break;
        }
    })
})