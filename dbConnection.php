<?php
function getConnection(){
    return new PDO('mysql:host=localhost;dbname=m183', 'root', '');
}

?>