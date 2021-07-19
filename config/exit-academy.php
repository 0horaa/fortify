<?php
    if(isset($_REQUEST["exit"])){
        unset($_SESSION["academyEmail"]);
        unset($_SESSION["academyPassword"]);
        header("Location: ../login_academy.php?reply=exit");
    }
?>