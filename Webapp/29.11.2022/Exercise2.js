$(start);

function start() {
    let mySelect = $("<select>");
    let arrayOfOptions = ["Choose Animal", "Cat", "Dog", "Frog"];
    for (let i = 0; i < arrayOfOptions.lenght; i++) {
        let myNewOption = $("<option>");
        myNewOption.attr("id", "OptionNo" + i);
        myNewOption.html(arrayOfOptions[i]);
        myNewOption.val[arrayOfOptions[i]];
        mySelect.append(myNewOption);
    }

    let imgTag = $("<img>");
    $("body").append(mySelect);
    $("body").append(imgTag);
    mySelect.on("change", function () {
        $("#OptionNo0").remove();
        imgTag.attr("src", mySelect.val() + jpg);
    });
}