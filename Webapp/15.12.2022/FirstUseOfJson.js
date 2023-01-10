$(Start);

function start{
    //alert("I will call the SERVER to give me a JSON object !!");
    $.post("firstJson.php", {}, endOfCall, "json");
}

function endOfCall(data) {
    alert("I hve finished my AJAX request");
    console.log(data.Test);
}