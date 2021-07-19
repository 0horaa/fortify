<?php
    if(isset($_REQUEST["delete"])){
        include("../../config/conection.php");
        include("header.php");
        $delete = "DELETE FROM users WHERE id=:id";
        try{
            $result = $conect -> prepare($delete);
            $result -> bindValue(":id",$idReturn,PDO::PARAM_INT);
            $result -> execute();
            $count = $result -> rowCount();
            if($count > 0){
                unlink("../../config/media/$photoReturn");
                session_destroy();
                header("Location: ../../login.php?reply=delete");
            }else{
                header("Location: ../home.php");
            }
        }catch(PDOException $error){
            echo "HOUVE UM ERRO: " . $error -> getMessage();
        }
    }else{
        header("../home.php");
        exit;
    }
?>