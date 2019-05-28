<?php
if(isset($_POST['authenticate'])){
    $_SESSION['pageStatus'] = "authenticate";
    header('Location: /mitfahren');
}
?>

<form method="post">
Erfolgreich registriert.<br>
<input type="submit" name="authenticate" value="zum Login">
</form>