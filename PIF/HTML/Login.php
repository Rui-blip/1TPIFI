<?php
//include_once("CommonCode.php");
//include_once("Navbar.php");

// if (isset($_POST["firstnameSignup"], $_POST["surnameSignup"], $_POST["user_emailSignup"], $_POST["passwordSignup"], $_POST["passwordRepeatSignup"])) {
//     $sqlStatement = $connection->prepare("SELECT * FROM Users WHERE user_email=?");
//     $sqlStatement->bind_param("s", $_POST["user_emailSignup"]);
//     $sqlStatement->execute();
//     $result = $sqlStatement->get_result();
//     $userExist = $result->num_rows;

//     if ($userExist == 0) {

//         if ($_POST["passwordSignup"] === $_POST["passwordRepeatSignup"]) {

//             $hashedPSW = password_hash($_POST["passwordSignup"], PASSWORD_DEFAULT);
//             $sqlInsert = $connection->prepare("INSERT INTO Users (firstname, surname, user_email, password, RFIDBadge_id) VALUES(?,?,?,?,?)");
//             $sqlInsert->bind_param("sssss", $_POST["firstnameSignup"], $_POST["surnameSignup"], $_POST["user_emailSignup"], $hashedPSW);
//             $sqlInsert->execute();


//             $_SESSION["Name"] = $_POST["firstnameSignup"] . " " . $_POST["surnameSignup"];
//             $_SESSION["UserLogged"] = true;

//             header("Location: Home.php");
//             die();
//         } else {
//             print "<script>alert('Password doesn't match');</script>";
//             header("Refresh:0");
//             die();
//         }
//     } else {
//         print "<script>alert('User already exists');</script>";
//         header("Refresh:0");
//         die();
//     }
// }


// if (isset($_POST["user_emailSignin"], $_POST["passwordSignin"])) {
//     $sqlStatement = $connection->prepare("SELECT * FROM Users WHERE user_email=?");
//     $sqlStatement->bind_param("s", $_POST["user_emailSignin"]);
//     $sqlStatement->execute();
//     $result = $sqlStatement->get_result();
//     $userExist = $result->num_rows;

//     if ($userExist == 1) {
//         $row = $result->fetch_assoc();

//         if (password_verify($_POST["passwordSignin"], $row["PSW"])) {
//             $_SESSION["Name"] = $row["firstname"] . " " . $row["surname"];
//             $_SESSION["UserLogged"] = true;

//             header("Location: Home.php");
//             die();
//         } else {
//             print "<script>alert('Password does not match');</script>";
//             header("Refresh:0");
//             die();
//         }
//     } else {
//         print "<script>alert('User does not exist');</script>";
//         header("Refresh:0");
//         die();
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <script src="../CSS/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function switchform(form) {
            if (form == "SignUp") {
                document.getElementById("signin").setAttribute("hidden", "hidden");
                document.getElementById("signup").removeAttribute("hidden");
            } else {
                document.getElementById("signup").setAttribute("hidden", "hidden");
                document.getElementById("signin").removeAttribute("hidden");
            }
        }
    </script>
    <title>Document</title>
</head>

<body>
    <!-- <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-primary"></div>
                    <div class="card bg-white shadow-lg">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase ">Brand</h2>
                                <p class=" mb-5">Please enter your login and password!</p>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="*******">
                                </div>
                                <p class="small"><a class="text-primary" href="forget-password.html">Forgot password?</a></p>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">Login</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0  text-center">Don't have an account? <a href="signup.html" class="text-primary fw-bold">Sign
                                        Up</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->



    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-primary"></div>
                    <div class="card bg-white shadow-lg">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
                                <div class="mb-3">
                                    <label for="text" class="form-label ">First Name</label>
                                    <input type="text" class="form-control" id="FirstName" placeholder="First Name">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label ">Last Name</label>
                                    <input type="text" class="form-control" id="LastName" placeholder="Last Name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="*******">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Repeat Password</label>
                                    <input type="password" class="form-control" id="RepeatPassword" placeholder="*******">
                                </div>
                                <div class="mb-3">
                                    <label for="select" class="form-label ">Badge Number</label>
                                    <select type="select" class="form-control" id="BadgeNum">
                                        <option value="" disabled selected>Select your Badge Number</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>

                                </div>
                                <p class="small"><a class="text-primary" href="forget-password.html">Forgot password?</a></p>
                                <div class="d-grid">
                                    <button class="btn btn-outline-dark" type="submit">Login</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0  text-center">Don't have an account? <a href="signup.html" class="text-primary fw-bold">Sign
                                        Up</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>