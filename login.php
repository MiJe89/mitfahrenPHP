<?php
if(isset($_POST['register'])){
    $_SESSION['pageStatus'] = "register";
    header('Location: /mitfahren');
}
?>

<form method="post">
    Benutzername<br>
    <input type="text" name="userName" size="40" placeholder="Benutzername oder E-Mail-Addresse eingeben"
    value="<?php getUserName();?>"><br>
    
    Kennwort<br>
    <input type="password" name="password" size="40"><br>
    <br>
    <input type="submit" name="login" value="Login"><br>
    <hr>
    Benutzerkonto erstellen:<br>
    <input type="submit" name="register" value="Registrieren">
</form>

<?php
function getUserName(){
    if(isset($_POST['userName'])){
        echo $_POST['userName'];
    }
}
?>