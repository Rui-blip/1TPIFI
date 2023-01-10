$(Start);

function Start() {
    let myButton = $("<button>");
    myButton.html("Add images");
    let myInput = $("<input>");
    myInput.attr("type", "number");

    let mySelect = $("<select>");
    let optionCat = $("<option>");
    let optionDog = $("<option>");
    optionCat.val("Cat.jpg");
    optionDog.val("Dog.jpg");
    optionCat.html("Cat");
    optionDog.html("Dog");
    mySelect.append(optionCat);
    mySelect.append(optionDog);
    let myButtonClicks = 0;

    myButton.on("click", function () {
        myButtonClicks++;
        if (myButtonClicks == 3) {
            myButton.remove();
            myInput.remove();
            mySelect.remove();
        }
        let numImages = myInput.val();
        for (let i = 0; i < numImages; i++) {
            let newImage = $("<img>");
            newImage.attr("src", mySelect.val());
            $("body").append(newImage);
            let clicksOnImage = 0;
            newImage.on("click", function () {
                clicksOnImage++;
                if (newImage.attr("src") == "Dog.jpg") {
                    newImage.attr("src", "Cat.jpg");
                } else {
                    newImage.attr("src", "Dog.jpg");
                }
                if (clicksOnImage == 2) {
                    newImage.remove();
                }
            });
        }
    });

    $("body").append(myButton);
    $("body").append(myInput);
    $("body").append(mySelect);
}