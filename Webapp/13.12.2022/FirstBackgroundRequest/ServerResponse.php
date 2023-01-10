<?php

/*THIS IS A SCRIPT THAT WILL ANSWER A QUESTION:

is there a user (provided in the GET ARRAY - at index "User") in our database that has the password (provided in the GET ARRAY - at index "PSW")????
*/

if (isset($_GET["User"], $_GET["Psw"])) {

    $host = "localhost";
    $user = "root";
    $connection = new mysqli($host, $user, "", "Users");
    $sqlSelect = $connection->prepare("SELECT * from Users where UserName=?");
    $sqlSelect->bind_param("s", $_GET["User"]);
    $sqlSelect->execute();
    $result = $sqlSelect->get_result();
    if ($result->num_rows == 0) {
        print("We are sorry but there is no user " . $_GET["User"] . "in our db");
    } else {
        $row = $result->fetch_assoc();
        if ($row["UserPassword"] == $_GET["Psw"]) {
            print("Well done, you have logged in !!");
        } else {
            print("The password is incorrect");
        }
    }
} else {
    print("Badly formed QUESTION !");
}
