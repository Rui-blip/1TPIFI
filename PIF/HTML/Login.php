<?php
include_once("CommonCode.php");
//include_once("Navbar.php");

if (isset($_POST["firstnameSignup"], $_POST["surnameSignup"], $_POST["user_emailSignup"], $_POST["passwordSignup"], $_POST["passwordRepeatSignup"])) {
    $sqlStatement = $connection->prepare("SELECT * FROM Users WHERE user_email=?");
    $sqlStatement->bind_param("s", $_POST["user_emailSignup"]);
    $sqlStatement->execute();
    $result = $sqlStatement->get_result();
    $userExist = $result->num_rows;

    if ($userExist == 0) {

        if ($_POST["passwordSignup"] === $_POST["passwordRepeatSignup"]) {

            $hashedPSW = password_hash($_POST["passwordSignup"], PASSWORD_DEFAULT);
            $sqlInsert = $connection->prepare("INSERT INTO Users (firstname, surname, user_email, password, RFIDBadge_id) VALUES(?,?,?,?,?)");
            $sqlInsert->bind_param("sssss", $_POST["firstnameSignup"], $_POST["surnameSignup"], $_POST["user_emailSignup"], $hashedPSW);
            $sqlInsert->execute();


            $_SESSION["Name"] = $_POST["firstnameSignup"] . " " . $_POST["surnameSignup"];
            $_SESSION["UserLogged"] = true;

            header("Location: Home.php");
            die();
        } else {
            print "<script>alert('Password doesn't match');</script>";
            header("Refresh:0");
            die();
        }
    } else {
        print "<script>alert('User already exists');</script>";
        header("Refresh:0");
        die();
    }
}


if (isset($_POST["user_emailSignin"], $_POST["passwordSignin"])) {
    $sqlStatement = $connection->prepare("SELECT * FROM Users WHERE user_email=?");
    $sqlStatement->bind_param("s", $_POST["user_emailSignin"]);
    $sqlStatement->execute();
    $result = $sqlStatement->get_result();
    $userExist = $result->num_rows;

    if ($userExist == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($_POST["passwordSignin"], $row["PSW"])) {
            $_SESSION["Name"] = $row["firstname"] . " " . $row["surname"];
            $_SESSION["UserLogged"] = true;

            header("Location: Home.php");
            die();
        } else {
            print "<script>alert('Password does not match');</script>";
            header("Refresh:0");
            die();
        }
    } else {
        print "<script>alert('User does not exist');</script>";
        header("Refresh:0");
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href="../CSS/Style.css?t<?= time(); ?>">
    <link rel="stylesheet" href="../CSS/bootstrap-5.2.3-dist/css/bootstrap.min.css">
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
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="Login.php" method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <img src="../Images/Datacorp.png" class="logo" width="25%" height="25%">
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form2Example17" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">First Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form2Example17" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">Last Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form2Example17" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">Email address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="number" id="form2Example17" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example17">Badge Number</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example27" class="form-control form-control-lg" />
                                        <label class="form-label" for="form2Example27">Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                                    </div>

                                    <a class="small text-muted" href="#!">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>