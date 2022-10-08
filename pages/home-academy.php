<?php
    include_once("includes-academy/header-academy.php");
    if(isset($_GET["pg"])){
        $parameter = $_GET["pg"];
        
        switch($parameter){
            case 'home':
                include_once("includes-academy/main-academy.php");
                break;
            case 'edit':
                include_once("includes-academy/update-academy.php");
                break;
            case 'search':
                include_once("includes-academy/search-academy.php");
                break;
            default:
                include_once("includes-academy/main-academy.php");
        }
    }else{
        include_once("includes-academy/main-academy.php");
    }

    include_once("includes-academy/footer-academy.php");
?>
