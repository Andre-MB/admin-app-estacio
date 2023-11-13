var currentOption = 0;
var currentOptData = 0;

const contentArr = [
    "#homeOption-content", 
    "#infoOption-content", 
    "#profileOption-content"
];

const optionsArr = ["#homeOption", "#infoOption", "#profileOption"];
const optData = [
    "#mainOpt_data", "#expOpt_data", 
    "#skillOpt_data", "#educationOpt_data"
];

function changeOpt(id, index) {
    $(optionsArr[currentOption]).removeClass('opt-selected');
    $(`#${id}`).toggleClass('opt-selected');

    if(index === 2) {
        $("#contentRight").css({
            'background-color': '#c2c2c2',
            'padding': '0.5em'
        });
        $("#profileOption-content").css({
            'display': 'flex',
            'flex-direction': 'column',
            'justify-content': 'start',
            'align-items': 'center',
            'border-radius': '0.5em',
            'border': '1px solid #000',
            'height': '100%',
        })
    } else {
        $("#contentRight").css({'background-color': 'white'});
        $("#profileOption-content").css({'display': 'none'})
    }

    $(`${optionsArr[currentOption]}-content`).removeClass('show-content');
    $(`#${id}-content`).addClass('show-content');
    currentOption = index;
}

function changeOptData(id, index) {
    $(optData[currentOptData]).removeClass('active-opt');
    $(`#${id}`).toggleClass('active-opt');
    $(`${optData[currentOptData]}-content`).removeClass('data-user-active');
    $(`#${id}-content`).addClass('data-user-active');
    console.log(id);
    currentOptData = index;
}

$(document).ready(function() {
    optionsArr.forEach(function(opt, index) {
        $(opt).click(function(event) {
            if(event.target.id === "") {
                changeOpt(event.currentTarget.id, index);
            } else {
                changeOpt(event.target.id, index);
            }
        })
    })

    optData.forEach(function(opt, index) {
        $(opt).click(function(event) {
            if(event.target.id === "") {
                changeOptData(event.currentTarget.id, index);
            } else {
                changeOptData(event.target.id, index);
            }
        })
    })
})