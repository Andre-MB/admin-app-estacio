$(document).ready(function() {
    let currentStep = 1;
    let counter = 1;
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
            $("#step-rect-user").append("<div class='rect-user rect-user-active'></div>");
        } else {
            $("#step-rect-user").append("<div class='rect-user'></div>");
        }
        counter++;
    }

    $("#formSteps").submit(function(e) {
        e.preventDefault();
        var currentBtnForm = $("#next_button").attr("name");
        switch(currentBtnForm) {
            case "btnForm1":
                const inputIDS = ["user_complete_name", "user_mail", "user_passw", "user_passw_confirm", "user_register", "user_date"];

                var isAllFields = true;
      
                for(var counterId = 0; counterId < inputIDS.length; counterId++) {
                    var inputId = inputIDS[counterId];
                    var inputValue = $("#" + inputId).val();
                    if(inputValue === '') {
                        isAllFields = false;
                        break;
                    }
                }

                if(!isAllFields) {
                    alert("Preencha todos os campos!");
                } else {
                    if($("#user_passw").val() != $("#user_passw_confirm").val()) {
                        alert("SENHAS NÃO COINCIDEM!");
                    } else {
                        for(var counterShow = 0; counterShow < inputIDS.length; counterShow++) {
                            var inputIdShow = inputIDS[counterShow];
                            var inputValueShow = $('#' + inputIdShow).val();
                            dataUser.formStep1[inputIdShow] = inputValueShow;
                        }
                        isAllFields = false;
                    }
                }
                console.log(dataUser);
                break;
        }
    })
})