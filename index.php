<?php

session_start();

$error;
initializeError();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mitfahrgelegenheit</title>
    <link rel="stylesheet" type="text/css" href="src/normalize.css">
    <link rel="stylesheet" type="text/css" href="src/style.css">
</head>
<body></body>

<?php
switchPage();
showErrors();
?>

</body>
</html>

<?php

function switchPage(){
    if (!isset($_SESSION['pageStatus'])){
        $_SESSION['pageStatus'] = "authenticate";
    }

    switch ($_SESSION['pageStatus']) {

        case "authenticate":
        include 'login.php';
        break;

        case "register":
        include 'register.php';
        break;

        case "regSuccess":
        include 'regSuccess.php';
        break;
    }
}

function initializeError(){
    if(!isset($_SESSION['error'])){
        $_SESSION['error'] = [];
    }else{
        $error = $_SESSION['error'];
    }
}

function showErrors(){
    if(!empty($_SESSION['error'])){
        foreach($_SESSION['error'] as $value){
            echo $value;
            echo '<br>';
        }
        $_SESSION['error'] = [];
    }
}
?>