$(start);

function start() {
    //I need to fill in the countries select list
    $.get("getCountries.php", doneLoadingData)
    //$("CountrySelect").load("getCountries.php")

    $("#CountrySelect").on("change", selectWasChanged);
}


function doneLoadingData(dataThatWasLoaded) {
    //alert(data);
    $("#CountrySelect").append(dataThatWasLoaded);
}


/*
// Unnamed function version:
function start() {
    $("#CountrySelect").on("change", function() {
    $("#Choose").remove();
});
}
*/

function selectWasChanged() {
    $("#Choose").remove();

    let myCurrentCountrySelect = $("#CountrySelect").val();


    /*let myResultingCities = $("#resultingCities");
    myResultingCities.load("getCities.php?Country=" + myCurrentCountrySelect);
*/
    //INSTAD OF LOAD WE CAN USE $.get

    $.get("getCities.php", { Country: myCurrentCountrySelect }, doneLoadingCities);
    $("body").append(myResultingCities);
}

function doneLoadingCities(citiesData) {
    let myCurrentCountrySelect = $("#resultingCities");
    $("resultingCities").html(citiesData);
}


//$("p").html(); GET (Read)
//$("p").html(""); SET (You will insert something inside the P) Write
//.val (value of an input or select) (we can change things inside an input)