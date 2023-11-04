function previewProfile(event) {
    console.log("Hello");
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

    const currentURL = window.location.pathname;
    
    let currentStep = parseInt(currentURL.match(/\d+/)[0]);
    var counter = 1;
    var counterRect = 1;
    var dataUser = {
        "formStep1": {
            "user_complete_name": "",
            "user_mail": "",
            "user_passw": "",
            "user_passw_confirm": "",
            "user_register": "",
            "user_date": "",
        }
    }

    while(counter <= 5) {
        if(currentStep === counter) {
            $("#current-step-user-counter").html(`${currentStep} de 5`);
            $("#step-rect-user").append(`<div class='rect-user rect-user-active' id="${counter}stepFormRect"></div>`);
        } else {
            $("#step-rect-user").append(`<div class='rect-user' id="${counter}stepFormRect"></div>`);
        }
        counter++;
    }

    // PREVIOUS BUTTON
    $("#previous_button_form_2").click(function(e) {
        e.preventDefault();
        $("#formStep2_item").css({opacity: 1}).animate({opacity: 0, marginLeft: "1em"}, 500, function() {
            $("#formStep2_item").removeClass("active");
            $("#formStep1_item").css({opacity: 1}).addClass("active");
            counter -= 1;
            counterRect -= 1;
            $("#current-step-user-counter").html(`${counterRect} de 5`);
            $(`#${counterRect + 1}stepFormRect`).removeClass('rect-user-active');
            $(`#${counterRect}stepFormRect`).addClass('rect-user-active');
        })
    })
    //FORMS 1 - 
    $("#formSteps").submit(function(e) {
        e.preventDefault();
        var currentBtnForm = $("#next_button").attr("name");
        switch(currentBtnForm) {
            case "btnForm1":
                var sucessfullForm_one_one = true;
                var errCode = "";
                // isChecked ver se tem erro em um campo e retorna com o código de erro!
                var isChecked = false;
                var passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;
                var numericPattern = /^[0-9]+$/;
                const inputIDS = ["user_complete_name", "user_mail", "user_passw", "user_passw_confirm", "user_register", "user_date"];

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
                                console.log("CONFIRM PASSW ERR + " + inputId)
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
                            console.log("AGE: " + age);
                            if(isNaN(birthday.getTime())) {
                                errCode = "invalid_date";
                            } else if(age < 18) {
                                errCode = "insufficient_age";
                            } else if(age >= 100) {
                                errCode = "crazy_age";
                            }
                            
                            console.log("birthday", birthday);
                            console.log("currentDate: ", currentDate);
                            break;
                        default:
                            errCode = "success";
                            break;   
                    }
                    
                }
                console.log(errCode);
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
                for(var counterShow = 0; counterShow < inputIDS.length; counterShow++) {
                    var inputIdShow = inputIDS[counterShow];
                    var inputValueShow = $('#' + inputIdShow).val();
                    dataUser.formStep1[inputIdShow] = inputValueShow;
                }
                
                if(sucessfullForm_one) {
                    $("#formStep1_item").css({opacity: 1}).animate({opacity: 0}, 500, function() {
                        $("#formStep1_item").removeClass("active");
                        $("#formStep2_item").css({opacity: 1}).addClass("active");
                        counterRect += 1;
                        $("#current-step-user-counter").html(`${counterRect} de 5`);
                        $(`#${counterRect - 1}stepFormRect`).removeClass('rect-user-active');
                        $(`#${counterRect}stepFormRect`).addClass('rect-user-active');
                    })
                    //window.location.href = "./dashboardUser.php";
                }
        }
    })
})
/*function showErr(text) {
    $("#errContent").html(text);
    $("#allFieldsErr").css({display: 'flex', opacity: 1, right: '5px', top: '1px'}).animate({
        opacity: 1,
        right: '30px',
    }, 1500, function() {
        $("#allFieldsErr").css('display', 'none');
    });
}*/