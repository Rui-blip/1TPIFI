$(start);
let arr = ["a", "b", "c", "d"];
//create a html select list with the options out of this array:
function start() {
    let mySelect = $("<select>");
    for (i = 0; i < arr.length; i++) {
        let myNewOption = $("<option>");
        myNewOption.html(arr[i]);
        myNewOption.attr("id", arr[i]);
        myNewOption.val(arr[i]);
        mySelect.append(myNewOption);
    }

    let myDelete = $("<button>");
    myDelete.html("Delete");

    let outputDiv = $("<div>");

    myDelete.on("click", function () {
        let myCurrentVal = mySelect.val();
        let myOptionSelected = $("#" + myCurrentVal);
        let myNewPTag = $("<p>");
        myNewPTag.html(myOptionSelected.html());
        myOptionSelected.remove();
        outputDiv.append(myNewPTag);
    });


    $("body").append(mySelect);
    $("body").append(myDelete);
    $("body").append(outputDiv);
}