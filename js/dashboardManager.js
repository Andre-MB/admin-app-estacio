var currentOption = 0;

const contentArr = [
    "#homeOption-content", 
    "#infoOption-content",
    "#searchOption-content",
    "#profileOption-content"
];

const optionsArr = ["#homeOption", "#infoOption", "#searchOption", "#profileOption"];

function changeOpt(id, index) {
    $(optionsArr[currentOption]).removeClass('opt-selected');
    $(`#${id}`).toggleClass('opt-selected');
    $(`${optionsArr[currentOption]}-content`).removeClass('show-content');
    $(`#${id}-content`).addClass('show-content');
    currentOption = index;
}

$(document).ready(function() {
    optionsArr.forEach(function(opt, index) {
        console.log(opt)
        $(opt).click(function(event) {
            if(event.target.id === "") {
                changeOpt(event.currentTarget.id, index);
            } else {
                changeOpt(event.target.id, index);
            }
        })
    })
})

//Buttons Manager

//Add Manager Button
$("#addManagerBtn").click(function() {
    $("#popUps").css({'display': 'flex'})
    $("#popOverlay").css({'display': 'flex'})
})

$("#closeBtnAddManager").click(function() {
    $("#popUps").css({'display': 'none'})
    $("#popOverlay").css({'display': 'none'})
})