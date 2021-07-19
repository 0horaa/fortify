<?php
    if(isset($_REQUEST["delete"])){
        include("../../config/conection.php");
        ob_start();
        session_start();
        $emailLogin = $_SESSION["academyEmail"];
        $passwordLogin = base64_encode($_SESSION["academyPassword"]);
        $select = "SELECT * FROM academys WHERE email_responsavel=:email AND senha_responsavel=:senha";
        try{
            $result = $conect -> prepare($select);
            $result -> bindParam(":email",$emailLogin,PDO::PARAM_STR);
            $result -> bindParam(":senha",$passwordLogin,PDO::PARAM_STR);
            $result -> execute();
            $count = $result -> rowCount();
            if($count > 0){
                while($show = $result -> FETCH(PDO::FETCH_OBJ)){
                    $idReturn = $show -> id;
                    $logoReturn = $show -> logo_academia;
                }
            }else{
                echo '<div class="alert alert-red" id="alert"><i class="fas fa-times alert-close" onclick="closeAlert()"></i>Houve um erro.</div>';
                exit;
            }
        }catch(PDOException $error){
            echo "HOUVE UM ERRO: " . $error -> getMessage();
        }

        function deleteData($argIdReturn,$argPhotoReturn){
            include("../../config/conection.php");
            $delete = "DELETE FROM academys WHERE id=:id";
            try{
                $result = $conect -> prepare($delete);
                $result -> bindValue(":id",$argIdReturn,PDO::PARAM_INT);
                $result -> execute();
                $count = $result -> rowCount();
                if($count > 0){
                    unlink("../../config/academy/$argPhotoReturn");
                    session_destroy();
                    header("Location: ../../login_academy.php?reply=delete");
                }else{
                    header("Location: ../home-academy.php");
                }
            }catch(PDOException $error){
                echo "HOUVE UM ERRO: " . $error -> getMessage();
            }
        }

        $deleteRequests = "DELETE FROM requests WHERE id_academy=:id_request";
        try{
            $resultRequests = $conect -> prepare($deleteRequests);
            $resultRequests -> bindValue(":id_request",$idReturn,PDO::PARAM_INT);
            $resultRequests -> execute();
            $countRequests = $resultRequests -> rowCount();
            if($countRequests > 0){
                deleteData($idReturn,$logoReturn);
            }else{
                deleteData($idReturn,$logoReturn);
            }
        }catch(PDOException $error){
            echo "HOUVE UM ERRO: " . $error -> getMessage();
        }
    }else{
        header("../home-academy.php");
        exit;
    }
?>