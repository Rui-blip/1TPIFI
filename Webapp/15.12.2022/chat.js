$(start); // call this function when the document loads

function start() {
    // BEFORE starting - we need to check IF the user IS ALREADY LOGGED IN !!!
    $.post("apiChat.php", { isUserLoggedIn: true }, checkIfUserIsLoggedIn);
}

function checkIfUserIsLoggedIn(data) {
    if (data != "") {
        loginNow(data);
    } else {
        $("body").html(""); // MAKE SURE that the body of the page is EMPTY
        let myUserNameInput = $("<input>"); // create an input
        myUserNameInput.attr("id", "userName"); // give it an id
        let myLoginButton = $("<button>"); // create a button
        myLoginButton.html("Login"); // set its text
        $("body").append(myUserNameInput); // add the input to the html
        $("body").append(myLoginButton); // add the button to the html
        myLoginButton.on("click", startChat); // when the button is clicked call the startChat function
    }
}

function startChat() {
    let myUserName = $("#userName").val(); // read the user name from the user
    //alert(myUserName + " will try to login");
    // ALTERNATIVE: $.ajax()
    $.post("apiChat.php", { UserName: myUserName }, loginNow); // FIRST POST request -> send it to the server
}

function loginNow(UserName) {
    //alert(UserName);
    let userNameDiv = $("<div>");
    userNameDiv.html(UserName);
    $("body").append(userNameDiv);
    //alert("We are done creating your user in the database");
    let myMessageHistory = $("<div>"); // create a div -> all messages will be stored here
    myMessageHistory.attr("id", "msgHist"); // give it an id
    $("body").append(myMessageHistory); //add the div to html

    $("#userName").remove(); // remove the login input username
    $("button").remove(); // remove the login buton
    let myMessage = $("<textarea>"); // create a textarea (larger input) to allow the user to type a new message
    myMessage.attr("id", "messageToSend"); // give it an id
    $("body").append(myMessage); // add the textarea to the html
    let mySendButton = $("<button>"); // create a new button to SEND messages
    mySendButton.html("Send"); //put its text

    mySendButton.on("click", function () {
        //alert(myMessage.val());
        $.post("apiChat.php", { newMessage: myMessage.val() }, function () { });
    });

    $("body").append(mySendButton); // add the button to html

    // create a new button to LOGOUT
    let logoutBtn = $("<button>");
    logoutBtn.html("Logout");

    logoutBtn.on("click", function () {
        $.post("apiChat.php", { logout: true }, start);
    });

    $("body").append(logoutBtn);

    /*

    BCS of the CLIENT/SERVER model - we do not know when we (as a client) RECEIVED a new message.
    For this, we need to run a function in a continuous LOOP that will ASK if there are new messages
    
    */
    setInterval(function () {
        $.post("apiChat.php", { getMessages: true }, newMessagesArrived);
    }, 1000);
}

function newMessagesArrived(data) {
    let outMessages = $("<div>");
    outMessages.html(data);
    $("#msgHist").append(outMessages);
}
