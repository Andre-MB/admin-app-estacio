var currentOption = 0;

const contentArr = ["#home-content", "#info-content", "#profile-content"];
const optionsArr = ["#homeOption", "#infoOption", "#profileOption"];

for(const option of optionsArr) {
    $(option).click(function() {
        $(".content-data").hide();
        $(".opt-panel").removeClass("opt-selected");
        currentOption = optionsArr.indexOf(option);
        $(optionsArr[currentOption]).addClass("opt-selected")
        $(contentArr[currentOption]).show();
    })
}