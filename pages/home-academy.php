<?php
    include_once("includes-academy/header-academy.php");
    if(isset($_GET["pg"])){
        $parameter = $_GET["pg"];
        if($parameter === "home"){
            include_once("includes-academy/main-academy.php");
        }else if($parameter === "edit"){
            include_once("includes-academy/update-academy.php");
        }else if($parameter === "search"){
            include_once("includes-academy/search-academy.php");
        }else{
            include_once("includes-academy/main-academy.php");
        }
    }else{
        include_once("includes-academy/main-academy.php");
    }
    include_once("includes-academy/footer-academy.php");
?>