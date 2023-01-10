$(start);

function start() {
    let myInput = $("<input>");
    $("body").append(myInput);

    for (let i = 1; i <= 10; i++) {
        let myNewButton = $("<button>");
        myNewButton.html(i);
        $("body").append(myNewButton);
        myNewButton.click(function () {
            // I know the i number of the clicked button!!
            myInput.val(i);
        });
    }
}

