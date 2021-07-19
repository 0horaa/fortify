<?php
    if(isset($_GET["id"])){
        include("../../config/conection.php");
        $id = $_GET["id"];
        $delete = "DELETE FROM requests WHERE id=:id";
        try{
            $result = $conect -> prepare($delete);
            $result -> bindValue(":id",$id,PDO::PARAM_INT);
            $result -> execute();
            $count = $result -> rowCount();
            if($count > 0){
                header("Location: ../home-academy.php?pg=main&reply=cancel");
            }else{
                header("Location: ../home-academy.php?pg=main&reply=fail");
            }
        }catch(PDOException $error){
            echo "<strong>ERRO: </strong>" . $error -> getMessage();
        }
    }else{
        exit;
        header("../home.php?pg=requests");
    }
?>