<?php
/************************************************************************/
include 'dbConnection.php';
/************************************************************************/

$userName = "";
$password = "";
$passwordRep = "";

createUser();

if(isset($_POST['authenticate'])){
    $_SESSION['pageStatus'] = "authenticate";
    header('Location: /mitfahren');
}
?>

<form method="post">
    Benutzername<br>
    <input type="text" name="userName" size="40" placeholder="Benutzername oder E-Mail-Addresse eingeben"><br>
    Kennwort<br>
    <input type="password" name="password" size="40"><br>
    Kennwort wiederholen<br>
    <input type="password" name="passwordRep" size="40"><br>
    <input type="submit" name="createUser" value="Erstellen"><br>
    <br>
    <hr>
    Zurück zum Login:<br>
    <input type="submit" name="authenticate" value="Einloggen">
</form>

<?php



function verifyRegistration($user, $pw, $pw2){
    if($user == ""){
        $_SESSION['userOK'] = false;
    }else{
        $_SESSION['userOK'] = true;
    }

    if($pw != $pw2){
        array_push($_SESSION['error'], "Kennwörter müssen übereinstimmen");
        $_SESSION['pwOK'] = false;
    }else{
        $_SESSION['pwOK'] = true;
    }

    if($_SESSION['userOK'] == true && $_SESSION['pwOK'] == true){

        //create user
        $pw = password_hash($pw, PASSWORD_DEFAULT);

/************************************************************************/
        $statement = $pdo->prepare("INSERT INTO user (userName, passw) VALUES (:user, :pw)");
/************************************************************************/

        $result = $statement->execute(array('userName' => $user, 'passw' => $pw));
        $_SESSION['pageStatus'] = "regSuccess";
        header('Location: /mitfahren');
    }
}

function createUser(){
    if(isset($_POST['createUser'])){
        $userName = $_POST['userName'];
        $password = $_POST['password'];
        $passwordRep = $_POST['passwordRep'];
    
        if(!empty($userName) && !empty($password) && !empty($passwordRep) ){
            verifyRegistration($userName, $password, $passwordRep);
        }else{
            array_push($_SESSION['error'], "Bitte alle Felder ausfüllen");
        }
    }
}
?>