<?php
    if(isset($_REQUEST["change"])){
        unset($_SESSION["userEmail"]); //destrói uma sessão específica
        unset($_SESSION["userPassword"]);
        header("Location: ../login.php?reply=change");    
    }
?>