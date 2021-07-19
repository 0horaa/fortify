<?php
    if(isset($_REQUEST["change"])){
        unset($_SESSION["academyEmail"]);
        unset($_SESSION["academyPassword"]);
        header("Location: ../login_academy.php?reply=change");    
    }
?>