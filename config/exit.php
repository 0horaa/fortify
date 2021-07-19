<?php
    if(isset($_REQUEST["exit"])){
        unset($_SESSION["userEmail"]); //destrói uma sessão específica
        unset($_SESSION["userPassword"]);
        header("Location: ../login.php?reply=exit");
    }
?>