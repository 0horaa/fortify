<?php
    try{
        @DEFINE("SERVER","localhost");
        @DEFINE("DATABASE","fortify");
        @DEFINE("USER","root");
        @DEFINE("PASSWORD","");
        $conect = new PDO("mysql:host=".SERVER.";dbname=".DATABASE,USER,PASSWORD);
        $conect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        echo "<strong>ERRO DE PDO:</strong> " . $error -> getMessage();
    }
?>