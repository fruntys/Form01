<?php
require_once 'Form.php';
$err = "";

if (isset($_POST["send"])){
    $form = new Form($_POST["firstName"], $_POST["secondName"], $_POST["age"]);
    $form->setError();

    if ($form->validateFirstName() && $form->validateSecondName() && $form->validateAge()){
        echo $form->getValues();
    }
    else {
        echo $form->getError();
    }
} else {
?>

<!DOCTYPE html>
<html>
<head>
    <title>František Trenz</title>
</head>
<body>
<form method="post" action="index.php">
    Jméno: <br> <input type="text" name="firstName">
    <br><br>
    Příjmení: <br> <input type="text" name="secondName">
    <br><br>
    Věk: <br> <input type="text" name="age">
    <br><br>
    <input type="submit" name="send" value="Pokracovat">
</form>
</body>
</html>
<?php
}
?>