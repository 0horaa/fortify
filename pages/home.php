<?php
    include_once("includes/header.php");
    if(isset($_GET["pg"])){
        $parameter = $_GET["pg"];
        if($parameter === "home"){
            include_once("includes/main.php");
        }else if($parameter === "edit"){
            include_once("includes/update.php");
        }else if($parameter === "search"){
            include_once("includes/search.php");
        }else if($parameter === "academy"){
            include_once("includes/academy.php");
        }else if($parameter === "requests"){
            include_once("includes/requests.php");
        }else{
            include_once("includes/main.php");
        }
    }else{
        include_once("includes/main.php");
    }
    include_once("includes/footer.php");
?>