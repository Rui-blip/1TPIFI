<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="ChooseCountry.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>
<select id="CountrySelect">
    <option id="Choose" value="0">Please select a country</option>
    <?php
    $host = "localhost";
    $user = "root";

    $connection = new mysqli($host, $user, "", "countriesandcities");
    $sqlSelect = $connection->prepare("SELECT * from countries");
    $sqlSelect->execute();
    $result = $sqlSelect->get_result();
    while ($row = $result->fetch_assoc()) {
    ?>
        <option value="<?= $row["CountryID"] ?>"><?= $row["CountryName"] ?></option>
    <?php
    }
    ?>

</select>
<div id="resultingCities"></div>

</html>