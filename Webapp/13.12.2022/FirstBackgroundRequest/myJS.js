$(start);

function start() {
    $("#Login").on("click", loginNow);
}

function loginNow() {
    $.ajax(
        {
            url: "http://localhost/github/1TPIFI/Webapp/13.12.2022/FirstBackgroundRequest/ServerResponse.php",
            data: { User: $("#UserName").val(), Psw: $("#Password").val },
            success: successCALL,
        }
    );
}

$.get(
    "http://localhost/github/1TPIFI/Webapp/13.12.2022/FirstBackgroundRequest/ServerResponse.php",
    { User: $("#UserName").val(), PSW: $("#Password").val },
    successCALL
);


function successCALL(dataBack) {
    $("#AnswerFromServer").html(dataBack);
}